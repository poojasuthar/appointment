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
include "header.php";
$location=$_POST['location'];
$speacility=$_POST['speacility'];

$search_query = "SELECT * FROM doctor";
$query_cond = "";

if($speacility !="") {
      $query_cond .= " name='$speacility'";
}
if($by_group !="") {

      if(!empty($query_cond)){
          $query_cond .= " AND ";
       }

      $query_cond .= " blood_group='$by_group'";
}

if($by_level !="") {

      if(!empty($query_cond)){
          $query_cond .= " OR ";
       }

      $query_cond .= " e_level='$by_level'";
 }

 if(!empty($query_cond)){
      $query_cond = " Where ".$query_cond;
      $search_query.$query_cond;
 }?>