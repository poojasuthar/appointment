<?php
session_start();
	include "config_appointment.php";
	$_SESSION['paitentname'];
	$_SESSION['paitentid'];
if(isset($_REQUEST["edit"]))
{
	$id=$_SESSION['paitentid'];
	$v1=$_REQUEST["name"];
	$v2=$_REQUEST["email"];
	$v3=$_REQUEST["address"];
	$v4=$_REQUEST["age"];
	$v5=$_REQUEST["gender"];
	$v6=$_REQUEST["dob"];
	echo $qry2="update paitent set name='$v1',email='$v2',adress='$v3',age='$v4',gender='$v5',dob='$v6' where id=".$_SESSION['paitentid'];
	mysqli_query($link,$qry2);
	if($qry2){
		header('location:http://localhost/appointment/my_profile.php');
	}
}
?>


				<a href="update_my_profile.php?update_id=<?php echo $_SESSION['paitentid'];?>"> 
						<button class="btn btn-primary"  name="edit" style="margin:auto; display: block;">Edit</button></a>			