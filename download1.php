<?php 
include "header.php";
include "config_appointment.php";

session_start();
$_SESSION['paitentname'];
$_SESSION['paitentid'];
$sql="select * from paitent where id=".$_SESSION['paitentid'];
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{
	?>
<div class="container" id="heading">
		<hr>
		<h3 class="text-center">Paitent</h3>
		<hr>
<table border="0px" class="table table-borderless table-sm" style="align:center">
  <tbody >
    <tr>
      <th class="text-center" scope="col">Name</th>
      <td class="text-center"scope="col"><?php echo $row['name'];?></td>
    </tr>
    <tr>
      <th class="text-center" scope="col">Id</th>
      <td class="text-center"scope="col"><?php echo $row["id"]; ?></td>
    </tr> 
	<tr>
      <th class="text-center" scope="col">Contact Number</th>
      <td class="text-center"scope="col"><?php echo $row['mobile'];?></td>
    </tr>
	<tr>
      <th class="text-center" scope="col">Age</th>
      <td class="text-center"scope="col"><?php echo $row['age'];?></td>
    </tr>
	<tr>
      <th class="text-center" scope="col">Gender</th>
      <td class="text-center"scope="col"><?php echo $row['gender'];?></td>
    </tr>	
	<tr>
      <th class="text-center" scope="col">Address</th>
      <td class="text-center"scope="col"><?php echo $row['adress'];?></td>
    </tr>
  </tbody>
 </table>
<hr>
<h3 class="text-center">Doctor</h3>
<hr>
		

	<?php 
		$i++;}
		}
		
	$sql="select * from doctor where id=".$_REQUEST["doctor_id"];
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{
	?>
		<table class="table table-borderless table-sm" style="align:center">
  <tbody>
  
    <tr>
      <th class="text-center" scope="col">Name</th>
      <td class="text-center"scope="col"><?php echo $row['name'];?></td>
    </tr>
    <tr>
      <th class="text-center" scope="col">Id</th>
      <td class="text-center"scope="col"><?php echo $row["id"] ?></td>
    </tr> 
	<tr>
      <th class="text-center" scope="col">Specialist in</th>
      <td class="text-center"scope="col"><?php echo $row['category'];?></td>
    </tr>	
	<tr>
      <th class="text-center" scope="col">Contact Number</th>
      <td class="text-center"scope="col"><?php echo $row['mobile'];?></td>
    </tr>
	<tr>
      <th class="text-center" scope="col">Age</th>
      <td class="text-center"scope="col"><?php echo $row['age'];?></td>
    </tr>
	<tr>
      <th class="text-center" scope="col">Hospital Address</th>
      <td class="text-center"scope="col"><?php echo $row['hospitaladress'];?></td>
    </tr>
  </tbody>
 </table>
			  <?php 
		$i++;}
		}
?>
	<br>
	