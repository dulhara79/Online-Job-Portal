<?php
    include 'config.php';

    $id = $_GET['updateid'];

    if(isset($_POST['update'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $addline1 = $_POST['AddressLine1'];
        $addline2 = $_POST['AddressLine2'];
        $email = $_POST['Email'];
        $city = $_POST['City'];
        $pcode = $_POST['PostalCode'];
        $psw = $_POST['Password'];

        $sql_update = "UPDATE `reg_user` SET first_name='$fname', middle_name='$mname', last_name='$lname', Email='$email', Password='$psw', AddressLine1='$addline1', AddressLine2='$addline2', City='$city', PostalCode='$pcode' WHERE user_id='$id'";

        if($con->query($sql_update) === TRUE) {
            echo "Record updated!";
        }
        else {
            echo "Error: " . $sql_update . "<br>" . $con->error;
        }
    }

    if(isset($_GET['user_id'])) {
        $id = $_GET['user_id'];

        $sql_select = "SELECT * FROM `reg_user` WHERE user_id='$id'";
        $result = $con->query($sql_select);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $prev_id = $row['user_id'];
                $prev_fname = $row['first_name'];
                $prev_mname = $row['middle_name'];
                $prev_lname = $row['last_name'];
                $prev_email = $row['Email'];
                $prev_psw = $row['Password'];
                $prev_addl1 = $row['AddressLine1'];
                $prev_addl2 = $row['AddressLine2'];
                $prev_city = $row['City'];
                $prev_postc = $row['PostalCode'];
            }
        }
    }

    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update user Profile</title>
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="../js/admin-script.js"></script>
</head>
<body>
    <img class="admin-logo" src="../images/logo.jpg" alt="LOGO">
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
    <fieldset>
        <legend>Add user</legend>
        <form action="" method="POST">
            <label for="user-id" class="form-lable-admin">User ID</label><br>
            <input type="text" class="input-data-admin" name="id" placeholder="User ID" value="<?php echo $prev_id; ?>" disabled><br>
        
            <label for="fname" class="form-lable-admin">Name</label><br>
            <input type="text" class="input-data-admin" name="fname" value="<?php echo $prev_fname; ?>">
            <input type="text" class="input-data-admin" name="mname" placeholder="Middle name">
            <input type="text" class="input-data-admin" name="lname" placeholder="Last name"><br>
            
            <label for="addline1" class="form-lable-admin">Address</label><br>
            <input type="text" class="input-data-admin" name="AddressLine1" placeholder="Line 1">
            <input type="text" class="input-data-admin" name="AddressLine2" placeholder="Line 1"><br>
            <label for="city" class="form-lable-admin">City</label><br>
            <input type="text" class="input-data-admin" name="City" placeholder="City"><br>
            <label for="pcode" class="form-lable-admin">Postal Code</label><br>
            <input type="text" class="input-data-admin" name="PostalCode" placeholder="Postacl Code"><br>
            
            <label for="email" class="form-lable-admin">E-mail</label><br>
            <input type="email" class="input-data-admin" name="Email" placeholder="E mail"><br>

            <label for="psw" class="form-lable-admin">Password</label><br>
            <input type="password" class="input-data-admin" name="Password" placeholder="Password"><br>

            <label for="com-psw" class="form-lable-admin">Comfirm Password</label><br>
            <input type="password" class="input-data-admin" name="com-psw" placeholder="Comfirm Password"><br>

            <input type="submit" class="input-data-admin-submit" name="update" value="Update">
        </form> 
    </fieldset>
</body>
</html>
