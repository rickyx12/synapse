<?php
include("../myDatabase.php");
$remitted = $_GET['departmentStatus'];
$username = $_GET['username'];
$quantity = $_GET['quantity'];
$countz = count($remitted);

$ro = new database();

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);


for($i=0;$i<$countz;$i++) {//FOR LOOP
if($ro->checkInventory($remitted[$i]) == "PHARMACY" || $ro->checkInventory($remitted[$i]) == "CSR") {

if($ro->getChargesStatus($remitted[$i]) != "Return") {
$ro->remitNow($remitted[$i],"dispensedBy_".$username);
$ro->editNow("patientCharges","itemNo",$remitted[$i],"departmentStatus_time",date("H:i:s"));
//MAGBBWAS SA QUANTITY NG CURRENT INVENTORY 
$ro->changeQTY($ro->getChargesCode($remitted[$i]),($ro->getCurrentQTY($ro->getChargesCode($remitted[$i])) - $quantity) );
}else {
$ro->changeQTY($ro->getChargesCode($remitted[$i]),($ro->getCurrentQTY($ro->getChargesCode($remitted[$i])) + $quantity) );
$deptStatus = preg_split ("/\_/", $ro->getDepartmentStatus($remitted[$i])); 

if($ro->getPatientChargesQTY($remitted[$i]) == $deptStatus[0] ) {
$ro->deletePatientCharges($deptStatus[1],$remitted[$i]); // DELETE CHARGES IF ALL WILL RETRUN
}else {
$ro->editNow("patientCharges","itemNo",$remitted[$i],"quantity",$ro->getPatientChargesQTY($remitted[$i]) - $deptStatus[0]);
$ro->editNow("patientCharges","itemNo",$remitted[$i],"status","PAID");
$ro->editNow("patientCharges","itemNo",$remitted[$i],"departmentStatus","dispensedBy_".$username);
$ro->editNow("patientCharges","itemNo",$remitted[$i],"departmentStatus_time",date("H:i:s"));
}
}
}else {//ELSE
$ro->remitNow($remitted[$i],"remittedBy_".$username);
$ro->editNow("patientCharges","itemNo",$remitted[$i],"departmentStatus_time",date("H:i:s"));
}//ELSE
}//FOR LOOP

echo "<script type='text/javascript'>";
echo "window.location='http://".$ro->getMyUrl()."/Department/departmentPage.php';";
echo "</script>";

?>
