<?php
    include "config.php";
?>

<?php
        $sql_feedback = "SELECT * FROM Feedback";
        //$sql_user_contNo = "SELECT * FROM User_contact_no";

        $result_feedback = mysqli_query($con, $sql_feedback);
        //$result_user_contNo = mysqli_query($con, $sql_user_contNo);

    if($result_feedback == TRUE) {
        echo "New record created!";
    }
    else {
        echo "Error:" . $sql_insert . "<br>" . $con->error;
    }

    $con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Users</title>
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="../js/admin-script.js"></script>
</head>
<body>
    <h1>Recieved Feedback</h1>
    <img class="admin-logo" src="../images/logo.jpg" alt="LOGO" onclick="reloadpage();">
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
    <center>
    <table class="feed-back-class">
        <thead>
            <tr>
                <th>Feedback ID</th>	
                <th>User ID</th>	
                <th>Sent Date</th>
                <th>TimeStamp</th>	
                <th>Subject</th>
                <th>Content</th>	
                <!--feedback_id,user_id,sent_date,content,fd_timestamp,fd_subject-->
            </tr>
        </thead>
        <tbody>
            <?php
            if($result_feedback->num_rows > 0) {
                while($row = $result_feedback->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['feedback_id'];?></td>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['sent_date'];?></td>
                    <td><?php echo $row['fd_timestamp'];?></td>
                    <td><?php echo $row['fd_subject'];?></td>
                    <td><?php echo $row['content'];?></td>
                    <td><!--<a class="update-btn" href="updateFeedback.php?updateid=<?php //echo $row['user_id'];?>">Update</a> &nbsp;--> <a class="delete-bttn" href="deleteFeedback.php?deleteid=<?php echo $row['feedback_id']; ?>">Delete</a></td>
                </tr>
                    <?php
            }
        }
        ?>
        </tbody>
    </table>
    </center>
</body>
</html>