<?php 
include"slider.php";
?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<style>
	
	</style>

	<script>
		$(document).ready(function() {
		$('#example').DataTable();
		} );
	</script>
	<body style="font-size:16px;">
	<h3>
	<h1><strong><center>Accepted Appointments</center></strong></h1>
<div class="container-fluid">
<table id="example" class="table table-striped table-bordered" >
        <thead class="thead-dark">
            <th scope="col">Booking id</th>
      <th scope="col">Booked date</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Appointment Date</th>
      <th scope="col">Reason</th>
      <th scope="col">Status</th>
        </thead>  
	<tbody>
  	<?php 
	$sql="SELECT book_appointment.id as bid, doctor.name as dname, paitent.name, book_appointment.booked_on, book_appointment.appointment_date, book_appointment.reason, book_appointment.status
	FROM book_appointment 
	INNER JOIN doctor
	ON book_appointment.to_doctor_id=doctor.id
	INNER JOIN paitent
	ON book_appointment.from_paitent_id=paitent.id WHERE book_appointment.status=2";
	$result=mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
			
			
  ?>
    <tr class="table-active">
	 <td><?php echo $row['bid'];?></td>
	 <td><?php echo $row['booked_on'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['dname'];?></td>
      <td><?php echo $row['appointment_date'];?></td>
      <td><?php echo $row['reason'];?></td>
      <td><?php echo $row['status'];?></td>
    </tr>
  <?php
	$i++;}}
	
?>	</h3>	</tbody>
</table>
</div>
</html>