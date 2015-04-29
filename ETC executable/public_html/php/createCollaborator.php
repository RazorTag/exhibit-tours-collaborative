<?php
session_start();

//require 'database.php';

/*$contactName = mysqli_real_escape_string($db, $_POST['contact-name']);
$position = mysqli_real_escape_string($db, $_POST['position']);
$organizationName = mysqli_real_escape_string($db, $_POST['organization-name']);
$organizationType = $_POST['organization-type'];
$phoneNumber = mysqli_real_escape_string($db, $_POST['phone-number']);
$faxNumber = mysqli_real_escape_string($db, $_POST['fax']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$addressStreet1 = mysqli_real_escape_string($db, $_POST['museum-address']);
$addressCity = mysqli_real_escape_string($db, $_POST['city']);
$addressState = mysqli_real_escape_string($db, $_POST['state-province']);
$addressZIP = mysqli_real_escape_string($db, $_POST['zip-code']);
$website = mysqli_real_escape_string($db, $_POST['image-gallery']);
$interestNotes = mysqli_real_escape_string($db, $_POST['description']);*/

$contactName = $_POST['contact-name'];
$position = $_POST['position'];
$organizationName = $_POST['organization-name'];
$organizationType = $_POST['organization-type'];
$phoneNumber = $_POST['phone-number'];
$faxNumber = $_POST['fax'];
$email = $_POST['email'];
$addressStreet1 = $_POST['museum-address'];
$addressCity = $_POST['city'];
$addressState = $_POST['state-province'];
$addressZIP = $_POST['zip-code'];
$website = $_POST['image-gallery'];
$interestNotes = $_POST['description'];

/*$sql = "SELECT * FROM Organization WHERE organizationName='$organizationName' AND organizationType='$organizationType'";
$result = $db->query($sql);
$count=$result->num_rows;*/

/*if($count > 0) {
	$_SESSION['defaultCustomer'] = $customerName;
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../thank-you.html'>";
    echo "<script type=\"text/javascript\"> alert(\"A museum with that name already exists.\"); </script>";
}*/
//else {
	/*$sql = "INSERT INTO Organization (contactName, position, organizationName, organizationType, phoneNumber, faxNumber, email, addressStreet1, addressStreet2, addressCity, addressState, addressZIP, addressCountry, website, interest, interestNotes) VALUES('$contactName', '$position', '$organizationName', '$organizationType', '$phoneNumber', '$faxNumber', '$email', '$addressStreet1', '$addressStreet2', '$addressCity', '$addressState', '$addressZIP', '$addressCountry', '$website', '$interest', '$interestNotes')";
	$db->query($sql);*/


	require "PHPMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	//$mail->AddAddress("enorswo@gmail.com", "Evan");
	$mail->AddAddress("museumform@gmail.com", "ETC");
	$mail->Subject = "New ".$organizationType." Registration: ".$organizationName;
	$mail->WordWrap = 120;
	$mail->IsHTML(true);

	$message = "";
	//$message .= "<font size=\"3em\"><b></b></font>";
	$message .= $contactName."<br>";
	$message .= $position."<br>";
	$message .= $organizationName."<br>";
	$message .= "<br>";
	$message .= $addressStreet1."<br>";
	$message .= $addressCity.", ".$addressState." ".$addressZIP."<br>";
	$message .= "<br>";
	$message .= $phoneNumber."<br>";
	$message .= $email."<br>";
	$message .= "<a size=\"2em\" href=\"".$website."\"><b>Image Gallery</b></a><br><br>";
	$message .= "<br>";
	$message .= "I am interested in: ".$interestNotes;

	$mail->Body = $message;
	if(!$mail->Send()) {
	   echo "Message could not be sent. <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo;
	   exit;
	}
	
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../thank-you.html'>";
//}

exit();
?>