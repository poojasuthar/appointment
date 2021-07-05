<?php 
include"config_appointment.php";	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dr.Do</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="login.css">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light headerbg" style="background: -webkit-linear-gradient(left,  #F68585, #5CA7EC); ">   
	   <a href="http://localhost/appointment/index.php" class="navbar-brand">
            <img src="img/DrDoLogo.png" height="70" width="70" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="http://localhost/appointment/index.php" class="nav-item nav-link active font-weight-bold text" style="color:white">Home</a>
                <a href="http://localhost/appointment/show_appointment.php" class="nav-item nav-link font-weight-bold text"
				style="color:white"
				>Show Appointments</a>
            <a href="http://localhost/appointment/my_profile.php" class="nav-item nav-link font-weight-bold text"
				style="color:white"
				>Profile</a>
                
			</div>
			<div class="navbar-nav ml-auto">
			<?php
			if(!isset($_SESSION['paitentname'])){
			?>
                <button class="btn btn-danger btn-rounded" type="submit" style="height: 45px; padding-top:1px;"><a href="http://localhost/appointment/PaitentLogin.php" class="nav-item nav-link" style="color: white;"><i class="fa fa-sign-in"></i>&nbsp;Login</a></button>
            
			<?php 
			}
			else{
			?>
			<button class="btn btn-danger btn-rounded" type="submit" style="height: 45px; padding-top:1px;"><a href="logout.php" class="nav-item nav-link" style="color: white;"><i class="fa fa-sign-in"></i>&nbsp;Logout</a></button>
			<?php 
			}
			?>
			</div> 
        </div>
    </nav>
