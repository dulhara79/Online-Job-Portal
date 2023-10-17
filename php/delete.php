<?php
include "connect.php";

if (isset($_GET['deleteid'])) {
    $first_name = $_GET['deleteid'];

    
    $sql = "DELETE FROM `job_applications` WHERE first_name = '$first_name'";
    $result = mysqli_query($con, $sql);

    if ($result == TRUE) { 
        header('location: display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>





