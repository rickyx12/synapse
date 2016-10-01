<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$initialDiagnosis = $_GET['initialDiagnosis'];


$ro = new database();

$ro->editInitialDiagnosis($registrationNo,$initialDiagnosis);

echo "
<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=$registrationNo&username=$username';
</script>
";

?>
