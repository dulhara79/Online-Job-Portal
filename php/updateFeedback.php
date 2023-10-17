<?php
    include 'conn.php';

    $fdID = $_GET['updateid'];
    
    if(isset($_POST['update'])) {
       $usrID = $_POST['user_id'];
       $sentDATE = $_POST['sent_date'];
       $timestamp = $_POST['fd_timestamp'];
       $sub = $_POST['fd_subject'];
       $cont = $_POST['content'];

        $sql_update = "UPDATE `Feedback` SET user_id = '$usrID', sent_date='$sentDATE', fd_timastamp='$timestamp', fd_subjrct='$sub', content='$cont' WHERE feedback_id = '$fdID'";

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
    <title>Update Feedback</title>
</head>
<body>
    <fieldset>
        <legend>Add user</legend>
        <form action="" method="POST">
            <label for="user-id" class="form-lable-admin">User ID</label><br>
            <input type="text" class="input-data-admin" name="id" placeholder="User ID" value="<?php echo $fdID; ?>" disabled><br>
        
            <label for="fname" class="form-lable-admin">User ID</label><br>
            <input type="text" class="input-data-admin" name="fname" placeholder="First name">

            <label for="fname" class="form-lable-admin">Sent Date</label><br>
            <input type="text" class="input-data-admin" name="mname" placeholder="Middle name">

            <label for="fname" class="form-lable-admin">TimeStamp</label><br>
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
