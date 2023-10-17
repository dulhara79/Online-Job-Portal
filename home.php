<?php 
session_start();

include("php/config.php");

if(!isset($_SESSION['valid']) && !isset($_SESSION['valid_company'])){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="#">JOBS.lk</a></p>
        </div>

        <div class="right-links">
            <?php 
            if (isset($_SESSION['valid'])) {
                // Display user-specific content
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

                if ($query) {
                    while ($result = mysqli_fetch_assoc($query)) {
                        $res_Uname = $result['Username'];
                        $res_Email = $result['Email'];
                        $res_Age = $result['Age'];
                        $res_id = $result['Id'];
                    }
                    
                    echo "<a href='edit.php?Id=$res_id'>Change Profile</a>";
                } else {
                    echo "Error retrieving user data.";
                }
                
            } elseif (isset($_SESSION['valid_company'])) {
                // Display company-specific content
                $company_id = $_SESSION['company_id'];
                $company_query = mysqli_query($con, "SELECT * FROM companies WHERE CompanyId=$company_id");

                if ($company_query) {
                    while ($company_result = mysqli_fetch_assoc($company_query)) {
                        $res_CName = $company_result['CompanyName'];
                        $res_CEmail = $company_result['CompanyEmail'];
                        $res_CMobile = $company_result['CompanyMobile'];
                        $res_Cid = $company_result['CompanyId'];
                    }

                    echo "<a href='editc.php?CompanyId=$res_Cid'>Change Profile</a>";
                } else {
                    echo "Error retrieving company data.";
                }
            }
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <?php 
                    if (isset($_SESSION['valid'])) {
                        echo "<p>Hello <b>$res_Uname</b>, Welcome</p>";
                        echo "<p>Your email is <b>$res_Email</b>.</p>";
                        echo "<p>And you are <b>$res_Age years old</b>.</p>";
                    } elseif (isset($_SESSION['valid_company'])) {
                        echo "<p>Hello <b>$res_CName</b>, Welcome</p>";
                        echo "<p>Your email is <b>$res_CEmail</b>.</p>";
                        echo "<p>Your mobile number is <b>$res_CMobile</b>.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>