<?php
$server = 'localhost';
$user = "root"; // uda43rjgkm6cc
$password = ""; // 35zk7y6ef6vu
$database = "newpropertydetails.com"; // dbqtzpvb6g2pdk

$db_connect = mysqli_connect($server, $user, $password, $database);
if (!$db_connect) {
	echo "Unable to Connect DB " . mysqli_connect_error();
	exit();
} else {
}
date_default_timezone_set("Asia/Kolkata"); //India time (GMT+5:30)
$now = date('Y-m-d H:i:s');
$todayDate = date('Y-m-d');
$domainName  = $_SERVER['SERVER_NAME'];
$source = $domainName;
$created = $now;
$leadDate = date('D, M d Y, h:i A', strtotime($now));
$lastDateofMonth = date("t-F-Y", strtotime($now)); // Last Date of Month

$builders_id = 2;