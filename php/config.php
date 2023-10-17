<<<<<<< HEAD
<?php
ob_start(); 

$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect("localhost", "root", "", "feedback"); 

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}
=======
<?php 
 
 $con = mysqli_connect("localhost","root","","tutorial") or die("Couldn't connect");
>>>>>>> c72fe53c23a29b47e0bb4d6f1ea0b083ed69c570

?>