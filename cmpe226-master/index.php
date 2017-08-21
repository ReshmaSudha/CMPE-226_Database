<?php

    require 'DBConnect.php';


?><!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>
    <style>
        .search-results {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        .search-results td, .search-results th {
            border: 1px solid #ccc;
            padding: 3px;
            text-align: center;
        }
    </style>
</head>

<body>
<div>
    <?php require 'form.phtml'; ?>
</div>
<div>
    <?php
        // Check if the form was submitted.
        if (isset($_GET['first_name'])) {

            // Query the db.
            $rows = search();

            // Render the db results into a table.
            echo "<table class=search-results>";
            if (!$rows) {
                echo "<tr><td>No Results</td></tr>\n";
            } else {
                echo "<tr><th>First Name</th><th>Last Name</th><th>Student Id</th><th>Department</th><th>Courses</th><th>Programming Languages</th></tr>\n";
                foreach ($rows as $row) {
                    printf(
                        "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                        htmlspecialchars($row['first_name']),
                        htmlspecialchars($row['last_name']),
                        htmlspecialchars($row['student_id']),
                        htmlspecialchars($row['dept']),
                        htmlspecialchars($row['courses']),
                        htmlspecialchars($row['p_langs'])
                    );
                }
            }
            echo "</table>";
        }
    ?>
</div>
</body>
</html>