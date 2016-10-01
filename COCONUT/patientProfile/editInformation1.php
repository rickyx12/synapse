<?php
include("../../myDatabase.php");
$patientNo = $_GET['patientNo'];
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$lastname = $_GET['lastname'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$age = $_GET['age'];
$civilStatus = $_GET['civilStatus'];
$birthdate = $_GET['birthdate'];
$contactNo = $_GET['contactNo'];
$senior = $_GET['senior'];
$PhilHealth = $_GET['PhilHealth'];
$phicType = $_GET['phicType'];
$company = $_GET['company'];
$timeRegistered = $_GET['timeRegistered'];
$dateRegistered = $_GET['dateRegistered'];
$branchRegistered = $_GET['branchRegistered'];
$address = $_GET['address'];
$type = $_GET['type'];
$room = $_GET['room'];
$timeUnregistered = $_GET['timeUnregistered'];
$dateUnregistered = $_GET['dateUnregistered'];


$pin1 = $_GET['pin1'];
$pin2 = $_GET['pin2'];
$pin3 = $_GET['pin3'];
$pin4 = $_GET['pin4'];
$pin5 = $_GET['pin5'];
$pin6 = $_GET['pin6'];
$pin7 = $_GET['pin7'];
$pin8 = $_GET['pin8'];
$pin9 = $_GET['pin9'];
$pin10 = $_GET['pin10'];
$pin11 = $_GET['pin11'];
$pin12 = $_GET['pin2'];

$pinNo = $pin1."".$pin2."-".$pin3."".$pin4."".$pin5."".$pin6."".$pin7."".$pin8."".$pin9."".$pin10."".$pin11."-".$pin12;

$ro = new database();

$ro->editCompleteName($patientNo,$lastname." ".$firstname." ".$middlename);
$ro->editLastName($patientNo,$lastname);
$ro->editFirstName($patientNo,$firstname);
$ro->editMiddleName($patientNo,$middlename);
$ro->editAge($patientNo,$age);
$ro->editCivilStatus($patientNo,$civilStatus);
$ro->editBirthDate($patientNo,$birthdate);
$ro->editContactNo($patientNo,$contactNo);
$ro->editSenior($patientNo,$senior);
$ro->editPHIC($patientNo,$PhilHealth);
$ro->editCompany($patientNo,$company);
$ro->editTimeRegistered($patientNo,$timeRegistered);
$ro->editDateRegistered($patientNo,$dateRegistered);
$ro->editAddress($patientNo,$address);
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"branch",$branchRegistered);
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"type",$type);
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"PIN",$pinNo);
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered",$dateUnregistered);
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered",$timeUnregistered);

if($PhilHealth == "NO") {
$ro->EditNow("patientRecord","patientNo",$patientNo,"phicType","");
}else {
$ro->EditNow("patientRecord","patientNo",$patientNo,"phicType",$phicType);
}
$ro->getPatientProfile($registrationNo);


if($ro->getRegistrationDetails_type() == "OPD") { // kung opd ang type
$ro->EditNow("room","Description",$room,"status","Vacant"); // gwen vacant ang room bago pa mag update as opd
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"room","OPD_OPD"); //set room as opd
$ro->deleteNow("patientCharges","title","Room And Board"); // delete room kpg OPD or gnwa xang opd
}else if($ro->getRegistrationDetails_type() == "ER") {
$ro->EditNow("room","Description",$room,"status","Vacant"); // gwen vacant ang room bago pa mag update as opd
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"room","ER_ER"); //set room as er
$ro->deleteNow("patientCharges","title","Room And Board"); // delete room kpg ER or gnwa xang opd
}else if($ro->getRegistrationDetails_type() == "OR/DR") {
$ro->EditNow("room","Description",$room,"status","Vacant"); // gwen vacant ang room bago pa mag update as opd
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"room","OR/DR_OR/DR"); //set room as or/dr
$ro->deleteNow("patientCharges","title","Room And Board"); // delete room kpg ER or gnwa xang opd
}else {

$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"room",$room);

if($ro->getRegistrationDetails_room() == "OPD_OPD" || $ro->getRegistrationDetails_room() == "ER_ER" || $ro->getRegistrationDetails_room() == "OR/DR_OR/DR") {
echo ""; //STAND BY... wLang ggWen
}else {
//ADD CHARGES AS ROOM

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

$ro->deleteNow("patientCharges","title","Room And Board"); // delete original room ... incase nag transfer ng ibang room
$ro->getRoom($room); // source of data pra sa room... pra makuha ung rate ng room from the masterfile
$ro->addCharges_cash("UNPAID",$registrationNo,$room,$room,$ro->room_rate(),0,$ro->room_rate(),$ro->room_rate(),0,0,date("H:i:s"),date("M_d_Y"),$username,"Confinement","Room And Board","Cash",0,"",1,"",$branchRegistered,""); //add room 
$ro->EditNow("room","Description",$room,"status","Occupied"); // gwen occupied ang room 

}

/*
echo "
<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=$registrationNo&username=$username';
</script>

";
*/
}



//RELOAD PAGE PRA MWLA UNG PhilHealth Menu sa may patient profile
echo "
<script type='text/javascript'>
window.parent.location.reload();
</script>";


?>
