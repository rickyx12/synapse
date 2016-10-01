<?php
include("../../../myDatabase.php");
$paymentNo = $_GET['paymentNo'];
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

$ro->deleteNow("patientPayment","paymentNo",$paymentNo);


echo "

<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/viewPayment.php?username=$username&registrationNo=$registrationNo'
</script>

";

?>
