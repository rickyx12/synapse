<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$paymentFor = $_GET['paymentFor'];
$amountPaid = $_GET['amountPaid'];
$datePaid = $_GET['datePaid'];


$ro = new database();

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

$ro->addPayment($registrationNo,$amountPaid,$datePaid,date("H:i:s"),$username,$paymentFor);

?>
