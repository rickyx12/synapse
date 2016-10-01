<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$ro = new database();

$ro->getPatientProfile($registrationNo);
$ro->setPatientRecord($ro->getRegistrationDetails_patientNo());

echo "
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
.labelz {
font-size:13px;
}

.comboBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 320px;
	padding:4px 4px 4px 5px;
}


.comboBoxShort {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 65px;
	padding:4px 4px 4px 5px;
}

.panz{
	border: 1px solid #000;
	color: #000;
	height: 18px;
	width: 20px;
	border-color:white black black black;
	font-size:18px;
	text-align:center;
}

.panz1{
	border: 1px solid #000;
	color: #000;
	height: 18px;
	width: 20px;
	border-color:white black black white;
	font-size:18px;
	text-align:center;
}

</style>";

echo "<form method='get' action='editInformation1.php'>";
echo "<input type=hidden name='patientNo' value='".$ro->getRegistrationDetails_patientNo()."'>";
echo "<input type=hidden name='registrationNo' value='".$registrationNo."'>";
echo "<input type=hidden name='username' value='".$username."'>";
echo "<center><br><div style='border:1px solid #000000; width:500px; height:auto; border-color:black black black black;'>";
echo "<br>";
echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td>Last name&nbsp;</td>";
echo "<td><input type=text name='lastname'class='txtBox' value='".$ro->getLastName_patientRecord()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>First name&nbsp;</td>";
echo "<td><input type=text name='firstname'class='txtBox' value='".$ro->getFirstName_patientRecord()."' ></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Middle name&nbsp;</td>";
echo "<td><input type=text name='middlename'class='txtBox' value='".$ro->getMiddleName_patientRecord()."' ></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Age&nbsp;</td>";
echo "<td><input type=text name='age'class='shortField' value='".$ro->getPatientRecord_age()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Civil Status&nbsp;</td>";
echo "<td>
<select name='civilStatus' class='comboBox'>";
echo "<option value='".$ro->getPatientRecord_civilStatus()."'>".$ro->getPatientRecord_civilStatus()."</option>";
$ro->showCivilStatus();
echo "</select></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Birth Date&nbsp;</td>";
echo "<td><input type=text name='birthdate'class='shortField' value='".$ro->getPatientRecord_Birthdate()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Contact No#&nbsp;</td>";
echo "<td><input type=text name='contactNo'class='txtBox' value='".$ro->getPatientRecord_contactNo()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Senior&nbsp;</td>";
echo "<td>
<select name='senior' class='comboBoxShort'>";
echo "<option value='".$ro->getPatientRecord_senior()."'>".$ro->getPatientRecord_senior()."</option>";
echo "<option value='YES'>YES</option>
<option value='NO'>NO</option>
</select>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td>PhilHealth&nbsp;</td>";
echo "<td>
<select name='PhilHealth' class='comboBoxShort'>
<option value='".$ro->getPatientRecord_phic()."'>".$ro->getPatientRecord_phic()."</option>
<option value='YES'>YES</option>
<option value='NO'>NO</option>
</select>
</td>";
echo "</tr>";
if($ro->getPatientRecord_phic() == "YES") {
echo "<tr>";
echo "<td>PHIC Type:</td>";
echo "<td>";
echo "<select name='phicType' class='comboBox'>";
echo "<option value='".$ro->getPHICtype_patientRecord()."'>".$ro->getPHICtype_patientRecord()."</option>";
$ro->showOption("phicType","type");
echo "</select>";
echo "</td>";
echo "</tr>";


$pinNo = preg_split ("/\-/", $ro->getRegistrationDetails_PIN());  //kkuning ung phic pin No
echo "<tr>";
echo "<td>PhilHealth PIN#:</td>";
echo "<td><input type=text name='pin1' maxlength=1 class='panz' value='".substr($pinNo[0],-2,1)."'><input type=text name='pin2' maxlength=1 class='panz1' value='".substr($pinNo[0],-1,1)."'>-
<input type=text maxlength=1 class='panz' name='pin3' value='".substr($pinNo[1],-9,1)."'><input type=text name='pin4' class='panz1' maxlength=1 value='".substr($pinNo[1],-8,1)."'><input type=text maxlength=1 name='pin5' class='panz1' value='".substr($pinNo[1],-7,1)."'><input type=text maxlength=1 name='pin6' class='panz1' value='".substr($pinNo[1],-6,1)."' ><input type=text name='pin7' maxlength=1 class='panz1' value='".substr($pinNo[1],-5,1)."' ><input type=text name='pin8' maxlength=1 class='panz1' value='".substr($pinNo[1],-4,1)."'><input type=text maxlength=1 class='panz1' name='pin9' value='".substr($pinNo[1],-3,1)."'><input type=text maxlength=1 name='pin10' class='panz1' value='".substr($pinNo[1],-2,1)."'><input type=text name='pin11' maxlength=1 class='panz1' value='".substr($pinNo[1],-1,1)."'>-<input type=text class='panz' maxlength=1 name='pin12' value='".substr($pinNo[2],-1,1)."'></td>";
echo "</tr>";
}else {
echo "<input type=hidden name='pin1'>";
echo "<input type=hidden name='pin2'>";
echo "<input type=hidden name='pin3'>";
echo "<input type=hidden name='pin4'>";
echo "<input type=hidden name='pin5'>";
echo "<input type=hidden name='pin6'>";
echo "<input type=hidden name='pin7'>";
echo "<input type=hidden name='pin8'>";
echo "<input type=hidden name='pin9'>";
echo "<input type=hidden name='pin10'>";
echo "<input type=hidden name='pin11'>";
echo "<input type=hidden name='pin12'>";
echo "<input type=hidden name='phicType'>";
}
echo "<tr>";
echo "<td>Company&nbsp;</td>";
echo "<td>
<select name='company' class='comboBox'>";
echo "<option>".$ro->getRegistrationDetails_company()."</option>";
$ro->getAllCompany();
echo "</select></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Time Register&nbsp;</td>";
echo "<td><input type=text name='timeRegistered'class='shortField' value='".$ro->getRegistrationDetails_timeRegistered()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Date Register&nbsp;</td>";
echo "<td><input type=text name='dateRegistered'class='shortField' value='".$ro->getRegistrationDetails_dateRegistered()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Branch Register&nbsp;</td>";
echo "<td><select class='comboBox' name='branchRegistered'>";
echo "<option value='".$ro->getRegistrationDetails_branch()."'>".$ro->getRegistrationDetails_branch()."</option>";
$ro->showOption("branch","branch");
echo "</select></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Address&nbsp;</td>";
echo "<td><input type=text name='address'class='txtBox' value='".$ro->getPatientRecord_address()."'></td>";
echo "</tr>";
echo "<Tr>";
echo "<td>Type:</td>";
echo "<td>";
echo "<select name='type' class='comboBoxShort'>";
echo "<option value='".$ro->getRegistrationDetails_type()."'>".$ro->getRegistrationDetails_type()."</option>";
echo "<option value='IPD'>IPD</option>";
echo "<option value='OPD'>OPD</option>";
echo "<option value='ER'>ER</option>";
echo "<option value='OR/DR'>OR/DR</option>";
echo "</select>";
echo "</td>";
echo "</tr>";

