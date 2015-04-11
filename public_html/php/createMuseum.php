<?php
session_start();

require 'database.php';

$contactName = $_POST[''];
$position = $_POST[''];
$organizationName = $_POST[''];
$organizationType = "museum";
$phoneNumber = $_POST[''];
$faxNumber = $_POST[''];
$email = $_POST[''];
$addressStreet1 = $_POST[''];
$addressStreet2 = $_POST[''];
$addressCity = $_POST[''];
$addressState = $_POST[''];
$addressZIP = $_POST[''];
$addressCountry = $_POST[''];
$website = $_POST[''];
$interest = $_POST[''];
$interestNotes = $_POST[''];

$sql = "SELECT * FROM Organization WHERE organizationName='$organizationName' AND organizationType='$organizationType'";
$result = $db->query($sql);
$count=$result->num_rows;

if($count > 0) {
	$_SESSION['defaultCustomer'] = $customerName;
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../customers.html'>";
    echo "<script type=\"text/javascript\"> alert(\"A museum with that name already exists.\"); </script>";
}
else {
	$sql = "INSERT INTO Organization (contactName, position, organizationName, organizationType, phoneNumber, faxNumber, email, addressStreet1, addressStreet2, addressCity, addressState, addressZIP, addressCountry, website, interest, interestNotes) VALUES('$contactName', '$position', '$organizationName', '$organizationType', '$phoneNumber', '$faxNumber', '$email', '$addressStreet1', '$addressStreet2', '$addressCity', '$addressState', '$addressZIP', '$addressCountry', '$website', '$interest', '$interestNotes')";
	$db->query($sql);
	include 'organizationPDF.php';

	$subject = "New Museum Registration";
	mail('museum@exhibittours.org', $subject, "", )
	
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../thank-you.html'>";
}

exit();
?>