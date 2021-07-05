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
   <h6> <strong>Welcome<?php echo $_SESSION["name"]; ?></strong></h6> 
</center>
<div class="container">
<?php
   }else {
   	header("location:login.php");
   }
   $sql="SELECT book_appointment.id AS r_id,paitent.id,paitent.name,paitent.mobile,paitent.age,paitent.gender,paitent.adress ,paitent.email, book_appointment.booked_on, book_appointment.appointment_date,book_appointment.appointment_start, book_appointment.appointment_end, book_appointment.reason, book_appointment.status
   FROM book_appointment 
   INNER JOIN paitent
   ON book_appointment.from_paitent_id=paitent.id 
   INNER JOIN doctor
   ON book_appointment.to_doctor_id=doctor.id WHERE book_appointment.status=0 && to_doctor_id=".$_SESSION['id']." ORDER BY book_appointment.status"; 
   	$result=mysqli_query($link,$sql);
   		if(mysqli_affected_rows($link)>0)
   				{	
   					$i=0;
   					while($row=mysqli_fetch_assoc($result))
   				{
   					?>
<div class="row" style="-webkit-border-radius: 0% 0% 100% 100% / 0% 0% 8px 8px;
   -webkit-box-shadow: rgba(0, 0, 0,.30) 0 2px 3px;">
   <div class="col-sm-5" style="margin-left:10px;" >
      <br><table  style="align:center;  border-left: 1px solid red; border-right: 1px solid red;" class="table table-borderless">
         <tbody>
            <tr>
               <td>Patient Name</td>
               <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
               <td>Appointment Date</td>
               <td><?php echo $row['appointment_date'];?></td>
            </tr>
			<tr>
               <td>Appointment Time</td>
               <td><?php echo $row['appointment_start']."-".$row['appointment_end'];?></td>
            </tr>
         </tbody>
      </table>
   </div>
   <div class="col-sm-3" >
   <br>
   <br>
               <?php 
                  switch($row['status']){
				case 0:
				echo "
					<form action='request_accept.php?req=accept' method='GET'>
						<input type='hidden' name='r_id' id='r_id' value='".$row['r_id']."'>
						<input type='hidden' name='email' id='email' value='".$row['email']."'>
						<input class='btn btn-primary' name='accept' type='submit' value='Accept '>
					</form>	
					<br>
					<form action='request_reject.php?req=reject' method='GET'>
						<input type='hidden' name='r_id' id='r_id' value='".$row['r_id']."'>
						
							<input class='btn btn-danger' type='submit' value='Reject '>
					<br>
					<br>
					<br>
					</form>					
					";
					break;

				case 1:
					echo "<h4  style='color: Green;'>Appointment Accepted</h4>";
					break;
				case 2:
					echo "<h4  style='color:red;'>Appointment Rejected</h4>";					
					break;
				
			}?>
            <td>
         </tbody>
      </table>
   </div>
   <div class="col-sm-3">
      <button type="button" class="btn btn-info btn-sm" style="margin-top:15px;" id="mybtn-<?php echo $i; ?>" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">More Info</button>
   </div>
   <br>
   <!-- Modal -->
   <div class="modal fade"  id="myModal-<?php echo $i; ?>" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <table class="table">
                  <tbody>
                     <center>
                        <h4><strong><i>More Patient Details</i></strong></h4>
                     </center>
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
					<tr>
                        <th scope="row">Appointment Time</th>
						<td><?php echo $row['appointment_start']."-".$row['appointment_end'];?></td>
                    </tr>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
</div>
<?php	
   $i++;
   }
   }
   else{
	   echo "<center><mark style='color:red'>There are no pending appointent requests.</mark></center>";
   }
   ?>
   </div>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
   </br>
	<?php include "footer.php" ; ?>