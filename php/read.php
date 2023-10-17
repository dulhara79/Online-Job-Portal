<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "job_data"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM jobdescription";

$result = $conn->query($sql);
if ($result) {
    $data = array(); // Initialize an array to store the data

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; // Append each row to the data array
        }

        
        // Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo "No records found in the table.";
    }
} else {
    echo "Error: " . $conn->error;
}

