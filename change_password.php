<?php 
session_start();
if(!isset($_SESSION['paitentname'])){
	header('location:PaitentLogin.php');
}
	include "header.php";
	include "config_appointment.php";
	$_SESSION['paitentname'];
	$_SESSION['paitentid'];
?><script>
function myfun(){
var a=document.getElementById("p1").value;
		if(a.length < 5){
			document.getElementById("message").innerHTML="**Password length must be greater than 5 characters";
			return false;
		}
		if(a.length > 25){
			document.getElementById("message").innerHTML="**Password length must be smaller than 25 characters";
			return false;
		}
		if(a.search(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/)==-1){
			document.getElementById("message").innerHTML="**Password must have atleast one numeric digit, one uppercase and one lowercase letter.";
			return false;
		}		var b=document.getElementById("p2").value;
		if(a!=b){
			document.getElementById("message").innerHTML="**New passwords and conform password are not same";
			return false;
		}
		
}
		
</script>
<body>
	<div class="container">
    <div class="row d-flex">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
			<div class="card-body">
            <h5 class="card-title text-center"><b>Change</b> Login Password</h5>
			<hr>           
			<div class="body">
			<form method="POST" action="" onsubmit="return myfun()">
				<div class="form-group focused">
					<label class="form-control-label" for="input-username">Current Password</label>
					<input id="current" type="password" name="current" class="form-control">
				</div>
				<div class="form-group focused">							
					<label class="form-control-label" for="input-username">New Password</label>	<span id="message" style="color:red"></span>
					<input id="p1" type="password" name="new" class="form-control">
				</div>
				<div class="form-group focused">
					<label class="form-control-label" for="input-username">Conform new Password</label>
					<input id="p2" type="password" name="conform" class="form-control"></div>
				</div>
					 
				<center>
					<button type="button" class="btn btn-default">Close</button>
					<input type="submit" class="btn btn-primary" name="change" value="Save changes">
				</center>
			</form>
			</div>
		</div>		 
		</div>
	</div>
	</div>
<?php 
if (isset($_POST['change'])) 
{
	$sql="SELECT *from paitent WHERE id=" . $_SESSION["paitentid"];
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    if($_POST["current"] == $row["password"]) 
	{
        mysqli_query($link, "UPDATE paitent set password='" . $_POST["new"] . "' WHERE id='" . $_SESSION["paitentid"] . "'");
		?>
		<script type="text/javascript">
			alert("Profle Updated!!");
			window.location.href = "my_profile.php";
		</script>
	<?php
	} 
	else
	{
		?><div class="alert alert-danger" style="  position: fixed;bottom: 5px; left:2%; width: 96%;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Current Password</strong>is wrong.
</div>
<?php 
	}
}
?>