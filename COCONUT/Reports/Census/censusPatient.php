<?php
include("../../../myDatabase.php");
$fromMonth = $_GET['fromMonth'];
$fromDay = $_GET['fromDay'];
$fromYear = $_GET['fromYear'];
$toMonth = $_GET['toMonth'];
$toDay = $_GET['toDay'];
$toYear = $_GET['toYear'];
$department = $_GET['department'];
$switch = $_GET['switch']; // ito ung variable na magddefined ng census kung per patient or per examination
$type = $_GET['type'];
$ro = new database();


echo "<Center>";
echo "<font size=6>".$ro->getReportInformation("hmoSOA_name")."</font><br>";
echo "<font size=3>".$ro->getReportInformation("hmoSOA_address")."</font><br>";
if($switch ==1) {
echo "<br><font size=4><b>$department PATIENT CENSUS ($type)</b></font><Br>";
}else {
echo "<br><font size=4><b>$department EXAMINATION CENSUS ($type)</b></font><Br>";
}
echo "<font size=2>( $fromMonth $fromDay, $fromYear - $toMonth $toDay, $toYear )</font><br><br>";
if($switch ==1) {
echo "<font size=2>Census Report Per Patient in $department that was Paid by the cashier or Approved by the HMO</font>";
}else {
echo "<font size=2>Census Report Per Examination in $department that was Paid by the cashier or Approved by the HMO</font>";
}
echo "<center>
<table border=1 cellpadding=0 cellspacing=0>
<tr>
<th>&nbsp;Examination&nbsp;</th>
";
$ro->getHeaderBranch(); // ggwing table header ung mga branches
echo "<th>&nbsp;<b>TOTAL</b>&nbsp;</th>";
echo "
</tr>
<tr>";
$ro->listExaminationAsRow($switch,$department,$type,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear);
echo "</tr>

</table>

";


?>
