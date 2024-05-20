<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Disease Details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    // Include database connection
    include_once 'connect.php';

    // Check if disease_id is set and not empty
    if (isset($_POST['disease_id']) && !empty($_POST['disease_id'])) {
        // Sanitize the input to prevent SQL injection
        $disease_id = mysqli_real_escape_string($connect, $_POST['disease_id']);

        // Fetch the details of the selected disease from the database
        $query = "SELECT * FROM diseases WHERE id = '$disease_id'";
        $result = mysqli_query($connect, $query);

        // Check if the disease is found
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<div class='container'>";
            echo "<h2>" . $row['name'] . "</h2>";
            echo "<p>Description: " . $row['description'] . "</p>";
            echo "<p>Symptoms: " . $row['symptoms'] . "</p>";
            echo "</div>";
        } else {
            echo "Disease not found.";
        }
    } else {
        echo "Invalid request. Please provide a valid disease ID.";
    }

    // Close database connection
    mysqli_close($connect);
    ?>
</body>

</html>