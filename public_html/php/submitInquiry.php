<?php
session_start();

require 'database.php';

$contactName = $_POST[''];
$email = $_POST[''];
$message = $_POST[''];

$sql = "SELECT * FROM Inquiry WHERE contactName='$contactName'";
$result = $db->query($sql);
$count=$result->num_rows;

if($count > 0) {
	$_SESSION['defaultCustomer'] = $customerName;
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../customers.html'>";
    echo "<script type=\"text/javascript\"> alert(\"A museum with that name already exists.\"); </script>";
}

else {
	$sql = "INSERT INTO Inquiry (contactName, email, message) VALUES('$contactName', '$email', '$message')";
	$db->query($sql);

	$subject = "New Inquiry";
	mail('museum@exhibittours.org', $subject, "", )
	
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../thank-you.html'>";
}

exit();
?>