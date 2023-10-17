<?php


$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "job_data"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


if (isset($_GET['jobID'])) {
    $jobID = intval($_GET['jobID']);

    //delete quary
    $sql = "DELETE FROM jobdescription WHERE jobID = ?";

    $stmt = $pdo->prepare($sql);

    
    $stmt->bindParam(1, $jobID, PDO::PARAM_INT);

    
    if ($stmt->execute()) {
        echo "Record with jobID $jobID has been deleted.";
    } else {
        
        echo "Error deleting record with jobID $jobID.";
    }
} else {
    
    echo "jobID not provided.";
}
?>
