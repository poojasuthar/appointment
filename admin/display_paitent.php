<?php 
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
include "header.php"; 
include "slider.php";
include"config_appointment.php";
?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<div class="container" style="">

    	<center><h1><i class="fa fa-user">&nbsp;View Patient's</i></h1></center><br>
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-striped table table-hover table table-bordered table-striped mb-0" style="">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col">Dob</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
     
    </tr>
  </thead>
  <?php 
	$sql="select * from paitent";
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
      <td><?php echo $row['mobile'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['age'];?></td>
      <td><?php echo $row['adress'];?></td>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['dob'];?></td>
      <td>		
		<a href="update_paitent.php?p_id=<?php echo $row['id'];?>">
		<button type="button" class="btn btn-primary" >
				<span class='glyphicon glyphicon-pencil'></span>
			</button>
		</a>
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
  ?>
</table></center>
</div> 
 <script type="text/javascript">
         function deleteme(delid){
         if(confirm("Are you sure you want to delete this data?")){
         window.location.href='paitent_delete.php?del_id='+delid+'';
         return true;
         }
         }
      </script>
</div>
</body>
</html>