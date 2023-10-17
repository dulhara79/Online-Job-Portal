<?php
//database parameters
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "job_data"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//create 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the form
    $name = $_POST["name"];
    $jobType = $_POST["jobType"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];
    $contactNo = $_POST["contactNo"];

    // SQL query to insert data into the table
    
    $sql ="INSERT INTO jobdescription( name, jobType, address, salary,  contactNo) VALUES ('$name','$jobType','$address','$salary','$contactNo')";


    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    header("Location: table.html");
    exit;
    $conn->close();
}



?>
