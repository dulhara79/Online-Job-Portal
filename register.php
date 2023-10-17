<?php 
include("php/config.php");

$error_message = "";

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $age = isset($_POST['age']) ? mysqli_real_escape_string($con, $_POST['age']) : NULL;
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Validate username
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $error_message = "Invalid username. Use only letters, numbers, and underscores. Length should be between 3 and 20 characters.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !strpos($email, '@') || !strpos($email, '.')) {
        $error_message = "Invalid email address. Please enter a valid. ";
    }

    // Validate Sri Lankan mobile number
    if (!preg_match('/^(?:\+94|0)[0-9]{9,10}$/', $mobile)) {
        $error_message = "Invalid Sri Lankan Mobile Number. Please enter a valid number.";
    }

    // Validate password match
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match. Please enter matching passwords.";
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Verify unique email
    $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
    if(mysqli_num_rows($verify_query) != 0){
        $error_message = "This email is already in use. Please choose another one.";
    }

    // Verify unique username
    $verify_username_query = mysqli_query($con, "SELECT Username FROM users WHERE Username='$username'");
    if(mysqli_num_rows($verify_username_query) != 0){
        $error_message = "This username is already taken. Please choose another one.";
    }

    // If there are no errors, proceed with registration
    if (empty($error_message)) {
        // Insert user into the database
        mysqli_query($con, "INSERT INTO users(Username, Email, Mobile, Age, Password) VALUES('$username', '$email', '$mobile', '$age', '$hashed_password')") or die("Error Occurred");

        echo "<div class='message'>
                  <p>Registration successfully!</p>
              </div> <br>";
        echo "<a href='index.php'><button class='btn'>Login Now</button>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            if(!empty($error_message)){
                echo "<div class='message'>
                          <p>$error_message</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" name="mobile" id="mobile" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age (Optional)</label>
                    <input type="number" name="age" id="age" autocomplete="off">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
