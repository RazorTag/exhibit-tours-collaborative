<?php

// Database configuration
$db_host = "localhost"; // Host name
$db_username = "a4459657_bull"; // Mysql username
$db_password = "bullshit123"; // Mysql password
$db_name = "a4459657_bull"; // Database name

// Connect to server and select databse.
$db = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(!$db) {
	die('Unable to connect to database [' . $db->connect_error . ']');
}

?>