<?php
include("../../myDatabase.php");
$username = $_GET['username'];
$module = $_GET['module'];

$ro = new database();

$ro->coconutDesign();

$ro->coconutFormStart("get","transmital.php");
$ro->coconutBoxStart("600","150");
echo "<Br>";
echo "<table border=0>";
echo "<tr>";
echo "<td>".$ro->coconutText("From Date")."</td>";
echo "<td>";
$ro->coconutComboBoxStart_short("fromMonth");
echo "<option value='Jan'>Jan</option>";
echo "<option value='Feb'>Feb</option>";
echo "<option value='Mar'>Mar</option>";
echo "<option value='Apr'>Apr</option>";
echo "<option value='May'>May</option>";
echo "<option value='Jun'>Jun</option>";
echo "<option value='Jul'>Jul</option>";
echo "<option value='Aug'>Aug</option>";
echo "<option value='Sep'>Sep</option>";
echo "<option value='Oct'>Oct</option>";
echo "<option value='Nov'>Nov</option>";
echo "<option value='Dec'>Dec</option>";
$ro->coconutComboBoxStop();
echo "</td>";
echo "<td>";
$ro->coconutComboBoxStart_short("fromDay");

for($x=1;$x<32;$x++) {

if($x < 10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
$ro->coconutComboBoxStop();
echo "</td>";
echo "<td>";
echo "<input type=text name='fromYear' value='".date("Y")."' class='shortField'>";
echo "</td>";
echo "</tr>";

echo "</table>";
echo "<table border=0>";
echo "<tr>";
echo "<td>";
echo "<font size=3>Type</font>";
echo "</td>";
echo "<td>";
$ro->coconutComboBoxStart_long("type");
$ro->showOption("phicType","type");
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();


?>
