<?php
    include "config.php";

    if(isset($_GET['deleteid'])) {
       $id=$_GET['deleteid'];

       $sql="DELETE FROM Feedback WHERE feedback_id = '$id'";
       $result = mysqli_query($con, $sql);
       if($result == TRUE) {
        echo '<script>deleted();</script>' ;
       }
       else {
        die(mysqli_error($con));
       }
    }
?>