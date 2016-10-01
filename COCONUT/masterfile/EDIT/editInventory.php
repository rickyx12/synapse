<?php
include("../../../myDatabase.php");
$username = $_GET['username'];
$inventoryCode = $_GET['inventoryCode'];
$description = $_GET['description'];
$genericName = $_GET['genericName'];
$unitcost = $_GET['unitcost'];
$quantity = $_GET['quantity'];
$expiration = $_GET['expiration'];
$addedBy = $_GET['addedBy'];
$dateAdded = $_GET['dateAdded'];
$timeAdded = $_GET['timeAdded'];
$inventoryLocation = $_GET['inventoryLocation'];
$inventoryType = $_GET['inventoryType'];
$inventoryCode = $_GET['inventoryCode'];
$branch = $_GET['branch'];
$transition = $_GET['transition'];
$remarks = $_GET['remarks'];
$preparation = $_GET['preparation'];


$ro = new database();
?>


<script src="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/serverTime/serverTime.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />



<style type='text/css'>
.txtBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 320px;
	padding:4px 4px 4px 5px;
}

.shortField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 120px;
	padding:4px 4px 4px 5px;
}


.bdayField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 90px;
	padding:4px 4px 4px 5px;
}

.comboBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 300px;
	padding:4px 4px 4px 5px;
}

.comboBoxShort {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 65px;
	padding:4px 4px 4px 5px;
}


.comboBoxDay {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 45px;
	padding:4px 4px 4px 5px;
}


.labelz {
color:#000;
font-size=10px;
}
</style>

<script type='text/javascript'>
$("#breadcrumbs a").hover(
    function () {
        $(this).addClass("hover").children().addClass("hover");
        $(this).parent().prev().find("span.arrow:first").addClass("pre_hover");
    },
    function () {
        $(this).removeClass("hover").children().removeClass("hover");
        $(this).parent().prev().find("span.arrow:first").removeClass("pre_hover");
    }
);
</script>


<?php
$expire = preg_split ("/\_/", $expiration); 
echo "<body onload='DisplayTime();'>";
echo "<form method='get' action='editInventory1.php'>";
echo "<br><center><div style='border:1px solid #000000; width:500px; height:425px; border-color:black black black black;'>";
echo "<br><table border=0 cellpadding=0 cellspacing=0>";
echo "<input type=hidden name='inventoryType' value='medicine'>";
echo "<input type=hidden name='addedBy' value='$username'>";
echo "<tr>";
echo "<td><font class='labelz'>Description&nbsp;</font></td>";
echo "<td><input type=text class='txtBox' name='description' value='$description'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Generic&nbsp;</font></td>";
echo "<td><input type=text class='txtBox' name='generic' value='$genericName'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Preparation&nbsp;</font></td>";
echo "<td>
<select name='preparation' class='comboBox'>
<option value='$preparation'>$preparation</option>
<option value='dose'>dose</option>
<option value='cap'>cap</option>
<option value='syrup'>syrup</option>
<option value='injectible'>injectible</option>
<option value='tab with ml'>tab with ml</option>
<option value='mg'>mg</option>
<option value='gm content'>gm content</option>
</select>

</td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Unit Cost&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='unitcost' value='$unitcost'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Quantity&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='quantity' value='$quantity'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Expiration&nbsp;</font></td>";
echo "<td>";
echo "
<select name='month' class='comboBoxShort'>
<option value='$expire[0]'>$expire[0]</option>
<option value='Jan'>Jan</option>
<option value='Feb'>Feb</option>
<option value='Mar'>Mar</option>
<option value='Apr'>Apr</option>
<option value='Mat'>May</option>
<option value='Jun'>Jun</option>
<option value='Jul'>Jul</option>
<option value='Aug'>Aug</option>
<option value='Sep'>Sep</option>
<option value='Oct'>Oct</option>
<option value='Nov'>Nov</option>
<option value='Dec'>Dec</option>
</select>";

echo "&nbsp;<select name='day' class='comboBoxDay'>";
echo "<option value='$expire[1]'>$expire[1]</option>";
for($x=1;$x<=31;$x++) {
if($x < 9) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
echo "</select>";
echo "&nbsp;<input type=text name='year'value='$expire[2]' class='bdayField'>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Date Added&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='dateAdded' value='$dateAdded'></></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Time Added&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='timeAdded' value='$timeAdded'></></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Inventory Type&nbsp;</font></td>";
echo "<td><input type=text class='txtBox' name='inventoryType' value='$inventoryType'></></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Location&nbsp;</font></td>";
echo "<td>";
echo "<select class='comboBox' name='inventoryLocation'>";
echo "<option value='$inventoryLocation'>$inventoryLocation</option>";
$ro->showInventoryLocation();
echo "</select>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='labelz'>Branch&nbsp;</font></td>";
echo "<td>";
echo "<select class='comboBox' name='branch'>";
echo "<option value='$branch'>$branch</option>";
$ro->showOption("branch","branch");
echo "</select>";
echo "</td>";
echo "</tr>";

echo "<tr>
<td><font class='labelz'>Transition</font></td>
<td><select name='transition' class='txtBox'>"; 
echo "<option value='$transition'>$transition</option>";
$ro->showOption("inventoryTransition","transition");
echo "</select></td>
</tr>";


echo "<tr>
<td><font class='labelz'>Remarks</font></td>
<td><input type=text name='remarks' class='txtBox' value='$remarks'></td>
</tr>";

echo "</table>";
echo "<p id='curTime'>";
echo "</div>";
echo "<input type=hidden name='inventoryCode' value='$inventoryCode'>";
echo "<br><input type='submit' value='Proceed'>";
echo "</form>";
echo "</body>";

?>
