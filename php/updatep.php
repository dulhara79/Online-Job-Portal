<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "job_data"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['jobID'], $_POST['name'], $_POST['jobType'], $_POST['address'], $_POST['salary'], $_POST['contactNo'])) 
    {
    // Retrieve data from the form
    $jobID = $_POST["jobID"];
    $name = $_POST["name"];
    $jobType = $_POST["jobType"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];
    $contactNo = $_POST["contactNo"];

    //sql quary
    $sql = "UPDATE jobdescription SET name='$name', jobType='$jobType', address='$address', salary='$salary', contactNo='$contactNo' WHERE jobID='$jobID'";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}else {
    // Provide a default value or handle the absence of data.
    $name = 'emplty';
    $jobType = 'emplty';
    $address = 'emplty'; 
    
}


    $conn->close();
}
?>