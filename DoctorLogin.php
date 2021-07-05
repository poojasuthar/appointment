<!DOCTYPE html>
<?php
   session_start();
   ?> 
<html lang="en">
   <head>
      <title>Doctor Login</title>
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
                     <h5 class="card-title text-center"><b>Doctor</b>Login</h5>
                     <img src="img/DoctorLogo.png" class="rounded-circle" alt="Cinque Terre" width="40%" height="20%" style="display:block;margin: auto;"> 
                     <br>
                     <form class="form-signin" method="post" action="">
                        <div class="form-label-group">
                           <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                           <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-label-group">
                           <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                           <label for="inputPassword">Password</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" class="custom-control-input" id="customCheck1">
                           <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button name="btn" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <a href="forgotPassword.php"> Forgot Password? </a>
                        <hr>
                        <a href=""><button name="login" class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">
                        Create an account </button></a>
                     </form>
                     <?php 
                        if(isset($_POST['btn'])){
                        include "config_appointment.php";
                        
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                    $qry="select * from doctor where email='$email' && password='$password' && status=1";
                        $data=mysqli_query($link,$qry);
                        $total=mysqli_fetch_assoc($data);
                        if(($total)>0)
                        	{
                        		$_SESSION['doctorname']=$total['name'];
                        		$_SESSION['doctorid']=$total['id'];
                        		header('location:doctor_index.php');
                        	}
                        	else
                        	{
							?>
							<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Wait!</strong>&nbsp;Let admin allow you to login.
							</div>
                        	<?php 
							}
                        
                        }
					
                        ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>