<?php include "head.php"; session_start();
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
if($_SESSION["name"]) {
?>
<center>
<p style="color:black;">Welcome Dr.<?php echo $_SESSION["name"]; ?>.</p> 
</center>
<?php 
}else {
	header("Location:login.php");
}

?>
<div class="container">
	<?php
		$doctorid=$_SESSION['id'];
		$sql="select doctorid from scheduleappointment where doctorid='$doctorid'";
		$result1=mysqli_query($link, $sql);
		if(mysqli_num_rows($result1)>0){
		header('location:updatescheduleappointment.php');
		}
		else{
		header('location:scheduleappointment.php');
		}
		/*if($result1 == $sql){
			$id_exists=true;
			header('location:updatescheduleappointment.php');
		}
		else
		{
			$id_exists=false;
						header('location:scheduleappointment.php');
						
		}
		
	/*	if(mysqli_affected_rows($con)>0){
			$i=0;
			while($row=mysqli_fetch_assoc($result1))
			{
	?>	
	<div class="input_field">
	<?php
	
					/*$datetimelocal_explode=$row['datetimelocal'];
						//echo(is_null($datetimelocal_explode))
						if(is_null($datetimelocal_explode))
						{
							echo "hey";
						}
						else{
						header("location:updatescheduleappointment.php");
						echo 'This line is printed.';
							
						}*/
				//echo "datetimelocal is " . is_null($datetimelocal_explode) . "<br>";
				?>
	</div>
</div>
