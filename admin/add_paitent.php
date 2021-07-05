<?php 
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
	include "header.php";
	include "slider.php";
?>
<script>
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
		}	
		var b=document.getElementById("p2").value;
		if(a!=b){
			document.getElementById("message").innerHTML="**Passwords are not same";
			return false;
		}
		
		var c=document.getElementById("p3").value;
		if(isNaN(c)){
			document.getElementById("mobile").innerHTML="**Only numbers are allowed";
			return false;
		}
		if((c.length) < 10){
			document.getElementById("mobile").innerHTML="**Please enter 10 digit mobile number";
			return false;
		}
		if((c.length) > 10){
			document.getElementById("mobile").innerHTML="**Please enter 10 digit mobile number";
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
            <h5 class="card-title text-center"><b>Add</b> New Patient</h5>
            <br>
			<form class="form-signin" method="post" onsubmit="return myfun()" action="">
			    <div class="form-group">
				  <input type="text" class="form-control" placeholder="Full Name" name="name" >
				</div> 
				 <p id="mobile" style="color:red"> </p>				
				<div class="form-group">
				  <input type="text"  id="p3"  class="form-control" placeholder="Mobile Number" name="mobile" >
				</div>  
			
				<div class="form-group">
				  <input input type="email" name="email"  class="form-control"  placeholder="Email">
				</div>
				 <p id="message" style="color:red"> </p>
				<div class="input-group mb-2">
				 	<input type="password" id="p1" name="password"  class="form-control" placeholder="Password" >
					&nbsp;&nbsp;&nbsp;
					<input type="password" id="p2" name="password"  class="form-control" placeholder="Conform  Password" >
					<span id="messages"> </span>
				</div>
				<div class="form-group">
				  <input type="number" name="age"  class="form-control"  placeholder="Age">
				</div>
				<div class="form-group">
					<textarea name="adress" class="form-control" placeholder="Address"></textarea>
				</div>
				<div class="form-group">
					<input type="date" class="form-control" id="birthday" name="dateofbirth">
 				</div>
				Select Your Gender::<br>
					<input type="radio" name="gender" value="male">Male<br>
					<input type="radio" name="gender" value="female">Female<br>
					<input type="radio" name="gender" value="other">Other<br>				
				<br>
				<button class="btn btn-lg btn-success btn-block text-uppercase" name="b1" type="submit" onclick="myFunction()">Sign in</button>
				
			</form>
		  </div>		  
        </div>
      </div>
	</div>
  </div>
</body>
</html>
<?php
if(isset($_POST["b1"]))
{
	$Name=$_POST["name"];
	$Mobile=$_POST["mobile"];
	$Email=$_POST["email"];
	$Password=$_POST["password"];
	$Age=$_POST["age"];
	$Adress=$_POST["adress"];
	$Gender=$_POST["gender"];
	$dob= date('Y-m-d',strtotime($_POST['dateofbirth']));
	/*
	//conection
	if($con){
		echo "database connected succsefully";
	}
		else{
		echo "Error While connecting database";		
	}*/
	
	$check=mysqli_query($link,"select email from paitent where email='$Email'");
	$qry2=mysqli_num_rows($check);
	if(($qry2)>0)
	{
			?>
				<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Email</strong>&nbsp;already exists.
</div>

<?php 
	}
	else
	{
		$qry="insert into paitent(name,mobile,email,password,age,adress,gender,dob) values ('$Name','$Mobile','$Email','$Password','$Age','$Adress','$Gender','$dob')";
		$data=mysqli_query($link,$qry);
		if($qry){?>
			<script type="text/javascript">
			alert("Patient Added!!");
			window.location.href = "http://localhost/appointment/admin/display_paitent.php";
		</script>
<?php		}
	}
	mysqli_close($link);
}
?>