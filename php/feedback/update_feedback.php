<?php 
session_start();
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $feedback = $_POST['feedback'];
    $suggestions = $_POST['suggestions'];
    $id = $_POST['id'];

    $sql = "UPDATE poll SET name='$name', email='$email', phone='$phone', feedback='$feedback', suggestions='$suggestions' WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        header("Location: http://localhost/Online-Job-Portal/php/feedback/view_feedback.php");
exit();

    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}
?>
