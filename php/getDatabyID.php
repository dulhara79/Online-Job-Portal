<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "job_data"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_GET['jobID'])) {
// Get the ID 
$id = $_GET['jobID'];

// SQL query to retrieve data from the table based on ID
$sql = "SELECT * FROM jobdescription WHERE jobID = $id";

// Execute the query
$result = $conn->query($sql);


if ($result) {
    // Check if there is one row in the result set (assuming 'id' is unique)
    if ($result->num_rows == 1) {
        // Fetch the data
        $row = $result->fetch_assoc();
        
        //assign data
        $jobID = $row["jobID"];
        $name = $row["name"];
        $jobType = $row["jobType"];
        $address = $row["address"];
        $salary = $row["salary"];
        $contactNo = $row["contactNo"];
        

        // Create an associative array with the data
        $data = array(
            "jobID" => $jobID,
            "name" => $name,
            "jobType" => $jobType,
            "address" => $address,
            "salary" => $salary,
            "contactNo" => $contactNo
            
        );

        // Encode the array as JSON
        $jsonResult = json_encode($data);

        // Send the JSON response
        header('Content-Type: application/json');
        echo $jsonResult;
    } else {
        echo "No record found for ID: $id";
    }
    
    // Close the result set
    $result->close();
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
} else {
echo "jobID not provided in the query parameter.";
}

?>
