<?php
include("../../myDatabase.php");
$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$month1 = $_POST['month1'];
$day1 = $_POST['day1'];
$year1 = $_POST['year1'];
$module = $_POST['module'];

$ro = new database();


echo "<center>";
echo "<font size=6>".$ro->getReportInformation("hmoSOA_name")."</font><br>";
echo "<font size=3>".$ro->getReportInformation("hmoSOA_address")."</font><br>";
echo "<font size=2>($month $day, $year - $month1 $day1, $year1)</font><br><br>";
echo "<center>";
echo "<font size=2>The Amount Below is the Total Amount that was Paid by the Cashier of the corresponding Branch Based on the Department</font>";
echo "<center>";
echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Particulars&nbsp;</th>";
$ro->getHeaderBranch();
echo "<th>&nbsp;<b>TOTAL</b>&nbsp;</th>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;LABORATORY&nbsp;</td>";
$ro->reportRowBranch("OPD","LABORATORY",$month,$day,$year,$month1,$day1,$year1);

echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;RADIOLOGY&nbsp;</td>";
$ro->reportRowBranch("OPD","RADIOLOGY",$month,$day,$year,$month1,$day1,$year1);

echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;PHARMACY&nbsp;</td>";
$ro->reportRowBranch("OPD","PHARMACY",$month,$day,$year,$month1,$day1,$year1);

echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;CSR&nbsp;</td>";
$ro->reportRowBranch("OPD","CSR",$month,$day,$year,$month1,$day1,$year1);

echo "</tr>";
echo "</table>";
?>
