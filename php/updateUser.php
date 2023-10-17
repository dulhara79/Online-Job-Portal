<?php
    include 'conn.php';

    // Initialize variables to avoid undefined variable warnings
    $id = $fname = $mname = $lname = $addl1 = $addl2 = $city = $postc = $email = "";

    $id = $_GET['updateid'];

    if(isset($_POST['update'])) {
        $fname = $_POST['first_name'];
        $mname = $_POST['middle_name'];
        $lname = $_POST['last_name'];
        $addline1 = $_POST['AddressLine1'];
        $addline2 = $_POST['AddressLine2'];
        $email = $_POST['Email'];
        $city = $_POST['City'];
        $pcode = $_POST['PostalCode'];
        $psw = $_POST['Password'];

        $sql_update = "UPDATE `reg_user` SET first_name='$fname', middle_name='$mname', last_name='$lname', Email='$email', Password='$psw', AddressLine1='$addline1', AddressLine2='$addline2', City='$city', PostalCode='$pcode' WHERE user_id='$id'";

        if($conn->query($sql_update) === TRUE) {
            echo "Record updated!";
        }
        else {
            echo "Error: " . $sql_update . "<br>" . $conn->error;
        }
    }
    /*
    if(isset($_GET['user_id'])) {
        $id = $_GET['user_id'];

        $sql_select = "SELECT * FROM `reg_user` WHERE user_id='$id'";
        $result = $conn->query($sql_select);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row['user_id'];
                $fname = $row['first_name'];
                $mname = $row['middle_name'];
                $lname = $row['last_name'];
                $email = $row['Email'];
                $psw = $row['Password'];
                $addl1 = $row['AddressLine1'];
                $addl2 = $row['AddressLine2'];
                $city = $row['City'];
                $postc = $row['PostalCode'];
            }
        }
    }
    */
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update user Profile</title>
</head>
<body>
    <fieldset>
        <legend>Add user</legend>
        <form action="" method="POST">
            <label for="user-id" class="form-lable-admin">User ID</label><br>
            <input type="text" class="input-data-admin" name="id" placeholder="User ID" value="<?php echo $id; ?>" disabled><br>
        
            <label for="fname" class="form-lable-admin">Name</label><br>
            <input type="text" class="input-data-admin" name="fname" placeholder="First name">
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

<?php
   // header('Location: dashboard.php');
?>
