<?php session_start();
include "head.php"; 
include "config_appointment.php";
?>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<?php
if($_SESSION["name"]) {
?>
<center>
<p style="color:black;">Welcome <u><?php echo $_SESSION["name"]; ?></u>.<h3 style="color:red;">Add your availabe time slots first.</h3></p> 
 
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
<form action="" method="post">
	<div class="input_field">
		<table id="table_field" class="table table-bordered">
			<tr>
				<th>Time</th>
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
		<center><input class="btn btn-primary" type="submit" name="save" value="save"></center>	
	</div>
</form>
<?php 
	$Doctorid=$_SESSION["id"];
	
 ?>
 
<?php
if(isset($_POST['save']))
	
{
	
		/*$data = $_POST;
	
	echo "<pre>";
	var_dump($data);*/
	
	$date = $_POST['DATETIME-LOCAL'] ;
	$time = $_POST['TIME'];
	$x=implode(",",$date);	
	$y=implode(",",$time);	
/*	echo $x.'<br>';
	echo $y;
	
		echo*/
$qry="insert into scheduleappointment(doctorid,datetimelocal,time)values('$Doctorid','$x','$y')";
		$result=mysqli_query($link,$qry);
	if($qry){		
		header('Location:index.php');
	}
	}
	?>
	<?php
		$sql="select * from scheduleappointment where doctorid='$Doctorid'";
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
					<?php echo $row['doctorid']; ?>	
				</td>
				
				<td>
					<?php  
					$datetimelocal_explode=explode(",",$row['datetimelocal']);
					echo '<table>';
					foreach($datetimelocal_explode as $x=> $value)
						{
							echo '<tr><td>'.$value.'</td></tr>';	
						}
					echo '</table>';
						/*	echo '<br>';
						foreach($arr as $x=> $value)
						{
							if($x%2!=0)
							{
								echo $value.'&nbsp;&nbsp;&nbsp;';
							}			
						}
						
					/*foreach($datetimelocal_explode as $x => $value )
					{
						foreach($time_explode as $x =>$values)
						{
							//echo "from=".$value.",to=".$values;
						
						if($x%2==0){
							
							echo "from=".$x;
						}
						}
					}*/
					//print_r($datetimelocal_explode);
					?>	
					
				</td>
				<td>
					<?php 
					$time_explode=explode(",",$row['time']);
					echo '<table>';
					foreach($time_explode as $x=> $value)
						{
							echo '<tr><td>'.$value.'</td></tr>';	
						}
					echo '</table>';
				?></td>
				
			</tr>
		</table>
	</div>
</form>
<?php
$i++;
}}
?>
</div>