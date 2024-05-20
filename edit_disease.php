<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Disease</title>
</head>

<body>
    <h2>Edit Disease</h2>

    <?php
    // Include database connection
    include_once 'connect.php';

    // Check if ID parameter is provided in the URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // Sanitize the input to prevent SQL injection
        $disease_id = $_GET['id'];

        // Fetch the disease record from the database
        $query = "SELECT * FROM diseases WHERE id = '$disease_id'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>

            <!-- Display the edit form -->
            <form action="update_disease.php" method="POST">
                <input type="hidden" name="disease_id" value="<?php echo $row['id']; ?>">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br><br>

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" rows="4" cols="50"
                    required><?php echo $row['description']; ?></textarea><br><br>

                <label for="symptoms">Symptoms:</label><br>
                <textarea id="symptoms" name="symptoms" rows="4" cols="50"
                    required><?php echo $row['symptoms']; ?></textarea><br><br>

                <input type="submit" name="update" value="Update">
            </form>

            <?php
        } else {
            echo "Disease not found.";
        }
    } else {
        echo "Invalid request. Please provide a valid disease ID.";
    }

    mysqli_close($connect);
    ?>
</body>

</html>