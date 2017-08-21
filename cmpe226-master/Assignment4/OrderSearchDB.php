<!DOCTYPE html>
<html>
<head>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 15px;
		}
		td {
			text-align: center;
		}
	</style>
</head>
<body>
<?php
    try {
        $dbh = new PDO('mysql:dbname=cmpe226a3;host=localhost', "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $ex) {
        printf("Connect failed: %s\n", $ex->getMessage());
        exit();
    }

	$prepStmtSql = "SELECT 
						A.UserName, B.OrderId, B.OrderStatus, B.OrderDate, C.PaymentAmount
					FROM 
						CUSTOMER A, `ORDER` B, PAYMENT C 
					WHERE 
						A.CustomerId = :customerid AND
						A.CustomerId = B.CustomerId AND
						B.PaymentId = C.PaymentId";

	$statement = $dbh->prepare($prepStmtSql);
	$statement->execute(['customerid' => $_GET['customerid']]);
    $rows = $statement->fetchAll();
    if ($rows) {
        echo "<table><tr><th>UserName</th><th>OrderId</th><th>OrderStatus</th><th>OrderDate</th><th>PaymentAmount</th></tr>";
        // output data of each row
        foreach ($rows as $row) {
            printf(
                "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
                htmlspecialchars($row["UserName"]),
                htmlspecialchars($row["OrderId"]),
                htmlspecialchars($row["OrderStatus"]),
                htmlspecialchars($row["OrderDate"]),
                htmlspecialchars($row["PaymentAmount"])
            );
        }
        echo "</table>";
	} else {
		echo "0 results";
	}
	echo "</table>";
?>  
	<br><br>
	<a href="OrderSearch.html">Back</a>
</body>
</html>