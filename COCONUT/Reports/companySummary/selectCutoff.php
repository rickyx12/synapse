<?php
include("../../../myDatabase.php");
$username = $_GET['username'];
$ro = new database();
?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />
<form method="get" action="companyReport.php">
<input type="hidden" name="username" value="<?php echo $username;?>">
<br><br><center>
<div style='border:1px solid #000000; width:500px; height:162px; border-color:black black black black;'>
<br><table border=0 cellpadding=0 cellspacing=0>
<tr>
<td><font class='labelz'>From Date:</font></td>
<td>&nbsp;<select name='fromMonth' class='comboBoxShort'>
<option value="Jan">Jan</option>
<option value="Feb">Feb</option>
<option value="Mar">Mar</option>
<option value="Apr">Apr</option>
<option value="May">May</option>
<option value="Jun">Jun</option>
<option value="Jul">Jul</option>
<option value="Aug">Aug</option>
<option value="Sep">Sep</option>
<option value="Oct">Oct</option>
<option value="Nov">Nov</option>
<option value="Dec">Dec</option>
</select> - 
<select name="fromDay" class="comboBoxShort">
<?php 

for($x=1;$x<32;$x++) {
if($x<10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
 ?>
</select> - 
<input type="text" class="shortField" name="fromYear" value="<?php echo date('Y') ?>">
&nbsp;</td>
</tr>

<tr>
<td><font class='labelz'>To Date:</font></td>
<td>&nbsp;<select name='toMonth' class='comboBoxShort'>
<option value="Jan">Jan</option>
<option value="Feb">Feb</option>
<option value="Mar">Mar</option>
<option value="Apr">Apr</option>
<option value="May">May</option>
<option value="Jun">Jun</option>
<option value="Jul">Jul</option>
<option value="Aug">Aug</option>
<option value="Sep">Sep</option>
<option value="Oct">Oct</option>
<option value="Nov">Nov</option>
<option value="Dec">Dec</option>
</select> - 
<select name="toDay" class="comboBoxShort">
<?php 

for($x=1;$x<32;$x++) {
if($x<10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
 ?>
</select> - 
<input type="text" class="shortField" name="toYear" value="<?php echo date('Y') ?>">
&nbsp;</td>
</tr>
<tr>
<td><font class='labelz'>Type</font></td>
<Td>&nbsp;<select name="type" class="comboBoxShort">
<option value="OPD">OPD</option>
<option value="IPD">IPD</option>
</select></tD>
</tr>
</table><br><br>
<?php $ro->coconutButton("Proceed"); ?>
</form>
</div>
