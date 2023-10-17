<?php

$sname= "localhost";  
$usname= "root";
$password = "";

$db_name = "jobslk";   

$con = mysqli_connect($sname, $usname, $password, $db_name);

if (!$con) {

    echo "Connection failed!";
}
?>