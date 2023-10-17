<?php 
session_start();
require 'config.php';

if (isset($_GET['id'])) {
    $feedbackID = $_GET['id'];
    $sql = "DELETE FROM poll WHERE id=$feedbackID";
    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/feedback/view_feedback.php"); // Redirect to mainpage.php
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Invalid feedback ID";
}
?>
