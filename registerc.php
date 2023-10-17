<?php
include("php/config.php");

$error_message = "";

if (isset($_POST['submit'])) {
    $company_name = mysqli_real_escape_string($con, $_POST['company_name']);
    $company_email = mysqli_real_escape_string($con, $_POST['company_email']);
    $company_mobile = mysqli_real_escape_string($con, $_POST['company_mobile']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Validate company name
    if (empty($company_name)) {
        $error_message = "Company name is required.";
    }

    // Validate company email
    if (!filter_var($company_email, FILTER_VALIDATE_EMAIL) || !strpos($company_email, '@') || !strpos($company_email, '.')) {
        $error_message = "Invalid company email address. Please enter a valid email.";
    }

    // Validate company mobile number
    if (!preg_match('/^(?:\+94|0)[0-9]{9,10}$/', $company_mobile)) {
        $error_message = "Invalid company mobile number. Please enter a valid number.";
    }

    // Validate password match
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match. Please enter matching passwords.";
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // If there are no errors, proceed with registration
    if (empty($error_message)) {
        // Insert company into the database
        mysqli_query($con, "INSERT INTO companies(CompanyName, CompanyEmail, CompanyMobile, Password) VALUES('$company_name', '$company_email', '$company_mobile', '$hashed_password')") or die("Error Occurred");

        echo "<div class='message'>
                  <p>Company registration successful!</p>
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
    <title>Company Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            if (!empty($error_message)) {
                echo "<div class='message'>
                          <p>$error_message</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
            }
            ?>
            <header>Company Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" id="company_name" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="company_email">Company Email</label>
                    <input type="text" name="company_email" id="company_email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="company_mobile">Company Mobile Number</label>
                    <input type="text" name="company_mobile" id="company_mobile" autocomplete="off" required>
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
