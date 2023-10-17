<?php 
session_start();

include("php/config.php");

if(isset($_SESSION['valid'])){
    // Redirect to home page if already logged in
    header("Location: home.php");
    exit();
}

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if it's a user login
    $user_result = mysqli_query($con, "SELECT * FROM users WHERE Email='$email'") or die("Select Error");
    $user_row = mysqli_fetch_assoc($user_result);

    if($user_row && password_verify($password, $user_row['Password'])){
        $_SESSION['valid'] = $user_row['Email'];
        $_SESSION['username'] = $user_row['Username'];
        $_SESSION['age'] = $user_row['Age'];
        $_SESSION['id'] = $user_row['Id'];
        header("Location: home.php");
        exit();
    }

    // Check if it's a company login
    $company_result = mysqli_query($con, "SELECT * FROM companies WHERE CompanyEmail='$email'") or die("Select Error");
    $company_row = mysqli_fetch_assoc($company_result);

    if($company_row && password_verify($password, $company_row['Password'])){
        $_SESSION['valid_company'] = $company_row['CompanyEmail'];
        $_SESSION['company_id'] = $company_row['CompanyId'];
        header("Location: home.php");
        exit();
    }

    // If no matching user or company found
    $error_message = "Wrong Username or Password";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            if(isset($error_message)){
                echo "<div class='message'>
                          <p>$error_message</p>
                      </div> <br>";
                echo "<a href='index.php'><button class='btn'>Go Back</button>";
            }
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">User</a>  ||  <a href="registerc.php">Company</a>
                </div>
            </form>
        </div>
      </div>
</body>
</html>
