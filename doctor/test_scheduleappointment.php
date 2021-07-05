<?php include "header.php" ?>
<?php
// Database configuration 	
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "appoitement"; 
	 
	// Create database connection 
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}
?>
<?php
session_start();
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
		<center><input type="submit" name="save" value="save"></center>	
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
	echo $x.'<br>';
	echo $y;
	
	//$arr=array_merge($date,$time);
	
	//$arr=json_encode($date);
	//$arr1=json_encode($time);
	//foreach((array)$arr as $key => $value ){
	//foreach((array)$date as $value){
	//$arr=explode(" ",$date);  
	//foreach((array)$time as $values){
		echo $qry="insert into scheduleappointment(doctorid,datetimelocal,time)values('$Doctorid','$x','$y')";
		$result=mysqli_query($con,$qry);
	//}
	//}
	
	
	/*$count = count(array($_POST['DATETIME-LOCAL']));
	
	for($i=0;$i<$count;$i++){
	echo	$qry="insert into scheduleappointment(datetimelocal)values('{$_POST['DATETIME-LOCAL'][$i]}')";
		$result=mysqli_query($con,$qry);
	}*/

	}
	?>
	<?php
		$sql="select * from scheduleappointment where doctorid='$Doctorid'";
		$result1=mysqli_query($con, $sql);
		if(mysqli_affected_rows($con)>0){
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