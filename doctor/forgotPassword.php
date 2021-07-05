<?php 
session_start();
$dbhost= "localhost";
$dbusername="root";
$dbpassword="";
$dbname="appointment";
$con=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);
if($con->connect_error){
	echo ("connection failed:".$con->connect_error);
}

?>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="forgetpassword.css">
</head>
<body>
	<div class="container padding-bottom-3x mb-2 mt-5">
	    <div class="row justify-content-center">
	        <div class="col-lg-8 col-md-10">
	            <div class="forgot">
	                <h2>Forgot your password?</h2>
	                <p>Change your password in three easy steps. This will help you to secure your password!</p>
	                <ol class="list-unstyled">
	                    <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
	                    <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary OTP</li>
	                    <li><span class="text-primary text-medium">3. </span>Use the OTP to reset your password</li>
	                </ol>
	            </div>
	            <form class="card mt-4" method="post">
	                <div class="card-body">
	                    <div class="form-group"> 
							<label for="email-for-pass">Enter your email address</label> 
							<input class="form-control" type="email" id="email-for-pass" name="email" > 
						</div>
	                </div>
	                <div class="card-footer"> 
						<button class="btn btn-success"  type="submit" name="emailbutton" id="emailbutton" value="emailbutton">Get New Password</button> 
						<a class="btn btn-danger" href="login.php">Back to Login</a>
					</div>
					
	        </div>
	    </div>
	</div>
	<?php
		if(isset($_POST["emailbutton"]))
			{
				$check=mysqli_query($con,"select email from doctor where email='$_POST[email]'");
				$qry2=mysqli_num_rows($check);
				if(($qry2)>0)
				{
					?>
					<div class="container">
						<center>
						
						<input placeholder="Enter OTP HERE:" style="width:30%;" class='form-control' type='text' name='otpform'>
						<br>
						<input  class='btn btn-primary' type='submit' name='b1' value='submit'>
						</center>					
					</div>
				<?php 
				
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

				$mail->setFrom($emails, 'Forgot Password OTP');
				$mail->addAddress($emails);              // Add a recipient
				$mail->addReplyTo('thedjgamer777@gmail.com');

				
				$mail->Subject = 'OTP FOR Forget Password';
				$mail->Body    = 'Your OTP For Forgot Password is::'.$OTP.'';
			
					if(!$mail->send()) 
					{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
				
					else
					{
						$_SESSION["OTP"]=$OTP;
						$_SESSION["EMAIL"]=$emails;
						
					?>
				<div class="alert alert-success" style="  position: fixed;top: 5px; left:2%; width: 96%;">
				   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				   <strong>Message has been sent please check your mail</strong>&nbsp;
				</div>
				<?php 			
					}  
						
				}

				
				else
				{
					   ?>
<div class="alert alert-danger" style="  position: fixed;top: 5px; left:2%; width: 96%;">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Email </strong>&nbsp;is not Registered.
</div>
<?php 
				mysqli_query($con,$qry2);
				}	
				
			}
			if(isset($_POST["b1"]))
				{
					if($_SESSION['OTP']==$_POST['otpform']){
						echo"OTP  Match";
						header("location:updatepassword.php");
					}
					else{
						echo"Otp not match";
					}
				}	
			mysqli_close($con);
	?>
	
		</form>	
</body>
</html>
