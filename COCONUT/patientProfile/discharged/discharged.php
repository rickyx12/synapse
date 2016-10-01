<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$protoType = $_GET['protoType'];

$ro = new database();

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />

<?php

echo "<br><br><br><Br><br>";


echo "<form method='get' action='discharged1.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='protoType' value='$protoType'>";
echo "<center><div style='border:1px solid #ff0000; width:400px; height:100px;	'>";

if($protoType == "Discharged") {
echo "<br><font size=2 color=red>Are you sure you want to Discharge this Patient </font>";
}else {
echo "<br><font size=2 color=red>Are you sure you want to Undischarge this Patient </font>";
}

echo "<br><Br><input type=submit value='Yes' style='border:1px solid #ff0000; background-color:transparent;'>";
echo "</div>";
echo "</form>";

?>
