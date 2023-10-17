<?php
    include'conn.php';

$name = $addline1 = $addline2 = $email = $city  = $pcode = $psw = " ";

    $id = $_GET['company_id'];

    if(isset($_POST['submit'])) {
        $name = $_POST['company_name'];
        $addline1 = $_POST['address_line1'];
        $addline2 = $_POST['address_line2'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $pcode = $_POST['post_code'];
        $psw = $_POST['company_password'];

        $sql_update = "UPDATE  `company` SET company_name = '$name', email = '$email', company_Password = '$psw', address_line1 = '$addline1', address_line2 = '$addline2', city = '$city', post_code = '$pcode' WHERE company_id = $id";

        if($conn->query($sql_update) === TRUE) {
            echo "Record updated!";
        }
        else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
    }

    /*
    if(isset($_GET['company_id'])) {
        $user_id = $GET['company_id'];

        $sql = "SELECT * FROM `company` WHERE 'company_id' = $user_id";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['company_id'];
                $name = $row['company_name'];
                $email = $row['email'];
                $pw = $row['company_password'];
                $addl1 = $row['address_line1'];
                $addl2 = $row['address_line2'];
                $city = $row['city'];
                $postc = $row['post_code'];
            }
        }
    }

    $conn->close(); */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Company Profile</title>
</head>
<body>
    <fieldset>
        <legend>Update Company</legend>
        <form action="" method="POST">
            <label for="user-id" class="form-lable-admin">Company ID</label><br>
            <input type="text" class="input-data-admin" name="company_id" placeholder="User ID" disabled><br>
        
            <label for="fname" class="form-lable-admin">Name</label><br>
            <input type="text" class="input-data-admin" name="company_name" placeholder="Name"><br>
            
            <label for="addline1" class="form-lable-admin">Address</label><br>
            <input type="text" class="input-data-admin" name="address_line1" placeholder="Line 1">
            <input type="text" class="input-data-admin" name="address_line2" placeholder="Line 1"><br>
            <label for="city" class="form-lable-admin">City</label><br>
            <input type="text" class="input-data-admin" name="city" placeholder="City"><br>
            <label for="pcode" class="form-lable-admin">Postal Code</label><br>
            <input type="text" class="input-data-admin" name="post_code" placeholder="Postacl Code"><br>
            
            <label for="email" class="form-lable-admin">E-mail</label><br>
            <input type="email" class="input-data-admin" name="email" placeholder="E mail"><br>

            <label for="psw" class="form-lable-admin">Password</label><br>
            <input type="password" class="input-data-admin" name="company_password" placeholder="Password"><br>

            <label for="com-psw" class="form-lable-admin">Comfirm Password</label><br>
            <input type="password" class="input-data-admin" name="com-psw" placeholder="Comfirm Password"><br>

            <input type="submit" class="input-data-admin-submit" name="submit" value="Update">
        </form> 
    </fieldset>
</body>
</html>

<?php
   // header('Location: dashboard.php');
?>