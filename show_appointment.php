<?php 
   session_start();
   if(!isset($_SESSION['paitentname'])){
   	header('location:PaitentLogin.php');
   }
   include"header.php";
   	?>
<body>
   <div class="container">
      <?php
         include "config_appointment.php";
         $sql1="SELECT book_appointment.id as bid, doctor.name as dname, paitent.name, book_appointment.booked_on, book_appointment.appointment_date, book_appointment.appointment_start, book_appointment.appointment_end,book_appointment.reason, book_appointment.status, book_appointment.status
         FROM book_appointment 
         INNER JOIN doctor
         ON book_appointment.to_doctor_id=doctor.id
         INNER JOIN paitent
         ON book_appointment.from_paitent_id=paitent.id WHERE from_paitent_id=".$_SESSION['paitentid']; 
         $result=mysqli_query($link,$sql1);
         	if(mysqli_affected_rows($link)>0)
         			{	
         				$i=0;
         				while($row=mysqli_fetch_assoc($result))
         			{	
          ?>
      <hr>
      <div class="row" style="-webkit-border-radius: 0% 0% 100% 100% / 0% 0% 8px 8px;
         -webkit-box-shadow: rgba(0, 0, 0,.30) 0 2px 3px;">
         <div class="col-sm-9" >
            <table class="table table-sm table-borderless">
               <tbody>
                  <tr>
                     <td>Request ID</td>
                     <td><?php echo $row['bid'];?></td>
                  </tr>
                  <tr>
                     <td>Doctor Name</td>
                     <td><?php echo $row['dname'];?></td>
                  </tr>
                  <tr>
                     <td>Paitent Name</td>
                     <td><?php echo $row['name'];?></td>
                  </tr>
                  <tr>
                     <td>booked on</td>
                     <td><?php echo $row['booked_on'];?></td>
                  </tr>
                  <tr>
                     <td>appointment date</td>
                     <td><?php echo $row['appointment_date'];?></td>
                  </tr>
                  <tr>
				   <td>Appointment Time</td>
				   <td><?php echo $row['appointment_start']."-".$row['appointment_end'];?></td>
					</tr>
				  <tr>
                     <td>Reason</td>
                     <td><?php echo $row['reason'];?></td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-sm-1" >
            <table class="table table-sm table-borderless">
               <tbody>
                  <td>
                     <h6>Status:</h6>
                     <?php 
                        if($row['status']==0){
                        	echo("<h5 style='color:blue'>Pending</h5>");
                        }
                        else if($row['status']==1){
                        	echo("<h5 style='color:green'>Accepted</h5>");
                        }
                        else{
                        	echo(" <h5 style='color:red'> Rejected </h5>");
                        }?>
                  <td>
               </tbody>
            </table>
         </div>
         <div class="col-sm-2">
            <?php 
               if($row['status']==0){
               ?>
            <input type="button" class="btn btn-danger" onclick="deleteme(<?php echo $row['bid'];?>)" name="delete" value="Delete " style="margin:auto; display: block;">
            <?php
               }
               	else if($row['status']==1){?>
            <a href="download.php?r_id=<?php echo $row['bid'];?>"> 
            <button class="btn btn-primary"  style="margin:auto; display: block;">Download</button></a>	
            <?php
               }
               else{
               	echo("");
               }?>
         </div>
      </div>
      <?php 
         $i++;}
         }
         ?>
      <script type="text/javascript">
         function deleteme(delid){
         if(confirm("Are you sure you want to delete this data?")){
         window.location.href='delete_appointment.php?del_id='+delid+'';
         return true;
         }
         }
      </script>
   </div><br>
</body>
<?php 
include"footer.php";
?>
</html>