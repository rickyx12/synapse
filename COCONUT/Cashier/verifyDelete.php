<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$description = $_GET['description'];
$quantity = $_GET['quantity'];

$ro = new database();

?>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />

<?php
echo "<br><br><br><Br><br>";

if($ro->getTitle($itemNo) == "MEDICINE" || $ro->getTitle($itemNo) == "SUPPLIES" ) {
echo "<center><div style='border:1px solid #ff0000; width:400px; height:120px;	'>";
echo "<br><center><font size=2 color=red>Are you sure you want to return <br>$description?</font></center>";

}else {
echo "<center><div style='border:1px solid #ff0000; width:400px; height:110px;	'>";
echo "<br><center><font size=2 color=red>Are you sure you want to delete <br>$description?</font></center>";
echo "<Br>";
}
echo "";

echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/Cashier/deletePatientCharges.php'>
<input type=hidden name='itemNo' value='$itemNo'>
<input type=hidden name='registrationNo' value='$registrationNo'>";

if(($ro->getTitle($itemNo)=="MEDICINE" || $ro->getTitle($itemNo)=="SUPPLIES") && ($ro->getChargesStatus($itemNo)=="PAID")) {
echo "
<input type=text name='quantity' value='$quantity' style='width:70px; border:1px solid #ff0000; padding:2px 2px 2px 10px; '><br><br>";
}else {
echo "
<input type=hidden name='quantity' value='$quantity'>";
	}

echo "
<input type=submit value='Yes' style='border:1px solid #ff0000; background-color:transparent;'>
</form>
";
echo "</div></center>";


?>
