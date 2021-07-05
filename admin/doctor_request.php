<?php 
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
	include"header.php";
	include"slider.php";
?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<div class="container-fluid" style="background-color: white;">	
    	<center><h1><i class="fa">&#xf0f0;&nbsp;Doctor Appoinment</i></h1></center>
  <table class="table table-striped table table-hover table table-bordered table-striped mb-0" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Experince</th>
      <th scope="col">Hospital Address</th>
      <th scope="col">Medical id</th>
      <th scope="col">View More</th>
	  <th scope="col">Status</th>
     </tr>
  </thead>
 <?php 
 //pending requests status=0
	$sql="select * from doctor where status=0";
	$result=mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
		?>
  <tbody>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['experince'];?> Years</td>
      <td><?php echo $row['hospitaladress'];?></td>
      <td><?php echo $row['medicalid'];?></td>
	  <td> <button type="button" class="btn btn-success" id="mybtn-<?php echo $i; ?>" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">
		  <i class="fa fa-eye"></i>
		  </button>
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
		<td>ID</td>
		<td><?php echo $row['id'];?></td>
		</tr>
		<tr> 
			<td>Name</td>
			<td><?php echo $row['name'];?></td>
		</tr>
		<tr>
		  <td>Mobile</td>
		  <td><?php echo $row['mobile'];?></td>
	  </tr>
      <tr>
		  <td>Email</td>
		  <td><?php echo $row['email']; ?></td>
	  </tr>
      <tr>
		  <td>Password</td>
		  <td><?php echo $row['password'];?></td>
	  </tr>
      <tr>
		  <td>Gender</td>
		<td><?php echo $row['gender'];?></td></tr>
      <tr>
		  <td>Date Of Birth</td>
		  <td><?php echo $row['dob'];?></td></tr>	
		<tr>
		  <td>Category</td>
		  <td><?php echo $row['category'];?></td>
		</tr>
		<tr>
		  <td>Experince</td>
		  <td><?php echo $row['experince'];?></td>
		</tr>
		<tr>
		  <td>City</td>
		  <td><?php echo $row['city'];?></td>
		</tr>
      <tr>
	  <td>Hospital Address</td>
	  <td><?php echo $row['hospitaladress'];?></td></tr>
      <tr>
	  <td>Medical ID</td>
	  <td><?php echo $row['medicalid'];?></td></tr>
     <tr>
		<td>Fees</td>
	 <td><?php echo $row['fees'];?></td></tr>
     <tr> 
	 <td>Qualification</td>
	 <td><?php echo $row['qualification'];?></td></tr>
     <tr> 
	 <td>Profile photo</td>
	 <td><?php echo"<img src='http://localhost/appointment/admin/upload/".$row["photo"]."' width='150px'>";?></td></tr>
	

                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
		  </td>
     <td>
	  	<?php
			switch($row['status']){
				case 0:
				echo "
					<form action='doctor_accept.php?req=accept' method='POST'>
						<input type='hidden' name='id' id='id' value='".$row['id']."'>
				<input type='hidden' name='email' id='email' value='".$row['email']."'>
						<input class='btn btn-primary' name='accept' type='submit' value='Accept' >
						
					</form>|
					<form action='doctor_reject.php?req=reject' method='GET'>
						<input type='hidden' name='id' id='id' value='".$row['id']."'>
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
 </tbody>
  <?php		
			$i++;
	}
	}
	else
	{
		echo "<h1 style='color:red;margin-left:20%;'>No data found</h1>";
	}
  ?>
 
  </table>
  
</div> 
</body>
</html>