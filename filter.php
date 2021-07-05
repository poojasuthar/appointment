<?php 
	include"header.php";
	include "config.php";
?>
<div class="container">
	<table width="70%" cellpadding="5" cellspacing="5">
	<tr>
		<td class="h3">Name</td>
		<td class="h3">add</td>
		<td class="h3">gender</td>
		<td class="h3">designation</td>
		<td class="h3">age</td>
	</tr>
	<?php
	if (isset($_POST['btn1']))
		{
			$add=$_POST['add'];
			$desig=$_POST['designation'];
			$sql="select * from developers where address='$add' AND designation='$desig' ";
		}
	else
		{
			$sql="select * from developers";	
		}
		$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{
	?>
	<tr>
		<td><?php echo $row["name"] ?></td>
		<td><?php echo $row["address"] ?></td>
		<td><?php echo $row["gender"] ?></td>
		<td><?php echo $row["designation"] ?></td>
		<td><?php echo $row["age"] ?></td>
		
	</tr>
<?php 
		$i++;}
		}
?>	
	</table>
	
	<!--drop  down start-->
<form method="POST" action="filter.php">
			<select name="add">
			<?php 	
			$link=mysqli_connect("localhost","root","","fbg") or die("Not connect");
	
			$qry1="SELECT distinct address FROM developers";
					$result=mysqli_query($link,$qry1);
					if(mysqli_affected_rows($link)>0)
					{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
					{
						?>
				<option value="<?php echo $row['address'];?>"><?php echo $row["address"];?></option>
			<?php
					$i++;
					}
					}		
					else
					{
						echo"no data found";
					}
					mysqli_close($link);
		?>
			</select>		
			
			<select name="designation">
			<?php 	
			$link=mysqli_connect("localhost","root","","fbg") or die("Not connect");
	
			$qry1="SELECT distinct designation FROM developers";
					$result=mysqli_query($link,$qry1);
					if(mysqli_affected_rows($link)>0)
					{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
					{
						?>
				<option value="<?php echo $row['designation'];?>"><?php echo $row["designation"];?></option>
			<?php
					$i++;
					}
					}		
					else
					{
						echo"no data found";
					}
					mysqli_close($link);
		?>
			</select>
		<!--drop  down end-->		  
	<div class="row">
      <div class="col-sm-6" style="">
	  <button type="submit" name="btn1" class="btn btn-success" style="align:center;display:grid; margin:auto;">Submit</button>	
	  </div>
	</div>
	
	</form>
</html>