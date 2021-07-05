<?php
// Database configuration 	
	$dbHost     = "localhost"; 
	$dbUsername = "root"; 
	$dbPassword = ""; 
	$dbName     = "appointment"; 
	 
	// Create database connection 
	$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
	// Check connection 
	if ($con->connect_error) { 
	    die("Connection failed: " . $con->connect_error); 
	}

echo $update_booking="UPDATE book_appointment SET status = 1 WHERE id=".$_REQUEST['r_id'];
$result=mysqli_query($con,$update_booking);
if(isset($_POST['accept']))
{
		require_once ('PHPMailer\PHPMailer-5.2-stable\PHPMailerAutoload.php');
				$emails=$_REQUEST['email'];
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

				$mail->setFrom($emails, 'Appointment Successfull');
				$mail->addAddress($emails);              // Add a recipient
				$mail->addReplyTo('thedjgamer777@gmail.com');

				
				$mail->Subject = 'Your appointment has been accpeted';
				$mail->Body    = 'You can now download your appointment slip from website';
			
					if(!$mail->send()) 
					{
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
					} 
				
					else
					{
						echo 'Message has been sent please check your mail';
					}  
}

header('location:showappointment.php');
?>