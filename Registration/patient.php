<?php
include("../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

?>


<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/Registration/menu/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/Registration/menu/jquery.fixedMenu.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/Registration/menu/fixedMenu_style1.css" />

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />

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

        $('document').ready(function(){
            $('.menu').fixedMenu();
        });

</script>


<ol id="breadcrumbs">
   <li><a href="http://<?php echo $ro->getMyUrl(); ?>/LOGINPAGE/module.php"><font color=white>Home</font><span class="arrow"></span></a></li>
    <li><a href="#" class="odd"><font color=white>Registration</font><span class="arrow"></span></a></li>
    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/opdRegistration.php?module=REGISTRATION"><font color=white>Verify Patient Record</font><span class="arrow"></span></a></li>
    <li><a href="#" class="odd"><font color=white><b>Registration Form</b></font><span class="arrow"></span></a></li>
    <li><a href="#">Verify Registration<span class="arrow"></span></a></li>
   <li><a href="#" class="odd"><font color=yellow>Patient<span class="arrow"></span></a></li>
    <li>&nbsp;&nbsp;</li>
</ol>

 <div class="menu">
        <ul>
            <li>
                <a href="#">Information<span class="arrow"></span></a>
                
                <ul>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/editInformation.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Registration Details</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/editVitalSign.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Vital Sign</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl() ?>/COCONUT/patientProfile/editInitialDiagnosis.php?registrationNo=<?php echo $registrationNo ?>&username=<?php echo $username; ?>" target="patientX">Initial Diagnosis</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" target="patientX">Back To Profile</a></li>
                </ul>
            </li>
</div>


<iframe src="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/patientProfile_handler.php?registrationNo=<?php echo $registrationNo; ?>&username=<?php echo $username; ?>" name="patientX" width="1015" height="530" style="overflow-x:hidden; border:hidden; "></iframe>


