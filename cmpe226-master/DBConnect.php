<?php

/**
 * Connects to the db, builds a parameterized prepared statement dynamic sql query,
 * executes it, and then returns the result as an array of rows.
 *
 * @return string[][]
 */
function search() {
	$clauses = [];
	$params = [];

    // When searching for fire/last name, we use like clauses for fuzzy searching.
    buildLikeClause('first_name', 'first_name', $params, $clauses);
    buildLikeClause('last_name', 'last_name', $params, $clauses);

    // Do an equality search for the dept.
    if (isset($_GET['dept'])) {
        $dept = trim($_GET['dept']);
        if (strlen($dept)) {
            $clauses[] = "dept = ?";
            $params[] = $dept;
        }
    }

    // Use equality searching for courses and p_langs.
    buildAlternationSubClause('courses', 'courses', $params, $clauses);
    buildAlternationSubClause('p_langs', 'p_langs', $params, $clauses);

    // Connect to the db.
    $db = new PDO("mysql:host=localhost;dbname=cmpe226", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Finish constructing our sql.
    $sql = 'SELECT * FROM studentrecord_assignment1';
    if ($clauses) {
        $sql .= ' where ' . join(' and ', $clauses);
    }

    // Execute and fetch.
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Builds a part of an sql query. Specifically, a parameterized like clause such as:
 *
 * where colName like ?
 *
 * @param string $requestKey
 * @param string $columnName
 * @param mixed[] $params
 * @param string[] $clauses
 */
function buildLikeClause($requestKey, $columnName, array &$params, array &$clauses) {
    if (isset($_GET[$requestKey])) {
        $val = trim($_GET[$requestKey]);
        if (strlen($val)) {
            $clauses[] = "$columnName like concat('%', ?, '%')";
            $params[] = addcslashes($val, '%_');
        }
    }
}

/**
 * Builds a part of an sql query. Specifically, a parameterized find_in_set() such as:
 *
 * where (find_in_set(colName, ?) or find_in_set(colName, ?) or find_in_set(colName, ?))
 *
 * We store p_langs and courses comma separated in the table column, so we need to use find_in_set
 * to search it properly.
 *
 * @param string $requestKey
 * @param string $columnName
 * @param mixed[] $params
 * @param string[] $clauses
 */
function buildAlternationSubClause($requestKey, $columnName, array &$params, array &$clauses) {
    if (isset($_GET[$requestKey]) && is_array($_GET[$requestKey])) {
        $subClauses = [];
        foreach ($_GET[$requestKey] as $val) {
            $subClauses[] = "find_in_set(?, $columnName) > 0";
            $params[] = $val;
        }
        $clauses[] = sprintf("(%s)", join(' or ', $subClauses));
    }
}