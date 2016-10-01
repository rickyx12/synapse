<?php
include("../../myDatabase.php");
$branch = $_GET['branch'];
$username = $_GET['username'];
$inventoryType = $_GET['inventoryType'];
$description = $_GET['description'];
$requestingDepartment = $_GET['requestingDepartment'];


$ro =  new database();

$ro->getMasterListInventory_requesting($inventoryType,$username,$branch,$description,$requestingDepartment);

?>
