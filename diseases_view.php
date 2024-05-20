<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diseases</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 10px;
            /* Limit to three rows */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        /* Ensure button width is consistent */
        .card form input[type="submit"] {
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="disease-container" class="container">
        <?php
        // Include database connection
        include_once 'connect.php';

        // Fetch all diseases from the database
        $query = "SELECT * FROM diseases";
        $result = mysqli_query($connect, $query);

        // Check if there are any diseases
        if (mysqli_num_rows($result) > 0) {
            // Display each disease as a card
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";

                echo "<form action='select_disease.php' method='POST'>";
                echo "<input type='hidden' name='disease_id' value='" . $row['id'] . "'>";
                echo "<input type='submit' name='select' value='Select'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No diseases found.";
        }

        // Close database connection
        mysqli_close($connect);
        ?>
    </div>
</body>

</html>