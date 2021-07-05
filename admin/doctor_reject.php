<?php
include "config_appointment.php";
$update_booking="UPDATE doctor SET status = 2 WHERE id=".$_REQUEST['id'];
$result=mysqli_query($link,$update_booking);
header('location:http://localhost/appointment/admin/doctor_request.php');
?>