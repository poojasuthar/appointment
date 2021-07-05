<?php 
include "config.php";
	if (isset($_POST['btn1']))
	{
		echo $_POST['cat'];
	}	
?>
	<table width="70%" cellpadding="5" cellspacing="5">
	<tr>
		<td>Name</td>
		<td>add</td>
		<td>gender</td>
		<td>designation</td>
		<td>age</td>
	</tr>
	<?php
	$add=$_POST['cat'];
		$sql="select * from developers where address='$add'";
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
