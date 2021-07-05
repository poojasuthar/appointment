<?php
include "config_appointment.php";
$update_booking="UPDATE book_appointment SET status = 2 WHERE id=".$_REQUEST['r_id'];
$result=mysqli_query($link,$update_booking);
header('location:http://localhost/appointment/doctor_index.php');
?>