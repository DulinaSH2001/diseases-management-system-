<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Diseases</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Manage Diseases</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Symptoms</th>
            <th>Actions</th>
        </tr>
        <?php
        // Include database connection
        include_once 'connect.php';

        // Fetch all diseases from the database
        $query = "SELECT * FROM diseases";
        $result = mysqli_query($connect, $query);

        // Check if there are any diseases
        if (mysqli_num_rows($result) > 0) {
            // Display each disease with delete and edit buttons
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['symptoms'] . "</td>";
                echo "<td>";
                echo "<form action='delete_disease.php' method='POST'>";
                echo "<input type='hidden' name='disease_id' value='" . $row['id'] . "'>";
                echo "<input type='submit' name='delete' value='Delete'>";
                echo "</form>";
                echo "<a href='edit_disease.php?id=" . $row['id'] . "'>Edit</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No diseases found.</td></tr>";
        }

        mysqli_close($connect);
        ?>
    </table>
</body>

</html>