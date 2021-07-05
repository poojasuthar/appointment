<?php
include "config_appointment.php"; 
?>
<html>
<head>
<title>Dr.Do</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row d-flex">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b>Doctor</b>Registration</h5>
       	<br>
<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Enter Your Name::</td>
			<td><input type="text" name="name" required></td>
		</tr>
		<tr>
			<td>Enter Your Mobile No.::</td>
				<td>
					<input type="text" name="mobile" required><br>
				</td>
		</tr>
		<tr>
			<td>Enter Your email adress::</td>
				<td>
					<input type="email" name="email" required>
				</td>
		</tr>
		<tr>
			<td>Enter Your password::</td>
			<td>
				<input type="password" name="password" required>
			</td>
		</tr>
		<tr>
			<td>Enter Your Age::</td>
				<td>
					<input type="number" name="age" required><br>
				</td>
		</tr>
		<tr>
			<td>Enter Your Adress::</td>
				<td>
					<textarea name="address" required></textarea>
				</td>
		</tr>
		<tr>
			<td>Select Your Gender::</td>
				<td>
					<input type="radio" name="gender" value="male" required>Male<br>
					<input type="radio" name="gender" value="female" required>Female<br>
					<input type="radio" name="gender" value="other" required>Other<br>
				</td>
		</tr>
		<tr>
			<td>Enter Your DOB::</td>
				<td>
					<input type="DATE" name="dateofbirth" required><br>
				</td>
		</tr>
		<tr>
			<td>Select category::</td>
			<td>
				<select name="category">
						<option value="General Physicians"/>General Physicians<br>
						<option value="Pediatricians"/>Pediatricians<br>
						<option value="General Surgeon" />General Surgeon<br>
						<option value="Cardiologist" />Cardiologist<br>
						<option value="Dentist" />Dentist<br>
						<option value="Dermatologists"/>Dermatologists<br>
						<option value="Gynecologist" />Gynecologist<br>
						<option value="ENT Specialist" />ENT Specialist<br>
				
				</select>
			</td>
		</tr>
			<tr>
			<td>Enter Your Experince::</td>
			<td>
				<input type="number" name="experince" required>
			</td>	
		</tr>
		<tr>
		<td>Enter Your Hospital/clinic Adress::</td>
				<td>
					<textarea name="hospitaladress" required></textarea>
				</td>
		</tr>
		<tr>
		<td>Enter Your Medical Id::</td>
				<td>
					<input type="text" name="medicalid" required>
				</td>
		</tr>
		<tr>
		<td>Upload passport size photo::</td>
			<td>
				<input type="file" name="photo" id="photo" required> 
			</td>
		</tr>
		<tr>
			<td><center><input type="submit" name="b1"></center></td>
		</tr>
	<table>
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
	$Address=$_POST["address"];
	$Gender=$_POST["gender"];
	$dob= date('Y-m-d',strtotime($_POST['dateofbirth']));
	$Category=$_POST["category"];
	$Experince=$_POST["experince"];
	$Hospitaladress=$_POST["hospitaladress"];
	$Medicalid=$_POST["medicalid"];
	$fn1=time().$_FILES["photo"]["name"];

	/*
	//conection
	if($con){
		echo "database connected succsefully";
	}
		else{
		echo "Error While connecting database";		
	}*/
	if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
	echo("$Email is a valid email address");
	} else {
	echo("$Email is not a valid email address");
	}
	$check=mysqli_query($link,"select email from doctor where email='$Email'");
	$qry2=mysqli_num_rows($check);
	if(($qry2)>0)
	{
		echo"email is alredy taken";
	}
	else
	{
	$qry="insert into doctor(name,mobile,email,password,age,address,gender,dob,category,experince,hospitaladress,medicalid,photo) values ('$Name','$Mobile','$Email','$Password','$Age','$Address','$Gender','$dob','$Category','$Experince','$Hospitaladress','$Medicalid','$fn1')";
	mysqli_query($link,$qry);
	}
	 if($_FILES["photo"]["size"]>0)
			{
				move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/$fn1");
			}	
	
	mysqli_close($link);
	/*echo "Your Name is::" .$Name."<br>";
	echo "Your Email is::" .$Email."<br>";
	echo "Your Password is::" .$Password."<br>";
	echo "Your Gender is::" .$Gender."<br>";
	echo "Your Age is::" .$Age."<br>";*/
}
?>