<?php
session_start();
	
	include "config_appointment.php";
?> 
<html lang="en">
<head>
  <title>Dr.Do</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="login.css">

</head>
<body>
  <div class="container">
    <div class="row d-flex">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b>Paitent</b>Login</h5>
			<img src="img/PaitentLogo.jpg" class="rounded-circle" alt="Cinque Terre" width="40%"style="display:block; margin: auto;"> 
			<br>           
		   <form class="form-signin" method="post">
              <div class="input-group mb-3">
			  
                <input type="email" name="email"  value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              </div>
			
            <div class="input-group-append mb-3">
				   <input id="password-field" type="password"  value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="form-control" name="password" placeholder="Password" >
				
				<div class="input-group-append ">
					<span toggle="#password-field" class="fa fa-fw fa-eye toggle-password" style="float: right;
					margin-left: -25px; margin-top: 10px; position: relative; z-index: 2;"></span>
				</div>
            </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button name="submit" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
			  <a href="forgotPassword.php"> Forgot Password? </a>
				<hr>
				<a href="PaitentReg.php"><input type="button" class="btn btn-lg btn-danger btn-block text-uppercase" value="Create an account">
				</a>
			</form>
		  </div>		  
        </div>
      </div>
	</div>
  </div>
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
</body>
</html>
<?php 
	if(isset($_POST['submit']))
	{
		$email=$_REQUEST["email"];
		$password=$_REQUEST["password"];
	$qry="select * from paitent where email='$email' && password='$password'";
						//$result=mysqli_query($link,$qry);
						$result=mysqli_query($link,$qry) or die(mysqli_error($qry));
						if($row=mysqli_fetch_assoc($result))
					{
						echo"<center>";	echo "done"; echo"</center>";
						
						
						
						// Function to generate OTP 
							function generateNumericOTP($n) { 
							  
							// Take a generator string which consist of 
							// all numeric digits 
							$generator = "1357902468"; 
						  
							// Iterate for n-times and pick a single character 
							// from generator and append it to $result 
							  
							// Login for generating a random character from generator 
							//     ---generate a random number 
							//     ---take modulus of same with length of generator (say i) 
							//     ---append the character at place (i) from generator to result 
						  
							$result = ""; 
						  
							for ($i = 1; $i <= $n; $i++) { 
								$result .= substr($generator, (rand()%(strlen($generator))), 1); 
							} 
						  
							// Return result 
							return $result; 
						} 
						  
						// Main program 
						$n = 6; 
						$OTP=generateNumericOTP($n);
						
				require_once ('PHPMailer\PHPMailer-5.2-stable\PHPMailerAutoload.php');
					$emails  = $_POST['email'];
						
					$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'thedjgamer777@gmail.com';                 // SMTP username
				$mail->Password = '05092001_dj';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to

				$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);

				$mail->setFrom($emails, 'Login');
				$mail->addAddress($emails);              // Add a recipient
				$mail->addReplyTo('thedjgamer777@gmail.com');

				
				$mail->Subject = 'OTP';
				$mail->Body    = 'Your OTP is::'.$OTP.'';
			
					if(!$mail->send()) 
					{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
				
					else
					{
						ob_start();
							session_start();
						ob_end_clean();
						$_SESSION["paitentid"]=$row["id"];
						$_SESSION["paitentname"]=$row["name"];
						$_SESSION["OTP"]=$OTP;
						header("Location:otp.php");
						echo 'Message has been sent please check your mail';
					}  
						
					if(!empty($_POST["remember"])) {
						setcookie ("email",$_POST["email"],time()+ 3600);
						setcookie ("password",$_POST["password"],time()+ 3600);
						echo "Cookies Set Successfuly";
					} else {
						setcookie("email","");
						setcookie("password","");
						echo "Cookies Not Set";
					}
				}
		
		
		
		
		
		
		
		
		
		/*$email=$_POST['email'];
		$password=$_POST['password'];
		$qry="select * from paitent where email='$email' && password='$password'";
		$data=mysqli_query($link,$qry);
		$total=mysqli_fetch_assoc($data);
		if(($total)>0)
			{
				/*$_SESSION['paitentname']=$total['name'];
				$_SESSION['paitentid']=$total['id'];*/
				//header('location:http://localhost/appointment/index.php');
			//}
			else
			{
						?>
				<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Invalid</strong>Email or Password.
</div>
<?php 
			}
	}
?>
