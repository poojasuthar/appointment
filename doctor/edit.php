<?php include "head.php";
session_start();

	if($_SESSION["name"]) {
?>
<center>
<p style="color:black;">Welcome Dr.<?php echo $_SESSION["name"]; ?>.</p> 
</center>
<?php 
}else {
	header("Location:login.php");
}
?>

<script>
	$(document).ready(function(){
	var html = '<tr><td>Avaliable from:<input class="form-control" type="TIME" name="DATETIME-LOCAL[]">Avaliable to:<input class="form-control" type="TIME" name="TIME[]"></td></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';

	var max = 5;
	var X = 1;
	
	$("#add").click(function(){
		if(X<max){
			$("#table_field").append(html);
			X++;
		}
	});
	
	$("#table_field").on('click','#remove',function(){
		$(this).closest('tr').remove();
		X--;
	});
	
	});
	
</script>
<div class="container">
<form method="post">
	<div class="input_field">
		<table id="table_field" class="table table-bordered">
			<tr>
				<th>Insert a timing </th>
				<th>Action</th>
			</tr>
			<tr>
				<td>
					<!--<input class="form-control" type="DATE" name="DATETIME-LOCAL[]">-->
					Avaliable from:
					<input class="form-control" type="TIME" name="DATETIME-LOCAL[]">
					Avaliable to:
					<input class="form-control" type="TIME" name="TIME[]">	
				</td>
				
				<td>
					<input class="btn btn-primary" type="button" name="add" id="add" value="add">
				</td>
			</tr>
		</table>
		<center><input type="submit" name="save" value="Update" class="btn btn-success"></center>	
	</div>


<?php
				if(isset($_POST["save"]))
				{	
					$date = $_POST['DATETIME-LOCAL'] ;
					$time = $_POST['TIME'];
					$x=implode(",",$date);	
					$y=implode(",",$time);	
					$doctorid=$_SESSION["id"];
				echo $qry2="update scheduleappointment set datetimelocal='$x',time='$y' where doctorid='$doctorid'";					
				mysqli_query($link,$qry2);
				header("location:updatescheduleappointment.php");
					
				}
				mysqli_close($link);
				
?>
</form>
