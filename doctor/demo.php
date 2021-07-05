<?php include "header.php" ?>
<?php
// Database configuration 	
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "appoitement"; 
	 
	// Create database connection 
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
	?>
	<body>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php
session_start();
?>
<?php
if($_SESSION["name"]) {
?>
<center>
<p style="color:;">Welcome Dr.<?php echo $_SESSION["name"]; ?>.</p> 
</center>
<?php
}else {
	header("Location:login.php");
}
?>
<div class="container-fluid">
<?php

$sql="SELECT  userregistration.name, showappointment.from_paitent_id,showappointment.to_doctor_id,showappointment.status,
 showappointment.id AS r_id,userregistration.id,userregistration.name,userregistration.mobile,userregistration.age,userregistration.gender,userregistration.adress, showappointment.booked_on, showappointment.appointment_date, showappointment.reason, showappointment.status
FROM showappointment 
INNER JOIN userregistration
ON showappointment.from_paitent_id=userregistration.id 
INNER JOIN doctorregistration
ON showappointment.to_doctor_id=doctorregistration.id WHERE status=2 && to_doctor_id=".$_SESSION['id'] ;
				
				$result=mysqli_query($con,$sql);
				if(mysqli_affected_rows($con)>0)
				{
				$i=0;
				while($row=mysqli_fetch_assoc($result))
				{	
?>

    <div class="row" style="border:1px solid black;">
			<div class="col-xs-7 " >
				  Username::<?php echo $row['name'];?><br>
				  Paitent ID::<?php echo $row['from_paitent_id'];?><br>
				  Doctor Id::<?php echo $row['to_doctor_id'];?><br>
				  Row Id::<?php echo $row['r_id'];?><br>
				  Status::<?php if($row['status']==2) 
				  {
					  echo "Rejected";
				  }
						
	  ?>
			</div>
			<div class="col-xs-3 " >
			<a href="request_update1.php?r_id=<?php echo $row['r_id'];?>"> 
						<button class="btn btn-primary"  style="margin:auto; display: block;">Edit</button></a>	
			</div>
  </div>
  </div>
  <?php 
  $i++;
				}}?>
				
				
				
				
				
				
				
				
				
				
<?php include "header.php" ?>
<?php
// Database configuration 	
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "appoitement"; 
	 
	// Create database connection 
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
	?>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
<?php
session_start();
?>
<?php
if($_SESSION["name"]) {
?>
<center>
<p style="color:;">Welcome Dr.<?php echo $_SESSION["name"]; ?>.</p> 
</center>
<?php
}else {
	header("Location:login.php");
}
?>

<?php

$sql="SELECT  userregistration.name, showappointment.from_paitent_id,showappointment.to_doctor_id,showappointment.status,
 showappointment.id AS r_id,userregistration.id,userregistration.name,userregistration.mobile,userregistration.age,userregistration.gender,userregistration.adress, showappointment.booked_on, showappointment.appointment_date, showappointment.reason, showappointment.status
