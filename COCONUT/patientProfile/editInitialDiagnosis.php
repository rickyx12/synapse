<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

$ro->getPatientProfile($registrationNo);



echo "
<style type='text/css'>
.initialDiagnosis {
	border: 1px solid #000;
	color: #000;
	height:120px;
	width: 390px;
	padding:4px 4px 4px 2px;
}
</style>
";

echo "<form method='get' action='editInitialDiagnosis1.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='username' value='$username'>";
echo "<center><br><div style='border:1px solid #000000; width:500px; height:210px; border-color:black black black black;'>";

echo "<Br><font size=2>Initial Diagnosis</font><br>";
echo "<textarea name='initialDiagnosis' class='initialDiagnosis'>".$ro->getRegistrationDetails_initialDiagnosis()."</textarea>";


echo "<br><br><input type=submit value='       Edit        ' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'>";




echo "</div>";

echo "</form>";
?>
