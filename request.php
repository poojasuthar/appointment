<?php
include "config_appointment.php";
$update_booking="UPDATE book_appointment SET status = 1 WHERE id=".$_REQUEST['r_id'];
$result=mysqli_query($link,$update_booking);
header('location:http://localhost/doctor/doctor_index.php');
?>