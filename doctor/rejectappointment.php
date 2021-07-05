<?php 
session_start();
include "head.php"; 
include "config_appointment.php";

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
<p style="color:;"><strong>Welcome <?php echo $_SESSION["name"]; ?></strong></p> 
</center>
<?php
}else {
	header("Location:login.php");
}
?>

<?php
$sql="SELECT  paitent.name, book_appointment.from_paitent_id,
book_appointment.to_doctor_id,
book_appointment.status,
book_appointment.id AS r_id,
paitent.id,
paitent.name,
paitent.mobile,
paitent.age,
paitent.gender,
paitent.adress,
book_appointment.booked_on, 
book_appointment.appointment_date, 
book_appointment.reason
FROM book_appointment 
INNER JOIN paitent
ON book_appointment.from_paitent_id=paitent.id 
INNER JOIN doctor
ON book_appointment.to_doctor_id=doctor.id WHERE book_appointment.status=2 && to_doctor_id=".$_SESSION['id'] ;
				
				$result=mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)>0)
				{
				$i=0;
				while($row=mysqli_fetch_assoc($result))
				{	
?>
<div class="row container-fluid" style="-webkit-border-radius: 0% 0% 100% 100% / 0% 0% 8px 8px;
   -webkit-box-shadow: rgba(0, 0, 0,.30) 0 2px 3px;">    
		
			<div class="col-sm-7 " >
				  Username::<?php echo $row['name'];?><br>
				  Paitent ID::<?php echo $row['from_paitent_id'];?><br>
				  Doctor Id::<?php echo $row['to_doctor_id'];?><br>
				  Status::<?php if($row['status']==2) 
				  {
					  echo "Reject";
				  }
						
	  ?>
			</div>
    <div class="col-sm-4" >
	  
		  <!-- Trigger the modal with a button -->
		  <button type="button" class="btn btn-info btn-sm" style="margin-top:15px;" id="mybtn-<?php echo $i; ?>" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">More Info</button>

			  <!-- Modal -->
			  <div class="modal fade"  id="myModal-<?php echo $i; ?>" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
										<div class="modal-body">
					<table class="table">
  
  <tbody>
  <center><h4><strong><i>More Patient Details</i></strong></h4></center>
    <tr>
      <th scope="row">User id</th>
      <td><?php echo $row['id'];?><br></td>
    </tr>
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $row['name'];?><br></td>
    </tr>
    <tr>
      <th scope="row">Mobile</th>
      <td><?php echo $row['mobile'];?><br></td>
    </tr>
	<tr>
      <th scope="row">Age</th>
      <td><?php echo $row['age'];?><br></td>
    </tr>
	<tr>
      <th scope="row">Gender</th>
      <td><?php echo $row['gender'];?><br></td>
    </tr>
	<tr>
      <th scope="row">Address</th>
      <td><?php echo $row['adress'];?><br></td>
    </tr>
	<tr>
      <th scope="row">Bookedon</th>
      <td><?php echo $row['booked_on'];?><br></td>
    </tr>
	<tr>
      <th scope="row">Appointment Date</th>
      <td><?php echo $row['appointment_date'];?></td>
    </tr>
  </tbody>
</table>
						 
					</div>
					<div class="modal-footer">
					
						<a href="request_update1.php?r_id=<?php echo $row['r_id'];?>"> 
						<button class="btn btn-primary"  style="margin:auto; display: block;">Accept</button></a>	
	
						
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
					</div>
				
					</div>
      
				</div>
  </div>
  
</div>

 

</div>

</div>
</div>
<br>
<?php	
				$i++;
				}
				}
				
				
	?>
	
	<br>
	<br>
	<br>
	<br>	
	<br>	
	<br>	
	<br>
	<br>
	<br>
<?php include "footer.php"; ?>