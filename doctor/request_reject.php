<?php
// Database configuration 	
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "appointment"; 
	 
	// Create database connection 
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}

$update_booking="UPDATE book_appointment SET status = 2 WHERE id=".$_REQUEST['r_id'];
$result=mysqli_query($con,$update_booking);
header('location:rejectappointment.php');
?>