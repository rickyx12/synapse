<?php
include("../../../myDatabase.php");
$username = $_GET['username'];
$ro = new database();

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />

<?php
 
echo "<form method='get' action='docPF_branch.php'>";
echo "<input type=hidden name='username' value='$username'>";
echo "<br><br><Br><br><center><div style='border:1px solid #000000; width:500px; height:180px; border-color:black black black black;'>";

echo "<br><table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td><font class='labelz'>From Date&nbsp;</font></td>";
echo "<td>
<select name='fromMonth' class='comboBoxShort'>  
<option value='Jan'>Jan</option>
<option value='Feb'>Feb</option>
<option value='Mar'>Mar</option>
<option value='Apr'>Apr</option>
<option value='May'>May</option>
<option value='Jun'>Jun</option>
<option value='Jul'>Jul</option>
<option value='Aug'>Aug</option>
<option value='Sep'>Sep</option>
<option value='Oct'>Oct</option>
<option value='Nov'>Nov</option>
<option value='Dec'>Dec</option>
</select>";
echo "&nbsp;<select name='fromDay' class='comboBoxShort'>";

for($x=1;$x<32;$x++) {
if($x<10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
echo "</select>";
echo "&nbsp;<input type=text name='fromYear' class='shortField' value='".date("Y")."'>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "</tr>";


echo "<tr>";
echo "<td><font class='labelz'>To Date&nbsp;</font></td>";
echo "<td>
<select name='toMonth' class='comboBoxShort'>  
<option value='Jan'>Jan</option>
<option value='Feb'>Feb</option>
<option value='Mar'>Mar</option>
<option value='Apr'>Apr</option>
<option value='May'>May</option>
<option value='Jun'>Jun</option>
<option value='Jul'>Jul</option>
<option value='Aug'>Aug</option>
<option value='Sep'>Sep</option>
<option value='Oct'>Oct</option>
<option value='Nov'>Nov</option>
<option value='Dec'>Dec</option>
</select>";
echo "&nbsp;<select name='toDay' class='comboBoxShort'>";

for($x=1;$x<32;$x++) {
if($x<10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
echo "</select>";
echo "&nbsp;<input type=text name='toYear' class='shortField' value='".date("Y")."'>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "</tr>";
echo "<tr>";
echo "<Td>".$ro->coconutText("Type")."</td>";
echo "<td>";
$ro->coconutComboBoxStart_short("type");
echo "<option value='OPD'>OPD</option>";
echo "<option value='IPD'>IPD</option>";
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br><input type=submit value='Proceed' style='border:1px solid #000; background-color:#3b5998; color:white;' >";
echo "</div>";

echo "</form>";

?>
