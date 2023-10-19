<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    include('../config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $id = $_GET['id'];

        // Fetch user details based on ID
        $query = "SELECT * FROM users WHERE Id='$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle the form submission to update the user
        $id = $_POST['id'];
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];
        $newMobile = $_POST['mobile'];
        $newAge = $_POST['age'];
        $newPassword = $_POST['password'];

        $sql = "UPDATE users
                SET Username='$newUsername', Email='$newEmail', Mobile='$newMobile', Age='$newAge', Password='$newPassword'
                WHERE Id='$id'";

        if ($con->query($sql) === TRUE) {
            header("Location: Alluser.php");  // Redirect to Alluser.php after update
            exit();
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
    ?>

    <h2>Update User</h2>

    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $row['Username']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $row['Email']; ?>"><br>
        <label for="mobile">Mobile:</label><br>
        <input type="text" id="mobile" name="mobile" value="<?php echo $row['Mobile']; ?>"><br>
        <label for="age">Age:</label><br>
        <input type="text" id="age" name="age" value="<?php echo $row['Age']; ?>"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $row['Password']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>

    <?php
    mysqli_close($con);
    ?>
</body>
</html>
