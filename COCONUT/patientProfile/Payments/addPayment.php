<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];


$ro = new database();

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />


<?php

echo "<form method='get' action='addPayment1.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='username' value='$username'>";
echo "<br><br><br><center><div style='border:1px solid #000000; width:600px; height:150px; border-color:black black black black;'>";
echo "<Br>";
echo "<Table border=0>";
echo "<tr>";
echo "<td><font class='labelz'>Payment For&nbsp;</font></tD>";
echo "<tD>";
echo "<select name='paymentFor' class='comboBox'>";
echo "<option value='PATIENT'>PATIENT</option>";
//$ro->showOption("Category","Category");
echo "</select>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Amount</font></tD>";
echo "<td><input type=text name='amountPaid' class='shortField'></tD>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Date</font></tD>";
echo "<td><input type=text name='datePaid' value='".date("M_d_Y")."' class='shortField'></tD>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<input type=submit value='Proceed' style='border:1px solid #000; background-color:#3b5998; color:white'>";
echo "</div>";
echo "</form>";
?>