if($ro->getRegistrationDetails_type() == "IPD") {
echo "<tr>";
echo "<td><font class='labelz'>Room&nbsp;</font></td>";
echo "<Td>";
echo "<select name='room' class='comboBox'>";
echo "<option value='".$ro->getRegistrationDetails_room()."'>".$ro->getRegistrationDetails_room()."</option>";
$ro->showOptionRoom("room","Description","status","branch",$ro->getRegistrationDetails_branch());
echo "</select>";
echo "</td>";
echo "</tr>";
}else {
echo "<input type=hidden name='room' value=''>";
}

if($ro->getRegistrationDetails_dateUnregistered() != "") {
echo "<tr>";
echo "<td><font class='labelz'>Time Discharged</font></td>";
echo "<td><input type=text name='timeUnregistered' value='".$ro->getRegistrationDetails_timeUnregistered()."' class='txtBox'></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Discharged</font></td>";
echo "<td><input type=text name='dateUnregistered' value='".$ro->getRegistrationDetails_dateUnregistered()."' class='txtBox'></td>";
echo "</tr>";
}else {
echo "<input type=hidden name='timeUnregistered' value=''>";
echo "<input type=hidden name='dateUnregistered' value=''>";
}



echo "<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><input type=submit value='        Edit        ' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'></td></tr>";
echo "</table>";
echo "<br>";
echo "</div>";
echo "</form>";
?>



