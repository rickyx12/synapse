<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$paymentNo = $_GET['paymentNo'];
$username = $_GET['username'];
$paymentFor = $_GET['paymentFor'];
$amountPaid = $_GET['amountPaid'];
$timePaid = $_GET['timePaid'];
$datePaid = $_GET['datePaid'];

$ro = new database();

$ro->EditNow("patientPayment","paymentNo",$paymentNo,"paymentFor",$paymentFor);
$ro->EditNow("patientPayment","paymentNo",$paymentNo,"amountPaid",$amountPaid);
$ro->EditNow("patientPayment","paymentNo",$paymentNo,"timePaid",$timePaid);
$ro->EditNow("patientPayment","paymentNo",$paymentNo,"datePaid",$datePaid);
$ro->EditNow("patientPayment","paymentNo",$paymentNo,"paidBy",$username);


echo "

<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/viewPayment.php?registrationNo=$registrationNo&username=$username';
</script>

";


?>
