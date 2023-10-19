<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <?php
    include('../config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        // Delete the user record
        $sql = "DELETE FROM users WHERE Id='$id'";

        if ($con->query($sql) === TRUE) {
            header("Location: Alluser.php");  // Redirect to Alluser.php after deletion
            exit();
        } else {
            echo "Error deleting record: " . $con->error;
        }
    }
    ?>

    <h2>Delete User</h2>

    <p>Are you sure you want to delete this user?</p>
    <form method="GET" action="">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Delete">
    </form>

    <?php
    mysqli_close($con);
    ?>
</body>
</html>
