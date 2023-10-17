<?php
    include 'config.php';
?>

<?php
    if(isset($_POST['submit'])) {
        $id = $_POST['company_id'];
        $name = $_POST['company_name'];
        $addline1 = $_POST['address_line1'];
        $addline2 = $_POST['address_line2'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $pcode = $_POST['post_code'];
        $psw = $_POST['company_password'];

    $sql_insert = "INSERT INTO  `company` (company_id, company_name, email, company_Password, address_line1, address_line2, city, post_code) VALUES ('$id', '$name''$email', '$psw', '$addline1', '$addline2', '$city','$pcode')";

    $result = $conn->query($sql_insert);

    if($result == TRUE) {
        echo "New record created!";
    }
    else {
        echo "Error:" . $sql_insert . "<br>" . $conn->error;
    }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Company</title>
    <link rel="stylesheet" href="admin-style.css">
    <script src="admin-script.js"></script>
</head>
<body>
    <div class="nav-bar-div">
        <ul>
            <li><a class="active" href="dashboard.php">DashBoard</a></li>
            <li><a href="admin-reg-user.php">Register Users</a></li>
            <li><a href="admin-reg-company.php">Register company</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#about">Log in</a></li>
            <li><a href="#about">Sign up</a></li>
        </ul>
    </div>
    <a href="addUser.php"><button class="reg-button">Register User</button></a>

    <fieldset>
        <legend>Add company</legend>
        <form action="" method="POST">
            <label for="user-id" class="form-lable-admin">Company ID</label><br>
            <input type="text" class="input-data-admin" name="company_id" placeholder="User ID" required><br>
        
            <label for="fname" class="form-lable-admin">Name</label><br>
            <input type="text" class="input-data-admin" name="company_name" placeholder="Name" required><br>
            
            <label for="addline1" class="form-lable-admin">Address</label><br>
            <input type="text" class="input-data-admin" name="address_line1" placeholder="Line 1" required>
            <input type="text" class="input-data-admin" name="address_line2" placeholder="Line 2"><br>
            <label for="city" class="form-lable-admin">City</label><br>
            <input type="text" class="input-data-admin" name="city" placeholder="City" required><br>
            <label for="pcode" class="form-lable-admin">Postal Code</label><br>
            <input type="text" class="input-data-admin" name="post_code" placeholder="Postacl Code" required><br>
            
            <label for="email" class="form-lable-admin">E-mail</label><br>
            <input type="email" class="input-data-admin" name="email" placeholder="E mail"><br>

            <label for="psw" class="form-lable-admin">Password</label><br>
            <input type="password" id="pswd" class="input-data-admin" name="company_password" placeholder="Password" required><br>
            <p class="show-pw" id="show-pw-id" onclick="showPassword();">Show Password</p>

            <label for="com-psw" class="form-lable-admin">Comfirm Password</label><br>
            <input type="password" id="com-pswd" class="input-data-admin" name="com-psw" placeholder="Comfirm Password" onclick="password()" required><br>

            <input type="submit" class="input-data-admin-submit" name="submit" values="Submit" id="submit-btn" disabled>
        </form> 
    </fieldset>
</body>
</html>