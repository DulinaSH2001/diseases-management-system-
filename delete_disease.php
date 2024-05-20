<?php
// Include database connection
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Check if disease_id is set and not empty
    if (isset($_POST['disease_id']) && !empty($_POST['disease_id'])) {
        // Sanitize the input to prevent SQL injection
        $disease_id = mysqli_real_escape_string($connect, $_POST['disease_id']);

        // Prepare a delete statement
        $query = "DELETE FROM diseases WHERE id = '$disease_id'";

        // Execute the delete statement
        if (mysqli_query($connect, $query)) {
            // Redirect to manage_diseases.php after successful deletion
            header("Location: manage_diseases.php");
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($connect);
        }
    } else {
        echo "Invalid disease ID.";
    }
} else {
    echo "Unauthorized access.";
}

mysqli_close($connect);
?>