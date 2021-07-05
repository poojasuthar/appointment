<?php
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
include "header.php"; 
include "slider.php";
include"config_appointment.php";
?>
<div class="container" style="margin-left: 5px;">
  <div class="row">
    <div class="col-sm"></div>
    <div class="col-sm-9">
    	<h1>Pending Appointments</h1><br>
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-striped table table-hover table table-bordered table-striped mb-0" style="">
  <thead class="thead-dark">
    <tr>
	
      <th scope="col">Booking id</th>
      <th scope="col">Booked date</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Reason</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <?php 
	$sql="SELECT book_appointment.id as bid, doctor.name as dname, paitent.name, book_appointment.booked_on, book_appointment.appointment_date, book_appointment.reason, book_appointment.status
	FROM book_appointment 
	INNER JOIN doctor
	ON book_appointment.to_doctor_id=doctor.id
	INNER JOIN paitent
	ON book_appointment.from_paitent_id=paitent.id WHERE book_appointment.status=0";
	$result=mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
			
			
  ?>
  <tbody>
    <tr class="table-active">
	 <td><?php echo $row['bid'];?></td>
	 <td><?php echo $row['booked_on'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['dname'];?></td>
      <td><?php echo $row['appointment_date'];?></td>
      <td><?php echo $row['reason'];?></td>
      <td><?php echo $row['status'];?></td>
    </tr>
  </tbody>
  <?php
	$i++;}}
  ?>
</table>
</div>
</div>  
</body>
</html>