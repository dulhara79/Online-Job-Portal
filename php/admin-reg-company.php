<?php 
    include 'config.php'
?>

<?php
    $sql_company = "Select * From company";
    $sql_company_contact_num = "Select * From company_contact_num";
    $result_company = mysqli_query($con, $sql_company);
    $result_company_contNo = mysqli_query($con, $sql_company_contact_num);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Companys</title>
    <link rel="stylesheet" href="../css/admin-style.css">
</head>
<body>
    <h1>Company Table</h1>
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
    <table border="1px solod black">
        <thead>
            <tr>
                <th>Company ID</th>	
                <th>Company Name</th>		
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
                if($result_company->num_rows > 0) {
                    while($row=$result_company->fetch_assoc()) {
                        $id = $row['company_id'];
                       // $hash = password_hash($row['company_password']);
            ?>
                    <tr>
                        <td><?php echo $row['company_id']; ?>
                        <td><?php echo $row['company_name']; ?>
                        <td><?php echo $row['email']; ?>
                        <td><?php echo $row['company_password'] ?>
                        <td><?php echo $row['address_line1']; ?>
                        <td><?php echo $row['address_line2']; ?>
                        <td><?php echo $row['city']; ?>
                        <td><?php echo $row['post_code']; ?>
                        <td>
                        <?php 
                    $sql_user_contNo = "SELECT * FROM company_contact_num WHERE company_id = '$id'";
                    $result_company_contNo = mysqli_query($con, $sql_user_contNo);
                    if($result_company_contNo->num_rows > 0) {
                while($row = $result_company_contNo->fetch_assoc()) {
            ?>
                    <?php echo $row['contact_num']. "<br>";?>
                    <?php
                }
            } ?></td>
                        <td> <a class="update-btn" href="updateCompany.php?updateid=<?php echo $row['company_id'];?>">Edit</a> &nbsp; <a class="delete-bttn" href="deleteCompany.php?deleteid=<?php echo $row['company_id']; ?>">Delete</a></td>
                        </tr>
                    <?php
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>