<?php
// Include database connection
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Check if disease_id and other form fields are set and not empty


    // Sanitize the inputs to prevent SQL injection
    $disease_id = $_POST['disease_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $symptoms = $_POST['symptoms'];

    // Update the disease record in the database
    $query = "UPDATE diseases SET name='$name', description='$description', symptoms='$symptoms' WHERE id='$disease_id'";

    if (mysqli_query($connect, $query)) {
        // Redirect to manage_diseases.php after successful update
        echo "<script>window.location = 'manage_diseases.php'</script>";

        exit();
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }


} else {
    echo "Unauthorized access.";
}

mysqli_close($connect);
?>