<?php
include("../../../myDatabase.php");
$itemNo = $_GET['itemNo'];
$batchNo = $_GET['batchNo'];
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

$ro->deleteNow("patientCharges","itemNo",$itemNo);

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/ECART/showCart_update.php?registrationNo=$registrationNo&batchNo=$batchNo&username=$username");

?>
