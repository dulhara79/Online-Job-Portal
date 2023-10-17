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
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            /* Your existing navbar styles */
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 50px;
        }

        .form {
            margin-top: 20px;
        }

        /* Add your existing styles here */

    </style>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">JOBS.lk</h2>
                </div>

                <div class="menu">
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">JOB LISTING</a></li>
                        <li><a href="#">ABOUT US</a></li>
                        <li><a href="#">CONTACT US</a></li>
                        <li><a href="php/feedback/index.php">FEEDBACK</a></li>
                    </ul>
                </div>

                <div class="search">
                    <input class="srch" type="search" name="" placeholder="Type To text">
                    <a href="#"> <button class="btn">Search</button></a>
                </div>
            </div>

            <div class="content">
                <h1>Explore Exciting <br><span>Job Opportunities</span></h1>
                <p class="par">Discover your dream job in the dynamic world of online opportunities. <br> Explore a variety of roles and take the next step in your career journey.</p>

                <button class="cn"><a href="#">EXPLORE JOBS</a></button>
                <div class="form">
                    <h2>Login Here</h2>
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
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2023 JOBS.lk ...... All rights reserved.
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
