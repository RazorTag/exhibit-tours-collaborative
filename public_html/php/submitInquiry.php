<?php
session_start();

//require 'database.php';

$firstName = $_POST['first-name'];
$lastName = $_POST['last-name'];
$email = $_POST['email'];
$inquiry = $_POST['message'];

/*$sql = "INSERT INTO Inquiry (firstName, lastName, email, message) VALUES('$firstName', '$lastName', '$email', '$message')";
$db->query($sql);*/

require "PHPMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	//$mail->AddAddress("enorswo@gmail.com", "Evan");
	$mail->AddAddress("museumform@gmail.com", "ETC");
	$mail->Subject = "Inquiry from ".$firstName.$lastName;
	$mail->WordWrap = 120;
	$mail->IsHTML(true);
	$message = "";

	$message .= $firstName." ".$lastName."<br>";
	$message .= $email."<br><br>";
	$message .= $inquiry;

	$mail->Body = $message;
	if(!$mail->Send()) {
	   echo "Message could not be sent. <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}

echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../thank-you.html'>";

exit();
?>