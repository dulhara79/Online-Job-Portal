<?php
$servername = "localhost"; // Assuming your database is hosted on the same server
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "jobs"; // Your database name (in this case, "jobs")

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set the charset to utf8 (if needed)
$conn->set_charset("utf8mb4");
?>
