<?php
    include "config.php";
?>
<?php
    $sql = "SELECT COUNT(*) as user_count FROM reg_user"; 
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userCount = $row["user_count"];
        //echo "Total users in the database: " . $userCount;
    } else {
        //echo "0 results";
    }

    $sql_comp = "SELECT COUNT(*) as company_count FROM company"; 
    $result = $con->query($sql_comp);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $companyCount = $row["company_count"];
        //echo "Total company in the database: " . $companyCount;
    } else {
        //echo "0 results";
    }


    $con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin-DashBoard</title>
    <link rel="stylesheet" href="../css/admin-style.css">
</head>
<body>
    <h1>Admin page</h1>
    <img class="admin-logo" src="logo.jpg" alt="">
    <div class="nav-bar-div">
    <ul>
            <li><a class="active" href="dashboard.php">DashBoard</a></li>
            <li><a href="admin-reg-user.php">Register Users</a></li>
            <li><a href="admin-reg-company.php">Register company</a></li>
            <li><a href="feedback-Admin.php">Feedback</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="../index.php">Log in</a></li>
            <li><a href="../register.php">Sign up</a></li>
        </ul>
    </div>
    <div class="count-div" onclick="reloadpage()">
        <div class="reg-user-count-div">
            <p id="reg-comp-count" class="reg-count"><?php echo $companyCount ?></p>
            <p class="count-label" >Register company</p>
        </div>
        <div class="reg-user-count-div" onclick="reloadpage()">
            <p id="reg-users-count" class="reg-count"><?php echo $userCount ?></p>
            <p class="count-label" onclick="reloadpage()">Register users count</p>
        </div>
    </div>

</body>
</html>

<?php
   // include "admin-reg-user.php";
?>
<?php
  //  include "admin-reg-company.php";
?>