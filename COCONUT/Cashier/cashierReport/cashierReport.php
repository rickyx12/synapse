<?php
include("../../../myDatabase.php");
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$fromTime_hour = $_GET['fromTime_hour'];
$fromTime_minutes = $_GET['fromTime_minutes'];
$fromTime_seconds = $_GET['fromTime_seconds'];
$toTime_hour = $_GET['toTime_hour'];
$toTime_minutes = $_GET['toTime_minutes'];
$toTime_seconds = $_GET['toTime_seconds'];
$username = $_GET['username'];
$status = $_GET['status'];
$reportName = $_GET['reportName'];

$ro = new database();
echo "<font size=3>$reportName Report</font>";
echo "<br><font size=2>$month $day, $year</font>";
echo "<br><font size=2>$fromTime_hour:$fromTime_minutes:$fromTime_seconds - $toTime_hour:$toTime_minutes:$toTime_seconds</font>";
echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Name&nbsp;</th>";
echo "<th>&nbsp;Description&nbsp;</th>";
echo "<th>&nbsp;Price&nbsp;</th>";
echo "<th>&nbsp;QTY&nbsp;</th>";
echo "<th>&nbsp;Disc&nbsp;</th>";
echo "<th>&nbsp;Total&nbsp;</th>";
echo "<th>&nbsp;Balance&nbsp;</th>";
echo "<th>&nbsp;Paid&nbsp;</th>";
echo "<th>&nbsp;Paid By&nbsp;</th>";
echo "</tr>";
$ro->getCashierReport($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$status);

$ro->getCashierReportBalance($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$status);
echo "</table>";
echo "<br>";
echo "<font size=3>Total Sales</font>&nbsp;".number_format($ro->collection_salesTotal() + $ro->balance_salesTotal() ,2);
echo "<br><font size=3>Total Balance</font>&nbsp;".number_format($ro->collection_salesUnpaid() + $ro->balance_salesUnpaid(),2);
echo "<br><Font size=3>Total Paid</font>&nbsp;".number_format($ro->collection_salesPaid() + $ro->balance_salesPaid(),2);
echo "<br><Br><Font size=3><b>Cash</b></font>&nbsp;".number_format($ro->collection_cash() + $ro->balance_salesPaid(),2);
echo "<br><Font size=3><b>Credit Card</b> </font>&nbsp;".number_format($ro->collection_creditCard() + $ro->balance_salesPaid(),2);
?>
