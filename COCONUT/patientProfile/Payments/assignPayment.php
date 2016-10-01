<?php
include("../../../myDatabase.php");

$assign = $_GET['assign'];
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$countz = count($assign);
$ro = new database();

for($x=0;$x<$countz;$x++) {
$assignPayment = preg_split ("/\_/", $assign[$x]); 
$ro->getPatientChargesToEdit($assignPayment[0]);

if($assignPayment[1] == "cash") {
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"cashUnpaid",$ro->patientCharges_total()); // iLLgay sa cash
///ccguraduhin n mgging zero ung total sa mga column mga column n e2 dahil mppunta Lhat sa cash
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"company",0);
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"phic",0);
}else if($assignPayment[1] == "hmo") {
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"company",$ro->patientCharges_total());
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"cashUnpaid",0);
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"phic",0);
}else if($assignPayment[1] == "phic") {
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"phic",$ro->patientCharges_total());
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"cashUnpaid",0);
$ro->EditNow("patientCharges","itemNo",$assignPayment[0],"company",0);
}else {
echo "";
}

}

echo "
<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/paymentAssigning.php?registrationNo=$registrationNo&username=$username&show=All&desc=';
</script>";


?>
