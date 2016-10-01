<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$protoType = $_GET['protoType'];


$ro = new database();


if($protoType == "Discharged") {
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered",date("M_d_Y"));
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered",$ro->getSynapseTime());
}else {
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered","");
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered","");
}
echo "
<script type='text/javascript'>";

if($protoType == "Discharged") {
echo "alert('Patient is now Discharged');";
}else {
echo "alert('Patient is now Active');";
}
echo " window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_right.php?registrationNo=$registrationNo'
</script>

";

?>
