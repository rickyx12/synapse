<?php
include("../../myDatabase.php");
$status = $_GET['status'];
$registrationNo = $_GET['registrationNo'];
$chargesCode = $_GET['chargesCode'];
$description = $_GET['description'];
$sellingPrice = $_GET['sellingPrice'];
$timeCharge = $_GET['timeCharge'];
$chargeBy = $_GET['chargeBy'];
$title = $_GET['title'];
$paidVia = $_GET['paidVia'];
$cashPaid = $_GET['cashPaid'];
$batchNo = $_GET['batchNo'];
$username = $_GET['username'];
$quantity = $_GET['quantity'];
$inventoryFrom = $_GET['inventoryFrom'];
$discount = $_GET['discount'];
$room = $_GET['room'];

$ro = new database();
$ro->getDoctorSpecialization($chargesCode);
?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />

<?php
echo "<form method='get' action='selectService1.php'>";
echo "<input type=hidden name='status' value='$status'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='chargesCode' value='$chargesCode'>";
echo "<input type=hidden name='sellingPrice' value='$sellingPrice'>";
echo "<input type=hidden name='timeCharge' value='$timeCharge'>";
echo "<input type=hidden name='chargeBy' value='$chargeBy'>";
echo "<input type=hidden name='title' value='$title'>";
echo "<input type=hidden name='paidVia' value='$paidVia'>";
echo "<input type=hidden name='cashPaid' value='$cashPaid'>";
echo "<input type=hidden name='batchNo' value='$batchNo'>";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='quantity' value='$quantity'>";
echo "<input type=hidden name='discount' value='$discount'>";
echo "<input type=hidden name='inventoryFrom' value='$inventoryFrom'>";
echo "<input type=hidden name='room' value='$room'>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class='labelz'>Doctor</font>&nbsp;<input type=text class='txtBox' name='description' value='$description'>";
echo "<br>";
echo "<font class='labelz'>Specialization</font>&nbsp;<select name='specialization' class='comboBox'>";
echo "<option value='".$ro->specialization1()."'>".$ro->specialization1()."</option>";

if($ro->specialization2 != "") {
echo "<option value='".$ro->specialization2()."'>".$ro->specialization2()."</option>";
}else {
echo "";
}

if($ro->specialization3 != "") {
echo "<option value='".$ro->specialization3()."'>".$ro->specialization3()."</option>";
}else {
echo "";
}

if($ro->specialization4 != "") {
echo "<option value='".$ro->specialization4()."'>".$ro->specialization4()."</option>";
}else {
echo "";
}

if($ro->specialization5 != "") {
echo "<option value='".$ro->specialization5()."'>".$ro->specialization5()."</option>";
}else {
echo "";
}
echo "</select>";
echo "<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class='labelz'>Service</font>&nbsp;<select name='service' class='comboBox'>";
$ro->getDoctorServices();
echo "</select>";
echo "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value='Proceed' style='border:1px solid #000; background-color:#3b5998; color:white'>";
echo "</form>";


?>
