<?php
session_start();
	
	include "config_appointment.php";
?> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<html lang="en">
<head>
<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="login.css">

</head>
<body>
  <div class="container">
    <div class="row d-flex">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b>Admin</b>Login</h5>
             <img src="adminLogo.png" class="rounded-circle" alt="Cinque Terre" width="40%" height="20%" style="display: block;margin: auto;"> 
			<br>
			
			  <form class="form-signin" method="POST">
              <div class="form-label-group">
                <input name="name" type="text" id="inputEmail" class="form-control" placeholder="Admin name" required autofocus>
                </div>
<br>
              <div class="form-label-group">
                <input name="password" type="password" id="p1" class="form-control" placeholder="Password" required>
				<span toggle="#p1" class="fa fa-fw fa-eye toggle-password" style="float: right;
							margin-left: -25px; margin-top: -28px; position: relative; z-index: 2;"></span>
							<script>
							 $(".toggle-password").click(function() {

							  $(this).toggleClass("fa-eye fa-eye-slash");
							  var input = $($(this).attr("toggle"));
							  if (input.attr("type") == "password") {
								input.attr("type", "text");
							  } else {
								input.attr("type", "password");
							  }
							});
							 </script>
              </div>
<br>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button name="login" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
			  <br>
				<a href=""><button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">
				Create an account </button></a>
			</form>	
		  </div>		  
        </div>
      </div>
	</div>
  </div>
</body>
</html>
<?php 
if(isset($_POST['login']))
	{
		$name=$_POST['name'];
		$password=$_POST['password'];
		$qry="select * from admin where admin_name='$name' && admin_pwd='$password'";
		$data=mysqli_query($link,$qry);
		$total=mysqli_fetch_assoc($data);
		if(($total)>0)
			{
				echo $_SESSION['admin']=$total['admin_name'];
				header('location:http://localhost/appointment/admin/admin_dashboard.php');
			}
			else
			{
						?>
				<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Invalid</strong>Password.
</div>
<?php 
			}
	}
	
?>