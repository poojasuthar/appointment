<?php 
include "header.php"; 
include"config_appointment.php";
echo $qry2="delete from paitent where id=".$_REQUEST["del_id"];
		mysqli_query($link,$qry2);
		header('location:http://localhost/appointment/admin/display_paitent.php');

?>

