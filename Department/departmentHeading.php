<?php
include("../myDatabase.php");
session_start();
$username = $_SESSION['username'];
$module = $_SESSION['module'];
$ro = new database();

$branch = $ro->getUserBranch_username($username,$module);



?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />
        <script type="text/javascript" src="http://<?php echo $ro->getMyUrl() ?>/Registration/menu/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="http://<?php echo $ro->getMyUrl() ?>/Registration/menu/jquery.fixedMenu.js"></script>
        <link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl();?>/Registration/menu/fixedMenu_style1.css" />

<?php

echo "
<script type='text/javascript'>

        $('document').ready(function(){
            $('.menu').fixedMenu();

        });


$('#breadcrumbs a').hover(
    function () {
        $(this).addClass('hover').children().addClass('hover');
        $(this).parent().prev().find('span.arrow:first').addClass('pre_hover');
    },
    function () {
        $(this).removeClass('hover').children().removeClass('hover');
        $(this).parent().prev().find('span.arrow:first').removeClass('pre_hover');
    }
);


var username = 'Search Patient';
function SetMsg(txt,active) {
    if (txt == null) return;
    
    if (active) {
        if (txt.value == username) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = username;
    }
}

window.onload=function() { SetMsg(document.getElementById('searchPatient', false)); }
</script>

<style type='text/css'>
.txtBox {
	border: 1px solid #CCC;
	color: #999;
	height: 50px;
	width: 350px;
}
</style>

";

?>
</head>
<body>
<ol id="breadcrumbs">
        <li><a href="http://<?php echo $ro->getMyUrl(); ?>/Department/initializeDepartment.php?module=<?php echo $_SESSION['module']; ?>"><font color=white>Home</font><span class="arrow"></span></a></li>
        <li><a href="#" class='odd'><font color=yellow><?php echo $_SESSION['module']." (".$branch.")"; ?></font><span class="arrow"></span></a></li>

    <li>&nbsp;&nbsp;</li>
</ol>


    <div class="menu">
        <ul>
            <li>
                <a href="#">Transaction<span class="arrow"></span></a>
                

                <ul>

<?php

if($module != "BILLING") {

                 echo ' <li><a href="http://'.$ro->getMyUrl().'/Department/selectShift.php?module='.$module.'&username='.$username.'&branch='.$branch.'>" target="departmentX" >Diagnostics</a></li>';
                 echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/currentPatient/patientInterface.php?username=<?php echo $username; ?>&completeName=" target="_blank">Search Patient</a></li>';

}else {
echo ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/admittedPatient/admitted_update.php?module='.$module.'&username='.$username.'&branch='.$branch.'" target="departmentX" >Admitted</a></li>';
$ro->showFloorAsUpperMenu_billing($ro->getUserBranch_username($username,$module),$username);
$ro->coconutUpperMenu_headingMenu_target("http://".$ro->getMyUrl()."/Department/redirectSearch.php?username=$username&completeName=&module=$module","Search Patient","_blank");
}

?>


                </ul>
            </li>
            <li>
                <a href="#">Reports<span class="arrow"></span></a>
                <ul>

<?php if($module != "BILLING" ) { ?>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/departmentSelectShift_sales.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Sales" target="departmentX">Sales</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/departmentSelectShift_remittance.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Remittance" target="departmentX">Remittance</a></li>

<?php } else {  ?>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/billing/selectShift.php?username=<?php echo $username; ?>&branch=<?php echo $ro->getUserBranch_username($username,$module) ?>" target="departmentX">Collection</a></li>

<?php } ?>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/inventoryReport/currentInventory.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Current Inventory&branch=<?php echo $ro->getUserBranch_username($username,$module);  ?>" target="departmentX">Inventory</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/inventoryReport/selectShift.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Current Usages&branch=<?php echo $ro->getUserBranch_username($username,$module);  ?>" target="departmentX" >Usages</a></li>
                </ul>
            </li>    


  <li>
 <a href="#">Requestition of Medicine<span class="arrow"></span></a>
 <ul>
<?php $ro->getDepartmentBranch("departmentX","medicine",$username,$module); ?>
</li>
</ul>


  <li>
 <a href="#">Requestition of Supplies<span class="arrow"></span></a>
 <ul>
<?php $ro->getDepartmentBranch("departmentX","supplies",$username,$module); ?>
</li>
</ul>


<?php

if($module == "CSR") {
echo "<li>";
$ro->getTotalRequest("departmentX",$username,"CSR",$ro->getUserBranch_username($username,$module));
if($ro->allRequest() >0) {
echo "<a href='#'>Request (<font color=red>".$ro->allRequest()."</font>)<span class='arrow'></span></a>";
}else {
echo "<a href='#'>Request<span class='arrow'></span></a>";
}
echo "<ul>";
echo $ro->getCSRBranch("departmentX",$username,"CSR",$ro->getUserBranch_username($username,$module));
echo "</li>";
echo "</ul>";
}else {
echo "";
}

?>


  <li>
 <a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/availableMedicine/receivingRequest.php?module=<?php echo $module; ?>&branch=<?php echo $ro->getUserBranch_username($username,$module); ?>&username=<?php echo $username; ?>" target='departmentX'>Receiving of Request<?php if($ro->getReceivingRequest($module,$ro->getUserBranch_username($username,$module)) > 0) { echo "(<font color=red>".$ro->getReceivingRequest($module,$ro->getUserBranch_username($username,$module))."</font>)";  }else { echo ""; }   ?><span class="arrow"></span></a>
 <ul>

</li>
</ul>

       
</ul>
</div>



<iframe src="http://<?php echo $ro->getMyUrl(); ?>/Department/departmentPage.php?" width="991" height="540" name="departmentX" border=1 frameborder=no></iframe>

</body>
</html>
