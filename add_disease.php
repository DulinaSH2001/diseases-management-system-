<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Disease</title>
</head>

<body>
    <h2>Add Disease</h2>
    <form action="add_disease.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

        <label for="symptoms">Symptoms:</label><br>
        <textarea id="symptoms" name="symptoms" rows="4" cols="50"></textarea><br><br>



        <input type="submit" value="Submit">
    </form>
</body>

</html>
<?php

include_once 'connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $symptoms = $_POST['symptoms'];



    $query = "INSERT INTO diseases (name, description, symptoms) VALUES ('$name', '$description', '$symptoms')";


    if (mysqli_query($connect, $query)) {
        echo "<script>window.location = 'manage_diseases.php'</script>";


    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}

?>