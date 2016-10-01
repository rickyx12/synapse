<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />

<style type="text/css">
a { text-decoration:none; color:red; }

.button{
	border: 1px solid #fff;
	color: #000;
	height: 28px;
	width: 381px;
	border-color:blue blue blue blue;
	font-size:15px;
	text-align:center;
	background-color:white;
}


.button1{
	border: 1px solid #fff;
	color: #000;
	height: 28px;
	width: 381px;
	border-color:red red red red;
	font-size:15px;
	text-align:center;
	background-color:white;
}

.button:hover {
background-color:yellow;
color:black;
}

.button1:hover {
background-color:yellow;
color:black;
}


</style>


<?php


echo "<br>";
echo "<br>";
echo "<br><center><div style='border:1px solid #000000; width:495px; height:auto; border-color:black black black black;'>";
echo "<br>";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/selectShift.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=submit value='S.O.A (By Date)' class='button'>";
echo "</form>";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/selectCategory.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=submit value='S.O.A (By Category)' class='button'>";
echo "</form>";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/Covered.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='show' value='phic'>";
echo "<input type=submit value='S.O.A (PhilHealth Covered)' class='button'>";
echo "</form>";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/Covered.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='show' value='company'>";
echo "<input type=submit value='S.O.A (Company/HMO Covered)' class='button'>";
echo "</form>";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/Covered.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='show' value='cashPaid'>";
echo "<input type=submit value='S.O.A (Paid)' class='button'>";
echo "</form>";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/Covered.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='show' value='cashUnpaid'>";
echo "<input type=submit value='S.O.A (Unpaid)' class='button'>";
echo "</form>";

echo "<form method='get' action='soaSelect.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='show' value='All'>";
echo "<input type=submit value='S.O.A (Selected Item)' class='button'>";
echo "</form>";

echo "</div>";

?>
