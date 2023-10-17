<?php
    include "conn.php";

    if(isset($_GET['deleteid'])) {
       $id=$_GET['deleteid'];

       $sql="DELETE FROM reg_user WHERE user_id = '$id'";
       $result = mysqli_query($conn, $sql);
       if($result == TRUE) {
          echo '<script>deleted();</script>'
       }
       else {
        die(mysqli_error($conn));
       }
    }
?>