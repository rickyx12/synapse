<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$inventoryFrom = $_GET['inventoryFrom'];
$batchNo = $_GET['batchNo'];


$ro = new database();

$ro->getPatientProfile($registrationNo);
/*
$ro->getBatchNo();
$myFile = "/opt/lampp/htdocs/COCONUT/trackingNo/batchNo.dat";
$fh = fopen($myFile, 'r');
$batchNo = fread($fh, 100);
fclose($fh);
*/

?>

<script src="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/serverTime/serverTime.js"></script>
<script type='text/javascript'>

function showResult()
{
    
if (document.addCharge.availableCharges.value.length==0)
  {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="0px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","searchAvailableSuppliesNow.php?searchFrom="+document.addCharge.searchFrom.value+"&searchBy="+document.addCharge.searchBy.value+"&username="+document.addCharge.username.value+"&serverTime="+document.addCharge.serverTime.value+"&batchNo="+document.addCharge.batchNo.value+"&registrationNo="+document.addCharge.registrationNo.value+"&charges="+document.addCharge.availableCharges.value+"&branch="+document.addCharge.branch.value,true);
xmlhttp.send();
}





var charges = 'Search Supplies';
function SetMsg (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == charges) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = charges;
    }
}

window.onload=function() { SetMsg(document.getElementById('charges', false)); }

</script>


<?php
echo  "<body onload='DisplayTime();'>";
echo "<form name='addCharge'>";
echo "&nbsp;<input type=text name='availableCharges' id='charges' style='   
	background:#FFFFFF no-repeat 4px 4px;
	padding:4px 4px 4px 2px;
	border:1px solid #CCCCCC;
	width:400px;
	height:25px;' class='txtBox'
	onfocus='SetMsg(this, true);'
    	onblur='SetMsg(this,false);'
	onkeyup='showResult();' 
	value='Search Supplies'
>";
echo "<br><br>
<input type=hidden name='searchBy' value='description'>
";
echo "&nbsp;<font size=2>Search From:</font>&nbsp;<select name='searchFrom' style='border: 1px solid #000; color: #000;'>";
echo "<option value='$inventoryFrom'>$inventoryFrom</option>";
$ro->showInventoryLocation();
echo "</select>";
echo "<p id='curTime'></p>";
echo "<input type=hidden name='batchNo' value='$batchNo'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='branch' value='".$ro->getRegistrationDetails_branch()."'>";
echo "</form>";
echo "<div id='livesearch'></div>";
echo "</body>";
?>
