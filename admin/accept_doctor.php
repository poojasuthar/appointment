<?php
include"header.php";
echo $update_booking="UPDATE doctor SET status = '1' WHERE id=".$_REQUEST['r_id'];
$result=mysqli_query($link,$update_booking);
header('location:rejected_doctors.php');
?>