<?php include"header.php";
include "config_appointment.php";
session_start();
echo $_SESSION['doctorname'];
echo "<br>ID==".$_SESSION['doctorid'];
?>

<h1>Requests:</h1>
 <table class="table"> 
 <thead>
    <tr>
      <th scope="col">Request id</th>
      <th scope="col">Paitent Name</th>
      <th scope="col">Booked on</th>
      <th scope="col">Appointment date</th>
      <th scope="col">Reason</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
<?php 
$sql="SELECT book_appointment.id AS r_id, paitent.name, book_appointment.booked_on, book_appointment.appointment_date, book_appointment.reason, book_appointment.status
FROM book_appointment 
INNER JOIN paitent
ON book_appointment.from_paitent_id=paitent.id 
INNER JOIN 	doctorregistration
ON book_appointment.to_doctor_id=doctorregistration.id WHERE to_doctor_id=".$_SESSION['id'];
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{
					?>
					
<tbody>
    <tr>
      <td><?php echo $row['r_id'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['booked_on'];?></td>
      <td><?php echo $row['appointment_date'];?></td>
      <td><?php echo $row['reason'];?>	</td>
      <td>
	  	<?php
			switch($row['status']){
				case 0:
				echo "
					<form action='request_accept.php?req=accept' method='GET'>
						<input type='hidden' name='r_id' id='r_id' value='".$row['r_id']."'>
						<input class='btn btn-primary' type='submit' value='Accept'>
					</form>|
					<form action='request_reject.php?req=reject' method='GET'>
						<input type='hidden' name='r_id' id='r_id' value='".$row['r_id']."'>
							<input class='btn btn-danger' type='submit' value='Reject'>
					</form>					
					";
					break;

				case 1:
					echo "<h4  style='color: Green;'>Accepted</h4>";
					break;
				case 2:
					echo "<h4  style='color:red;'>Rejected</h4>";					
					break;
				
			}
		?>
	  </td>
     
    </tr>
  </tbody><?php	
				$i++;
				}
				}
	?>
</table>
				
	