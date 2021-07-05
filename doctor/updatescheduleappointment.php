<?php 
session_start();
include"head.php";
	if($_SESSION["name"]) {
?>
<center>
<p style="color:black;">Welcome <?php echo $_SESSION["name"]; ?>.</p> 
</center>
<?php 
}else {
	header("Location:login.php");
}
?>
<script>

</script>
<?php
$doctorid=$_SESSION['id'];
		$sql="select * from scheduleappointment where doctorid='$doctorid'";
		$result1=mysqli_query($link, $sql);
		if(mysqli_affected_rows($link)>0){
			$i=0;
			while($row=mysqli_fetch_assoc($result1))
			{
	?>	
	
<form action="" method="post">
	<div class="input_field">
		<table id="table_field" class="table table-bordered">
			<tr>
				<th>doctorid</th>
				<th> From </th>
				<th> TO </th>
				
			</tr>
			<tr>
			
				<td>
					<!--<input class="form-control" type="DATE" name="DATETIME-LOCAL[]">-->
					<?php  echo $row['doctorid']; 
					?>	
				</td>
				
				<td>
					
					<?php  
					$datetimelocal_explode=explode(",",$row['datetimelocal']);
					echo '<table>';
					
					foreach($datetimelocal_explode as $x=> $value)
						{
						echo '<tr><td><input type="time" value='.($value).'></td></tr>';	
						}
						
					echo '</table>';

						?>	
					
				</td>
				<td>
					<?php 
					$time_explode=explode(",",$row['time']);
					echo '<table>';
					foreach($time_explode as $x=> $value)
						{
							echo '<tr><td><input type="time" value='.$value.'></td></tr>';	
						}
					echo '</table>';
				?></td>
				
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<a class="btn btn-primary" href='edit.php?id=<?php echo $_SESSION["id"]?>'>Update Time Slots</a>
					</center>
				</td>
			</tr>
		</table>
		
	</div>
</form>
<?php
$i++;
		}}
?>