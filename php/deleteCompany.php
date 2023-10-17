<?php
    include "config.php";

    if(isset($_GET['deleteid'])) {
       $id=$_GET['deleteid'];

       $sql="DELETE FROM reg_user WHERE user_id = '$id'";
       $result = mysqli_query($con, $sql);
       if($result == TRUE) {
          echo 'Deleted successfully!';
       }
       else {
        die(mysqli_error($con));
       }
    }
?>