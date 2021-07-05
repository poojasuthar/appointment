<?php 
	session_start();
	include "header.php";
	include "config_appointment.php";
?>
<div class="container" style="margin-top:3px">
	<form method="POST" action="">
	<div class="row no-gutters" >
		<!--Locaion dropdown start-->
		<div class="col-sm-3" style="background-color:">
			<select name="location" class="custom-select" style="width:100%;">
			<option selected>Select Location</option>
			<?php 	
				$qry1="SELECT distinct city FROM doctor";
				$result=mysqli_query($link,$qry1);
				if(mysqli_affected_rows($link)>0)
				{	
				$i=0;
				while($row=mysqli_fetch_assoc($result))
				{
					?>
				<option value="<?php echo $row['city'];?>"><?php echo $row["city"];?></option>
			<?php
					$i++;
					}
					}		
					else
					{
						echo"no data found";
					}
		?>
			</select>	
		</div>			
		<!--Locaion dropdown end-->
		
		<!--speciality dropdown start-->
		<div class="col-sm-3" style="background-color:">
		<select name="speacility" class="custom-select" style="width:100%;">
			<option selected>Select Specialist</option>
			<?php 	
			$qry1="SELECT distinct category FROM doctor";
					$result=mysqli_query($link,$qry1);
					if(mysqli_affected_rows($link)>0)
					{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
					{
						?>
				<option value="<?php echo $row['category'];?>"><?php echo $row["category"];?></option>
			<?php
					$i++;
					}
					}		
					else
					{
						echo"no data found";
					}
		?>
			</select>		
			</div>		
		<!--speciality dropdown end-->
		
		<!--Search bar start-->
		
		<div class=" col-sm-5 form-group has-search">
			<input name="search" type="text" class="form-control" placeholder="Search" >
		</div>
		<!--Search bar end-->
		
<div class="col-sm-1" style="background-color:">
<button type="submit" name="btn1" class="btn btn-success" style="align:center;display:grid; margin:auto;">Submit</button>	
</div>
</form>
</div>
<?php
if (isset($_POST['btn1']))
		{
			$add=$_POST['location'];
			$speciality=$_POST['speacility'];
			$search=$_POST['search'];
			
			$sql="SELECT * FROM doctor WHERE 
			(city='$add' AND category='$speciality') 
			OR
			CONCAT(name,city,hospitaladress,fees,qualification) LIKE '%$search%'";
		}

else
		{
			$sql="select * from doctor";	
		}
	
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{
	?>

  <div class="row bg-light" style="margin-top:30px">
    <div class="col-sm-2">
		<img src="<?php echo 'admin/upload/' . $row['photo']; ?>" height="120" width="150px;"  style="border: 5px solid #BEBEBE">      
    </div>
    <div class="col-sm-8">
		<h3><?php echo $row["name"] ?></h3>
		<table class="table table-sm table-borderless">
		<tbody>
		
			<tr> 
				<td style="width:40%;">Qualification</td>
				<td><?php echo $row["qualification"] ?></td>
			</tr>
			<tr> 
				<td>Location</td>
				<td><?php echo $row["city"] ?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?php echo ucfirst($row["gender"]); ?></td>
			</tr>
			<tr>
				<td>Specialist</td>
				<td><?php echo $row["category"] ?></td>
			</tr>
			<tr>
				<td>Experience</td>
				<td><?php echo $row["experince"] ?></td>
			</tr>
			<tr>
				<td>Hospital Address</td>
				<td><?php echo $row["hospitaladress"] ?></td>
			</tr>
			
	  </tbody>
	  </table>
	  
    </div>
	
	<div class="col-sm-2">
		<a href="book_appointment.php?doctor_id=<?php echo $row['id'];?>">
			<button class="btn btn-warning" value="" style="margin-top:30px;" data-toggle="modal" data-target="#form">
				Book appointment	
			</button>
		</a>
	</div>
  </div> 
  <?php 
		$i++;}
		}
?>	
  <br>
<?php include "footer.php" ?>
</div>


