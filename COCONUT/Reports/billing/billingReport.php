<?php
include("../../../myDatabase.php");
session_start();
$username = $_GET['username'];
$branch = $_GET['branch'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$fromTime_hour = $_GET['fromTime_hour'];
$fromTime_minutes = $_GET['fromTime_minutes'];
$fromTime_seconds = $_GET['fromTime_seconds'];
$toTime_hour = $_GET['toTime_hour'];
$toTime_minutes = $_GET['toTime_minutes'];
$toTime_seconds = $_GET['toTime_seconds'];

$ro = new database();

if(!isset($_SESSION['username'])) {
header("Location:/LOGINPAGE/module.php");
}

echo "<br><center>";
echo "<font size=5>Collection Report</font><br>";
echo "<font size=3>($branch)</font><br>";
echo $month." ".$day.", ".$year;
echo "<Br>(".$fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds." - ".$toTime_hour.":".$toTime_minutes.":".$toTime_seconds.")";
$ro->collectionIPD($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$branch);

?>
