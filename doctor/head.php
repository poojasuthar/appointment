<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<!-- Image and text -->
<nav class="navbar navbar-expand-md navbar navbar-light" style="background: -webkit-linear-gradient(left,  #979A9A ,#212F3D);">
        <a href="#" class="navbar-brand">
            <img src="DrDoLogo.png" height="70" width="70" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler btn btn-light" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon btn btn-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ">
                <a href="index.php" class="nav-item nav-link active font-weight-bold text" style="color:white; " >Home</a>&nbsp;
                <a href="profile.php" class="nav-item nav-link font-weight-bold text" style="color:white;" >Profile</a>&nbsp;
                
                
            </div>
            <div class="navbar-nav ml-auto">
				<?php 
				//echo $_SESSION['name']; 
					include"config_appointment.php";
				if(!isset($_SESSION['name'])){
				?>
					<button class="btn btn-danger btn-rounded" type="submit" style="height: 45px; padding-top:1px;"><a href="login.php" class="nav-item nav-link" style="color: white;"><i class="fa fa-sign-in"></i>&nbsp;Login</a></button>
				
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
        