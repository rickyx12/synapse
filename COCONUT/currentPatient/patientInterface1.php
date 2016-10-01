<?php
include("../../myDatabase.php");
session_start();
$username = $_GET['username'];
$registrationNo = $_SESSION['registrationNo'];
//$module = $_SESSION['module'];
$_SESSION['username'] = $username;
//$_SESSION['registrationNo'] = $registrationNo;
$ro = new database();


if ( (!isset($_SESSION['username']) || !isset($_SESSION['registrationNo'])) ) {
header("Location:/COCONUT/patientProfile/unknownUser/verifyUser.php?registrationNo=$_GET[registrationNo] ");
die();
}


if($_GET['username'] == "") {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/patientProfile/unknownUser/verifyUser.php?registrationNo=$registrationNo");
}

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />
<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/jquery.js"></script>
<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/jquery.autocomplete.css" />


<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/Registration/menu/jquery.fixedMenu.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/Registration/menu/fixedMenu_style1.css" />


	

<script type="text/javascript">


        $('document').ready(function(){
            $('.menu').fixedMenu();

        });



	$().ready(function() {
	    $("#patientSearch").autocomplete("searchRegisteredPatient.php", {
	        width: 260,
	        matchContains: true,
	        selectFirst: false
                
	    }).result(function(event, data, formatted) {

window.location="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/currentPatient/patientInterface.php?completeName="+data+"&username=<?php echo $username; ?>"; 

 });
;
	});



var patient = 'Search Patient';
function SetMsg (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == patient) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = patient;
    }
}

window.onload=function() { SetMsg(document.getElementById('patientSearch', false)); }


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

<ol id="breadcrumbs">
  <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/currentPatient/initializePatient.php" class="odd"><font color=white>Home</font><span class="arrow"></span></a></li>
  <li><a href="#"><font color=white>Patient</font><span class="arrow"></span></a></li>
  <li><a href="http://<?php echo $ro->getMyUrl(); ?>/LOGINPAGE/module.php" class="odd"><font color=yellow>Search Patient</font><span class="arrow"></span></a></li>
<li></li>    
<li>


<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=text id='patientSearch' style='   
	background:#FFFFFF url(http://".$ro->getMyUrl()."/COCONUT/myImages/search.jpeg) no-repeat 4px 4px;
	padding:4px 4px 4px 22px;
	border:1px solid #CCCCCC;
	width:400px;
	height:25px;' class='txtBox'
	onfocus='SetMsg(this, true);'
    	onblur='SetMsg(this,false);'
	value='Search Patient'
>"; ?></li>

</ol>

 <div class="menu">
        <ul>
            <li>
              

  <a href="#">Information<span class="arrow"></span></a>
                
                <ul>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/editInformation.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Registration Details</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/editVitalSign.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Vital Sign</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl() ?>/COCONUT/patientProfile/editInitialDiagnosis.php?registrationNo=<?php echo $registrationNo ?>&username=<?php echo $username; ?>" target="patientX">Diagnosis</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Back To Profile</a></li>
               
		  <li><a href="#" onclick="javascript:window.close()" >Close Profile</a></li>
</ul>
</li>




            <li>
              

  <a href="#">Payment's<span class="arrow"></span></a>
                
                <ul>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/paymentAssigning.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>&show=All&desc=" target="patientX">Payment Assigning</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/paymentTransfer.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>&show=All&desc=" target="patientX">Payment Transfering</a></li> 

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/Payments/addPayment.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Add Payment</a></li>  

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/Payments/viewPayment.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">View Payment</a></li> 
 
                
</ul>
</li>



<?php

$ro->getPatientProfile($_GET['registrationNo']);

?>

  <li>
<?php

if($ro->getPatientRecord_phic() == "YES") {
echo  "<a href='#'>PhilHealth<span class='arrow'></span></a>";
}else {
echo "";
}
?>
 <ul>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/philhealth/cf2.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Claim Form 2 (Front)</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/philhealth/cf2_back.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Claim Form 2 (Back)</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/viewICD.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">View ICD Code</a></li>

</li>
</ul>


</li>
</ul>

</div>

<iframe src="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" name="patientX" width="1015" height="530" style="border:hidden;  "></iframe>
