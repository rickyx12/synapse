<?php
include("../../myDatabase.php");
$description = $_POST['description'];
$requestTo_department = $_POST['requestTo_department'];
$branch = $_POST['branch']; // ito ung branch n pag rrquestan requestTo_branch
$requestingDepartment = $_POST['requestingDepartment'];
$inventoryCode = $_POST['inventoryCode'];
$username = $_POST['username'];
$quantity = $_POST['quantity'];
$x = $_POST['x']; // decoration lng e2
$status = $_POST['status'];

$ro = new database();

if($quantity <= $ro->getCurrentQTY($inventoryCode)) {
$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);
$ro->requestNow($inventoryCode,$description,$quantity,$requestTo_department,$branch,$requestingDepartment,$ro->getUserBranch_username($username,$requestingDepartment),$username,date("M_d_Y"),date("H:i:s"),$status);
}else {
echo "
<script type='text/javascript'>
alert('Sorry, The Quantity that your requesting is not enough to the current quantity which is ".$ro->getCurrentQTY($inventoryCode)."  ');
history.go(-1);
</script>
";
}

?>
