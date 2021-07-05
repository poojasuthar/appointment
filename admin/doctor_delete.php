<?php 
include "header.php"; 
include"config_appointment.php";
$qry2="delete from doctor where id=".$_REQUEST["del_id"];
		mysqli_query($link,$qry2);
		header('location:http://localhost/appointment/admin/display_doctor.php');

?>

