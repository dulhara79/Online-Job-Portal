<?php
session_start();

include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_SESSION['valid'])) {
        // Delete a user account
        $deleteQuery = mysqli_query($con, "DELETE FROM users WHERE Id=$id");
    } elseif (isset($_SESSION['valid_company'])) {
        // Delete a company account
        $deleteQuery = mysqli_query($con, "DELETE FROM companies WHERE CompanyId=$id");
    }

    if ($deleteQuery) {
        // Deletion successful, redirect to the login page or another appropriate page
        header("Location: ../index.php");
        exit();
    } else {
        // Error handling if the delete query fails
        echo "Error deleting account: " . mysqli_error($con);
    }
} else {
    // Redirect to the index page if the ID parameter is not set
    header("Location: ../index.php");
    exit();
}
?>
