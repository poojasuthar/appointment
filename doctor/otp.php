<?php
session_start();

if($_SESSION["name"]) {
?>

<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">

    <div class="row d-flex" style="margin-top:15%;">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body" style="border:solid black 2px;">
		  <h6>Welcome <strong><?php echo $_SESSION["name"]; ?>.</strong> Click here to <a href="logout.php" tite="Logout">Logout.</a></h6>
<?php
}else {
	header("Location:login.php");
}
?>
<?php
/*if($_SESSION["OTP"]){
?>
YOUR OTP IS <?php echo $_SESSION["OTP"];?>.
<?php 	
}*/
?>
<form method="post">
<center><br><input type="password" name="otpvalue" id="otpvalue" placeholder="Enter OTP::">
<br>
<br>
<button type="submit" name="b1"  class="btn btn-primary" >Submit</button></center>
</form>


<?php

if(isset($_REQUEST["b1"]))
{
	$rno=$_SESSION['OTP'];
	$urno=$_POST['otpvalue'];
	if(!strcmp($rno,$urno))
	{
header("Location:index.php");
	}
	else
	{
	echo "otp dose note match";
	header("Location:login.php");
	}
}
?>
</center>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
