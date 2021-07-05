<?php 
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
include "header.php"; 
include "slider.php";
?>
<div class="container-fluid" style="background-color: white;">	
    	<center><h1><i class="fa">&#xf0f0;&nbsp;View Doctors</i></h1></center><br>
  <table id="example" class="table table-striped table table-hover table table-bordered table-striped mb-0">
  <thead class="thead-dark">
    <tr>
     <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Dob</th>
	  <th scope="col">Category</th>
      <th scope="col">Experince in Years</th>
      <th scope="col">City</th>
      <th scope="col">Fees</th>
      <th scope="col">Qualification</th>
      <th scope="col">View More</th>
	  <th scope="col">Update</th>
      <th scope="col">Delete</th>
     
    </tr>
  </thead>
  <?php 
	$sql="select * from doctor where status=1";
	$result=mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0){
		$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
			
			
  ?>
  <tbody>
    <tr>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['dob'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><?php echo $row['experince'];?></td>
      <td><?php echo $row['city'];?></td>
      <td><?php echo $row['fees'];?></td>
      <td><?php echo $row['qualification'];?></td>
		<td>
		<div class="col-sm-1">
		  <button type="button" class="btn btn-success" id="mybtn-<?php echo $i; ?>" data-toggle="modal" data-target="#myModal-<?php echo $i; ?>">
		  <i class="fa fa-eye"></i>
		  </button>
		</div>
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
		  <td><?php echo $row['email'];?></td>
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
		  <td><?php echo $row['experince'];?> </td>
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
		<td>
			<a href="update_doctor.php?doctor_id=<?php echo $row['id'];?>">
			<button type="button" class="btn btn-primary" >
				<span class='glyphicon glyphicon-pencil'></span>
			</button></a>
		</td>
		<td>
			<button type="button" class="btn btn-danger" onclick="deleteme(<?php echo $row['id'];?>)" name="delete" value="Delete " style="margin:auto; display: block;">
				<i class="fa fa-trash"></i>
			</button>
		</td>
    </tr>
  </tbody>
  <?php
	$i++;
	}}
	else{echo "<h1 style='color:red;'>No data found</h1>";
	}
	
  ?>
</table></center>
</div> 
</body>
</html>
<script type="text/javascript">
		function deleteme(delid){
		if(confirm("Are you sure you want to delete doctor?"+delid)){
		window.location.href='doctor_delete.php?del_id='+delid+'';
		return true;
		}
		}
	</script>