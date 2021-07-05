<?php
session_start();
include "config_appointment.php";
$update_booking="UPDATE doctor SET status = 1 WHERE id=".$_REQUEST['id'];
$result=mysqli_query($link,$update_booking);

echo $_REQUEST['email'];
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

				$mail->setFrom($emails, 'Registration Successfull');
				$mail->addAddress($emails);              // Add a recipient
				$mail->addReplyTo('thedjgamer777@gmail.com');

				
				$mail->Subject = 'Your request has been accpeted';
				$mail->Body    = 'You can now login into system with this link::'.'http://localhost/appointment/doctor/';
			
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
header('location:http://localhost/appointment/admin/doctor_request.php');
?>