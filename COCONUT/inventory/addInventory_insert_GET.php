<?php
include("../../myDatabase.php");
$description = $_GET['description'];
$generic = $_GET['generic'];
$unitcost = $_GET['unitcost'];
$quantity = $_GET['quantity'];
$date = $_GET['date'];
$addedBy = $_GET['addedBy'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$time = $_GET['serverTime'];
$inventoryLocation = $_GET['inventoryLocation'];
$inventoryType = $_GET['inventoryType'];
$branch = $_GET['branch'];
$transition = $_GET['transition'];
$remarks = $_GET['remarks'];


$ro = new database();

$expiration = $month."_".$day."_".$year;

$ro->addNewMedicine1($description,$generic,$unitcost,$quantity,$expiration,$addedBy,$date,$time,$inventoryLocation,$inventoryType,$branch,$transition,$remarks);


?>
