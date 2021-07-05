<?php 
session_start();
   if(!isset($_SESSION['admin'])){
   	header('location:AdminLogin.php');
   }
	include "header.php";
	include "slider.php";
	include "config_appointment.php";
?>
<head> 
<link rel="stylesheet" href="../profile.css">   
</head>
<?php 
	$sql="SELECT * FROM paitent where id=".$_REQUEST['p_id'];
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{	
?>
<body style="font-size:16px;">
  <div class="main-content">
    <!-- User -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-sm">
            <h1 class="display-2 text-black">Hello <?php echo $row['name'];?></h1>
          </div>
        </div>
      </div>
    </div>
				
    <!-- Page content -->
    <div class="container-fluid mt--7">
       <div class="col-xs-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>

            <div class="card-body">
              <form method="POST" action="" >
            <h6 class="heading-small text-muted mb-4">User information</h6>
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
                <hr class="my-4">
                <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" name="address" value="<?php echo $row['adress'];?>" type="text">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Mobile</label>
                        <input id="input-address" class="form-control form-control-alternative" name="mobile" value="<?php echo $row['mobile'];?>" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
			<h6 class="heading-small text-muted mb-4">Personal information</h6>
				<div class="pl-lg-4">
                  
				 <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Age</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" name="age" value="<?php echo $row['age'];?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Gender</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" name="gender" value="<?php echo $row['gender'];?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Date of Birth</label>
                        <input type="date" name="dob" id="input-postal-code" class="form-control form-control-alternative" value="<?php echo $row['dob'];?>">
                      </div>
                    </div>
					<div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Password</label>
                        <input type="text" name="password" id="input-postal-code" class="form-control form-control-alternative" value="<?php echo $row['password'];?>">
                      </div>
                    </div>
                  </div>
                  </div>
            <?php 
				$i++;
				}
				}				
				?>
				<button class="btn btn-primary" onclick="myFunction()" name="edit" style="margin:auto; display: block;">Edit</button>			
			</form>

			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
if(isset($_REQUEST["edit"]))
{
	$id=$_SESSION['paitentid'];
	$v1=$_REQUEST["name"];
	$v2=$_REQUEST["email"];
	$v3=$_REQUEST["address"];
	$v4=$_REQUEST["age"];
	$v5=$_REQUEST["gender"];
	$v6=$_REQUEST["dob"];
	$v7=$_REQUEST["mobile"];
	$v8=$_REQUEST["password"];
	
	echo $qry2="update paitent set name='$v1',mobile='$v7',email='$v2',password='$v8', adress='$v3',age='$v4',gender='$v5',dob='$v6' where id=".$_REQUEST['p_id'];
	mysqli_query($link,$qry2);
	if($qry2){
		?>
		<script type="text/javascript">
			alert("Profle Updated!!");
			window.location.href = "http://localhost/appointment/admin/display_paitent.php";
		</script>
		
		<?php 
		
	}
}
?>
