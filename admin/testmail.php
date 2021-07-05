<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['b1'])){
	

require 'C:\xampp\composer\vendor\autoload.php';
require 'C:\xampp\composer\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\composer\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\composer\vendor\phpmailer\phpmailer\src\SMTP.php';
$mail1=$_POST['email'];
$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP

//$mail->CharSet="iso-8859-1";
$mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'thedjgamer777@gmail.com';                    // SMTP username
$mail->Password = '05092001_dj';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'thedjgamer777@gmail.com';
$mail->FromName = 'Mailer';
$mail->addAddress($mail1);     // Add a recipient

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
//header("location:testmail.php");
}

?>
<html>
<body>
<form method="post" >
Enter Email::
<input type="email" name="email" id="email" required>
<input type="submit" name="b1" id="b1" value="submit">
</form>
</body>
</html>