FROM showappointment 
INNER JOIN userregistration
ON showappointment.from_paitent_id=userregistration.id 
INNER JOIN doctorregistration
ON showappointment.to_doctor_id=doctorregistration.id WHERE status=1 && to_doctor_id=".$_SESSION['id'] ;
				
				$result=mysqli_query($con,$sql);
				if(mysqli_affected_rows($con)>0)
				{
				$i=0;
				while($row=mysqli_fetch_assoc($result))
				{	
?>
<div class="container-fluid">
    <div class="row" style="border:1px solid black;">
			<div class="col-xs-7 " >
				  Username::<?php echo $row['name'];?><br>
				  Paitent ID::<?php echo $row['from_paitent_id'];?><br>
				  Doctor Id::<?php echo $row['to_doctor_id'];?><br>
				  Status::<?php if($row['status']==1) 
				  {
					  echo "accepted";
				  }
						
	  ?>
			</div>
    <div class="col-xs-4" >
	  <div class="container">
		
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-sm" style="margin-top:15px;" id="mybtn-<?php echo $i; ?>" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">More Info</button>

			  <!-- Modal -->
			  <div class="modal fade"  id="myModal-<?php echo $i; ?>" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						user id::<?php echo $row['id'];?><br>
						name::<?php echo $row['name'];?><br>
						Mobile::<?php echo $row['mobile'];?><br>
						Age::<?php echo $row['age'];?><br>
						Gender::<?php echo $row['gender'];?><br>
						Address::<?php echo $row['adress'];?><br>
						Bookedon::<?php echo $row['booked_on'];?><br>
						Appointment Date::<?php echo $row['appointment_date'];?>			 
					</div>
					<div class="modal-footer">
					
						<a href="request_update2.php?r_id=<?php echo $row['r_id'];?>"> 
						<button class="btn btn-primary"  style="margin:auto; display: block;">Reject</button></a>	
	
						
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
					</div>
				
					</div>
      
				</div>
  </div>
  
</div>
</div>

 <?php	
				$i++;
				}
				}
	?>

</div>

</div>
      <br>
		
     
   











































<?php include "header.php" ?>
<?php
// Database configuration 	
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "appoitement"; 
	 
	// Create database connection 
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
	?>
	
	 <meta charset="utf-8">
  <link href="style1.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
session_start();
?>
<?php
if($_SESSION["name"]) {
?>
<center>
<p style="color:;">Welcome Dr.<?php echo $_SESSION["name"]; ?>.</p> 
</center>
<?php
}else {
	header("Location:login.php");
}
?>

<?php

$sql="SELECT  userregistration.name, showappointment.from_paitent_id,showappointment.to_doctor_id,showappointment.status,
 showappointment.id AS r_id,userregistration.id,userregistration.name,userregistration.mobile,userregistration.age,userregistration.gender,userregistration.adress, showappointment.booked_on, showappointment.appointment_date, showappointment.reason, showappointment.status
FROM showappointment 
INNER JOIN userregistration
ON showappointment.from_paitent_id=userregistration.id 
INNER JOIN doctorregistration
ON showappointment.to_doctor_id=doctorregistration.id WHERE status=1 && to_doctor_id=".$_SESSION['id'] ;
				
				$result=mysqli_query($con,$sql);
				if(mysqli_affected_rows($con)>0)
				{
				$i=0;
				while($row=mysqli_fetch_assoc($result))
				{	
?>
<div class="container-fluid">
    <div class="row" style="border:1px solid black;">
			<div class="col-xs-7">
				  Username::<?php echo $row['name'];?><br>
				  Paitent ID::<?php echo $row['from_paitent_id'];?><br>
				  Doctor Id::<?php echo $row['to_doctor_id'];?><br>
				  Status::<?php if($row['status']==1) 
				  {
					  echo "apporved";
				  }
						
	  ?>
			</div>
    <div class="col-xs-4" >
	  <div class="container">
		
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-sm" style="margin-top:15px;" id="mybtn-<?php echo $i; ?>" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">More Info</button>

			  <!-- Modal -->
			  <div class="modal fade"  id="myModal-<?php echo $i; ?>" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						user id::<?php echo $row['id'];?><br>
						name::<?php echo $row['name'];?><br>
						Mobile::<?php echo $row['mobile'];?><br>
						Age::<?php echo $row['age'];?><br>
						Gender::<?php echo $row['gender'];?><br>
						Address::<?php echo $row['adress'];?><br>
						Bookedon::<?php echo $row['booked_on'];?><br>
						Appointment Date::<?php echo $row['appointment_date'];?>			 
					</div>
					<div class="modal-footer">
					
						<a href="request_update2.php?r_id=<?php echo $row['r_id'];?>"> 
						<button class="btn btn-primary"  style="margin:auto; display: block;">Reject</button></a>	
	
						
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
					</div>
				
					</div>
      
				</div>
  </div>
  
</div>
</div>

 <?php	
				$i++;
				}
				}
	?>

</div>

</div>
      <br>
	   