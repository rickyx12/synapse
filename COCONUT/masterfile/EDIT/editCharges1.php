<?php
include("../../../myDatabase.php");
$chargesCode = $_GET['chargesCode'];
$description = $_GET['description'];
$service = $_GET['services'];
$category = $_GET['category'];
$opd = $_GET['opdprice'];
$ward = $_GET['wardprice'];
$soloward = $_GET['solowardprice'];
$semiprivate = $_GET['semiprivateprice'];
$private = $_GET['privateprice'];


$ro = new database();

$ro->editNow("availableCharges","chargesCode",$chargesCode,"Description",$description);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"Service",$service);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"Category",$category);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"OPD",$opd);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"WARD",$ward);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"SOLOWARD",$soloward);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"SEMIPRIVATE",$semiprivate);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"PRIVATE",$private);

?>

