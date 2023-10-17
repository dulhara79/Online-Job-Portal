<?php 
    include 'conn.php'
?>

<?php
        $sql_reg_user = "SELECT * FROM reg_user";
       

        $result_reg_user = mysqli_query($conn, $sql_reg_user);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Users</title>
    <link rel="stylesheet" href="admin-style.css">
</head>
<body>
    <h1>User Table</h1>
    <img class="admin-logo" src="logo.jpg" alt="">
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
    <table border="1px solod black">
        <thead>
            <tr>
                <th>User ID</th>	
                <th>First Name</th>	
                <th>Middle Name</th>	
                <th>Last Name</th>	
                <th>Email</th>	
                <th>Password</th>	
                <th>AddressLine1</th>	
                <th>AddressLine2</th>
                <th>City</th>	
                <th>PostalCode</th>
                <th>Contact number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($result_reg_user->num_rows > 0) {
                while($row = $result_reg_user->fetch_assoc()) {
                    $id = $row['user_id'];
            ?>
                <tr>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['middle_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['Password'];?></td>
                    <td><?php echo $row['AddressLine1'];?></td>
                    <td><?php echo $row['AddressLine2'];?></td>
                    <td><?php echo $row['City'];?></td>
                    <td><?php echo $row['PostalCode'];?></td>
                    <td>
                    <?php 
                    $sql_user_contNo = "SELECT * FROM User_contact_no WHERE user_id = '$id'";
                    $result_user_contNo = mysqli_query($conn, $sql_user_contNo);
                    if($result_user_contNo->num_rows > 0) {
                while($row = $result_user_contNo->fetch_assoc()) {
            ?>
                    <?php echo $row['contact_num']. "<br>";?>
                    <?php
                }
            } ?></td>
                <td> <a class="update-btn" href="updateUser.php?updateid=<?php echo $row['user_id'];?>">Edit</a> &nbsp; <a class="delete-bttn" href="deleteUser.php?deleteid=<?php echo $row['user_id']; ?>">Delete</a></td>
                </tr>
                    <?php
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>