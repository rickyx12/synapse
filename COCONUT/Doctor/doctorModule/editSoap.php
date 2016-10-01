<?php
include("../../../myDatabase.php");
$itemNo = $_GET['itemNo'];
$registrationNo = $_GET['registrationNo'];
$subjective = $_GET['subjective'];
$objective = $_GET['objective'];
$assessment = $_GET['assessment'];
$plan = $_GET['plan'];


$ro = new database();

$ro->getSOAP($itemNo,$registrationNo);
$ro->editNow("SOAP","soapNo",$ro->soap_soapNo(),"subjective",$subjective);
$ro->editNow("SOAP","soapNo",$ro->soap_soapNo(),"objective",$objective);
$ro->editNow("SOAP","soapNo",$ro->soap_soapNo(),"assessment",$assessment);
$ro->editNow("SOAP","soapNo",$ro->soap_soapNo(),"plan",$plan);

echo "
<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$itemNo&registrationNo=$registrationNo';
</script>

";


?>
