<?php 
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
	include "header.php";
	include "slider.php";
	include "config_appointment.php";
?>
<link rel="stylesheet" href="../profile.css">   

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<?php 
	$sql="SELECT * FROM doctor where id=".$_REQUEST['doctor_id'];
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{	
?>
<body style="font-size:16px;">
  <div class="main-content" >
    <br>
    <br>
				
    <!-- Page content -->
    <div class="container-fluid mt--7" >
       <div class="col-xs-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Hello <?php echo $row['name'];?></h3>
                </div>
      <!-- basic modal button -->
              </div>
            </div>

            <div class="card-body">
              <form method="POST" action="" enctype="multipart/form-data">
			<div class="pl-lg-4">
                <div class="row">
					<div class="col-md-6">
					<input type="hidden" value="<?php echo $row['photo'];?>" name="delete_img">
						<?php echo "<img src='upload/".$row["photo"]."' width='150px' height='150px'>"?>
						 <h6>Upload a different photo...</h6>
						 <input type="file" name="file">
					</div>
	             	<div class="col-lg-6">
                      <div class="form-group">
						
						<br>
					<input type="submit" class="btn btn-success" name="update" value="Update Image">
					  </div>
                    </div>
                  </div>

                </div>           
				  		
<hr>
			<div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" name="name" value="<?php echo $row['name'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" name="email" value="<?php echo $row['email'];?>">
                      </div>
                    </div>
                  </div>

                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Mobile</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" name="mobile" value="<?php echo $row['mobile'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">gender</label>
                        <input type="name" id="input-email" class="form-control form-control-alternative" name="gender" value="<?php echo $row['gender'];?>">
                      </div>
                    </div>
                  </div>
                </div>
				<div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Date of Birth</label>
                        <input type="date" id="input-username" class="form-control form-control-alternative" name="dob" value="<?php echo $row['dob'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Speacialist in</label>
                        <input type="name" id="input-email" class="form-control form-control-alternative" name="category" value="<?php echo $row['category'];?>">
                      </div>
                    </div>
                  </div>
                </div>
				<div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Experience</label>
                        <input type="text" class="form-control form-control-alternative" name="experince" value="<?php echo $row['experince'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Medical id</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" name="medid" value="<?php echo $row['medicalid'];?>">
                      </div>
                    </div>
                  </div>
                </div>
				
				<div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">City</label>
                        <input type="text" class="form-control form-control-alternative" name="city" value="<?php echo $row['city'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Qualification</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" name="qualification" value="<?php echo $row['qualification'];?>">
                      </div>
                    </div>
                  </div>
                </div>
				
				<div class="pl-lg-4">
                  <div class="row">
                    
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Fees</label>
                        <input type="text" class="form-control form-control-alternative" name="fees" value="<?php echo $row['fees'];?>">
                      </div>
                    </div>
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Password</label>
                        <input type="password" class="form-control form-control-alternative" name="password" value="<?php echo $row['password'];?>">
                      </div>
                    </div>
                    </div>
                </div>
				<div class="pl-lg-4">
                  <div class="row">
                    
					<div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Hospital Address</label>
                        <input type="text" class="form-control form-control-alternative" name="clinic" value="<?php echo $row['hospitaladress'];?>">
                      </div>
                    </div>
				</div>
				</div>
            <?php 
				$i++;
				}
				}				
				?>
			
				 <center><div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-primary" onclick="myFunction()" name="edit">Edit</button>	
                              <a href="display_doctor.php"> 	<button class="btn " type="button">Close</button></a>
                            </div>
                      </div>
					  <center>
				
			</form>

			</div>
          </div>
        </div>
      </div>
 <br>
    <br>
				    
</body>
<?php
$link=mysqli_connect("localhost","root","","appointment") or die("Not connect");
					
if(isset($_REQUEST["edit"]))
{
	$id=$_REQUEST['doctor_id'];
	$v1=$_REQUEST["name"];	
	$v2=$_REQUEST["mobile"];
	$v3=$_REQUEST["email"];
	$v4=$_REQUEST["password"];
	$v5=$_REQUEST["gender"];
	$v6=$_REQUEST["dob"];
	$v7=$_REQUEST["category"];
	$v8=$_REQUEST["experince"];
	$v9=$_REQUEST["city"];
	$v10=$_REQUEST["clinic"];
	$v11=$_REQUEST["medid"];
	$v12=$_REQUEST["fees"];
	$v13=$_REQUEST["qualification"];
 echo $qry2="update doctor set name='$v1',mobile='$v2',email='$v3',password='$v4', gender='$v5', dob='$v6', category='$v7',experince='$v8',city='$v9', hospitaladress='$v10',medicalid='$v11',fees='$v12',qualification='$v13' where id=".$_REQUEST['doctor_id'];
	mysqli_query($link,$qry2);
	if($qry2){
		?>
		<script type="text/javascript">
			alert("Profle Updated!!");
		window.location.href = "http://localhost/appointment/admin/display_doctor.php";
		</script>
		
		<?php 
		
	}
}
if(isset($_REQUEST["update"])){
		$id=$_REQUEST['doctor_id'];
		$delete_img=$_REQUEST['delete_img'];
		$v2=time().$_FILES["file"]["name"];
		//echo $v2;
		$qry1=("update doctor set photo='$v2' where id='$id'");
		mysqli_query($link,$qry1);
		if($_FILES["file"]["size"]>0)
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$v2");
		}
	if($qry1){
		unlink("../admin/upload/".$delete_img);
?>				<script type="text/javascript">
			alert("Profle Updated!!");
		window.location.href = "display_doctor.php";
		</script>
<?php 
	}	
	}

?>
