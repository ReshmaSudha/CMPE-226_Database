<?php

?><!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Product Search</title>
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
    <?php require 'productSearch.html'; ?>
</div>
<div>
    <?php
        // Check if the form was submitted.
        if (isset($_GET['product_name'])) {

            // Query the db. 
			//TODO: Haritha to add this function.
            //$rows = searchProduct();

            // Render the db results into a table.
            echo "<table class=search-results>";
            if (!$rows) {
                echo "<tr><td>No Results</td></tr>\n";
            } else {
                echo "<tr><th>Brand Name</th><th>Product Name</th><th>Model</th><th>Description</th><th>Price</th><th>Rating</th><th>Review Comment</th></tr>\n";
                foreach ($rows as $row) {
                    printf(
                        "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                        htmlspecialchars($row['brand_name']),
                        htmlspecialchars($row['product_name']),
                        htmlspecialchars($row['model']),
                        htmlspecialchars($row['description']),
                        htmlspecialchars($row['price']),
                        htmlspecialchars($row['rating']),
                        htmlspecialchars($row['review_comment'])

                    );
                }
            }
            echo "</table>";
        }
    ?>
</div>
</body>
</html>