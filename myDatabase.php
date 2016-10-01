<?php



class database {

public $myHost = 'localhost';
public $username = 'root';
public $password = 'cebu01';
public $database = 'Coconut';


public function getMyUrl() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ipaddress FROM ipaddress ");

while($row = mysqli_fetch_array($result))
  {
return $row['ipaddress'];
  }

}


public function getSynapseModule() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM module where status = 'on' order by name asc ");

while($row = mysqli_fetch_array($result))
  {
if($row['name'] == "REGISTRATION") {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/opdRegistration.php?module=$row[name]'>".$row['name']."</a></li>";
}else if($row['name'] == "NURSING") {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/NURSING/nursingPage.php?module=$row[name]'>".$row['name']."</a></li>";
}else {
echo "<li><a href='http://".$this->getMyUrl()."/LOGINPAGE/loginpage.php?module=$row[name]'>".$row['name']."</a></li>";
}

 }

}




public $UserName,$UserPassword,$UserModule;

public function getUserName() {
return $this->UserName;
}
public function getUserPassword() {
return $this->UserPassword;
}
public function getUserModule() {
return $this->UserModule;
}


public function LogIn($username,$password,$module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module == "DOCTOR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT username,password,module FROM Doctors where username = '$username' and password='$password' and module = '$module' ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT username,password,module FROM registeredUser where username = '$username' and password='$password' and module = '$module' ");
}

while($row = mysqli_fetch_array($result))
  {
$this->UserName = $row['username'];
$this->UserPassword = $row['password'];
$this->UserModule = $row['module'];

  }

}


/****ggwa ng div ***/
public function coconutBoxStart($width,$height) {
echo "<center><br><div style='border:1px solid #000000; width:".$width."; height:".$height.";'>";
}

public function coconutBoxStart_red($width,$height) {
echo "<center><br><div style='border:1px solid #ff0000; width:".$width."; height:".$height.";'>";
}


public function coconutBoxStop() {
echo "</div>";
}
/********end ng div**********/



/*********ggwa ng form**********/
public function coconutFormStart($method,$action) {
echo "<form method='$method' action='$action'>";
}

public function coconutFormStop() {
echo "</form>";
}

public function coconutButton($value) {
echo "<input type=submit value='".$value."' style='border:1px solid #000; background-color:#3b5998; color:white'>";
}
/**********stop form*********/


/***********ggwacoconutComboBox ng comboBox****************/
public function coconutComboBoxStart_long($name) {
echo "<select name='$name' class='comboBox'>";
}
public function coconutComboBoxStart_short($name) {
echo "<select name='$name' class='comboBoxShort'>";
}
public function coconutComboBoxStop() {
echo "</select>";
}
/**************end ng comboBox******************/


public function coconutDesign() {
echo '<link rel="stylesheet" type="text/css" href="http://'.$this->getMyUrl().'/COCONUT/myCSS/coconutCSS.css" />';
}



/************ggwa ng breadcrumb**2 modules away**********************/
public function coconutHeading($module,$home) {
echo '<link rel="stylesheet" type="text/css" href="http://'.$this->getMyUrl().'/COCONUT/flow/rickyCSS1.css" />';
echo '
<script type="text/javascript">
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

';
echo '
<ol id="breadcrumbs">
        <li><a href="http://'.$this->getMyUrl().'/'.$home.'"><font color=white>Home</font><span class="arrow"></span></a></li>
        <li><a href="#" class="odd"><font color=yellow>'.$module.'</font><span class="arrow"></span></a></li>

    <li>&nbsp;&nbsp;</li>
</ol>
';
}
/*******************end ng breadcrumb******************************/


/*******************start ng upper menu****************************************/
public function coconutUpperMenuStart() {

echo '<script type="text/javascript" src="http://'.$this->getMyUrl().'/Registration/menu/jquery-1.4.2.min.js"></script>';
echo '<script type="text/javascript" src="http://'.$this->getMyUrl().'/Registration/menu/jquery.fixedMenu.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="http://'.$this->getMyUrl().'/Registration/menu/fixedMenu_style1.css" />';

echo '<script type="text/javascript">

        $("document").ready(function(){
            $(".menu").fixedMenu();

        });
</script>';
echo '<div class="menu"><ul>';
}


public function coconutUpperMenuStop() {
echo "</ul></div>";
}

public function coconutUpperMenu_headingStart($x) {
echo "<li>
<a href='#'>$x<span class='arrow'></span></a>
<ul>";
}

public function coconutUpperMenu_headingStop() {
echo "</ul></li>";
}

public function coconutUpperMenu_headingMenu($page_na_pupuntahan,$label) {
echo '<li><a href='.$page_na_pupuntahan.'>'.$label.'</a></li>';
}

public function coconutUpperMenu_headingMenu_target($page_na_pupuntahan,$label,$target) {
echo '<li><a href='.$page_na_pupuntahan.' target='.$target.'>'.$label.'</a></li>';
}

public function coconutUpperMenu_headingMenu_return($page_na_pupuntahan,$label) {
return '<li><a href='.$page_na_pupuntahan.'>'.$label.'</a></li>';
}
/**************end ng upper menu*****************************************/


public function coconutHidden($name,$value) {
echo "<input type=hidden name='$name' value='$value'>";
}
public function coconutTextBox($name,$value) {
echo "<input type=text name='$name' value='$value' class='txtBox'>";
}
public function coconutTextBox_readonly($name,$value) {
echo "<input type=text name='$name' value='$value' readonly class='txtBox'>";
}
public function coconutText($value) {
return "<font class='labelz'>$value</font>";
}
public function gotoPage($page) {
echo "<script type='text/javascript'>
window.location='$page';
</script>";
}

public function getBack($text) {
echo "<script type='text/javascript'>
alert('$text');
history.back(-1);
</script>";
}
public function coconutAjax($updateTime,$updatingPage) {

echo " 
 <html>
<head>
<script type='text/javascript'>
function RefreshTable()
{
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('tablediv').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','$updatingPage',true);
xmlhttp.send();

window.setTimeout(function(){ RefreshTable()},".$updateTime.");
}

</script>
</head>
<body onload=RefreshTable()>
    <div id=tablediv></div>
</body>
</html>";

}


public function coconutFrame($page,$width,$height) {
echo '<iframe src="'.$page.'" width="'.$width.'" height="'.$height.'" name="departmentX" border=1 frameborder=no></iframe>';
}

public function coconutFrame_target($page,$width,$height,$target) {
echo '<iframe src="'.$page.'" width="'.$width.'" height="'.$height.'" name="'.$target.'" border=1 frameborder=no></iframe>';
}

public function coconutImages($image) {
echo "<img src='http://".$this->getMyUrl()."/COCONUT/myImages/$image'>";
}

public function coconutImages_return($image) {
return "<img src='http://".$this->getMyUrl()."/COCONUT/myImages/$image'>";
}

/***************ggwa ng table*********************/
public function coconutTableStart() {
echo "<Table border=1 cellpadding=0 rules=all cellspacing=0>";
}
public function coconutTableStop() {
echo "</table>";
}
public function coconutTableRowStart() {
echo "<tr>";
}
public function coconutTableRowStop() {
echo "</tr>";
}
public function coconutTableHeader($value) {
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>".$value."</font>&nbsp;</th>";
}
public function coconutTableData($value) {
echo "<Td>&nbsp;$value&nbsp;</tD>";
}
/**************end ng table*********************************/


/********************SEARCH onProgess****************************************/
public function coconutSearchPatient($username,$search) {
echo '<script type="text/javascript" src="http://'.$this->getMyUrl().'/jquery.js"></script>';
echo '<script type="text/javascript" src="http://'.$this->getMyUrl().'/jquery.autocomplete.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="http://'.$this->getMyUrl().'/jquery.autocomplete.css" />';

echo "<script type='text/javascript'>";
echo '
	$().ready(function() {
	    $("#patientSearch").autocomplete("'.$search.'", {
	        width: 260,
	        matchContains: true,
	        selectFirst: false
                
	    }).result(function(event, data, formatted) {

window.location="http://'.$this->getMyUrl().'/COCONUT/currentPatient/patientInterface.php?completeName="+data+"&username='.$username.' "; 

 });
;
	});

';

echo "
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

";
echo "</script>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type=text id='patientSearch' style='   
	background:#FFFFFF url(http://".$this->getMyUrl()."/COCONUT/myImages/search.jpeg) no-repeat 4px 4px;
	padding:4px 4px 4px 22px;
	border:1px solid #CCCCCC;
	width:400px;
	height:25px;' class='txtBox'
	onfocus='SetMsg(this, true);'
    	onblur='SetMsg(this,false);'
	value='Search Patient'
>";


}
/********************************************************/
public function getDoctorName($username,$module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));


$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Name FROM Doctors where username = '$username' and module = '$module' ");


while($row = mysqli_fetch_array($result))
  {
return $row['Name'];

  }

}



public function categoryService($category) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Service FROM Services where Category = '$category' order by Service asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['Service']."'>".$row['Service']."</option>";
  }

}


public function getReportOfUser($module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT username FROM registeredUser where module='$module' order by username asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['username']."'>".$row['username']."</option>";
  }

}



//OPTION FOR BRANCH
public function getBranch() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch FROM branch order by branch asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['branch']."'>".$row['branch']."</option>";
  }

}


public function getCategory() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Category FROM Category order by Category asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['Category']."'>".$row['Category']."</option>";
  }

}


public function addNewCharges($description,$examination,$category,$opd,$ward,$soloward,$semiprivate,$private,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO availableCharges (Description,Service,Category,OPD,WARD,SOLOWARD,SEMIPRIVATE,PRIVATE)
VALUES
('$description','$examination','$category','$opd','$ward','$soloward','$semiprivate','$private')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";



((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function requestNow($inventoryCode,$description,$quantity,$requestTo_department,$requestTo_branch,$requestingDepartment,$requestingBranch,$requestingUser,$dateRequested,$timeRequested,$status) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO inventoryManager (inventoryCode,description,quantity,requestTo_department,requestTo_branch,requestingDepartment,requestingBranch,requestingUser,dateRequested,timeRequested,status)
VALUES
('$inventoryCode','$description','$quantity','$requestTo_department','$requestTo_branch','$requestingDepartment','$requestingBranch','$requestingUser','$dateRequested','$timeRequested','$status')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function addNewService($service,$category,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO Services (Service,Category)
VALUES
('$service','$category')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php?username=$username'";
echo "</script>";
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}





public function addNewPatientRecord($patientNo,$lastName,$firstName,$middleName,$completeName,$age,$patientContact,$birthDate,$gender,$senior,$address,$phic,$civilStatus,$phicType) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientRecord (patientNo,lastName,firstName,middleName,completeName,Birthdate,Age,Gender,Senior,Address,contactNo,PHIC,phicType,civilStatus)
VALUES
('$patientNo','$lastName','$firstName','$middleName','$completeName','$birthDate','$age','$gender','$senior','$address','$patientContact','$phic','$phicType','$civilStatus')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


//ITO UNG MAG IINSERT SA DATABASE FOR EVERY REGISTRATION EVENT OCCUR
public function addNewRegistration($patientNo,$registrationNo,$bloodPressure,$temperature,$height,$weight,$company,$initialDiagnosis,$dateRegistered,$timeRegistered,$branch,$type,$room,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO registrationDetails (patientNo,registrationNo,bloodPressure,temperature,height,weight,Company,initialDiagnosis,dateRegistered,timeRegistered,branch,type,room,PIN,registeredBy)
VALUES
('$patientNo','$registrationNo','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $bloodPressure) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $temperature) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $height) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $weight) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','$company','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $initialDiagnosis) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','$dateRegistered','$timeRegistered','$branch','$type','$room','00-000000000-0','$username')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);


}


public function addCompany($companyName,$address,$rate1,$rate2,$rate3,$rate4) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO Company (companyName,companyAddress,rate1,rate2,rate3,rate4)
VALUES
('$companyName','$address','$rate1','$rate2','$rate3','$rate4')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);


}



public function addICD($icdCode,$diagnosis,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO availableICD (icdCode,diagnosis)
VALUES
('$icdCode','$diagnosis')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$icdCode was Successfully Added to the List of ICD Code wtih a Diagnosis of $diagnosis');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/philhealth/icdCode/addICD.php?username=$username ';";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);


}


public function addICD2patient($icdCode,$diagnosis,$username,$registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientICD (registrationNo,icdCode,diagnosis)
VALUES
('$registrationNo','$icdCode','$diagnosis')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$icdCode was Successfully Added to the Patient ');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/maintenance/searchICDcode.php?username=$username&registrationNo=$registrationNo&protoType=patient&show=search ';";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);


}


public function showAllSpecialization() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Specialization FROM DoctorSpecialization order by Specialization asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['Specialization']."'>".$row['Specialization']."</option>";
  }

}


public function getServices($Category) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Service FROM Services WHERE Category = '$Category' order by Service asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['Service']."'>".$row['Service']."</option>";
  }

}


public function getDoctorServices() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT serviceName FROM DoctorService group by serviceName order by serviceName asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['serviceName']."'>".$row['serviceName']."</option>";
  }

}



public function getAllCompany() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT companyName FROM Company order by companyName asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['companyName']."'>".$row['companyName']."</option>";
  }

}


//ITO UNG MGGING UNIQUE ID NG EVERY PATIENT RECORD
public function getPatientID() {
$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/patientID.dat";
$fh = fopen($myFile, 'r');
$theData = fread($fh, 1000);
fclose($fh);

    

$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/patientID.dat";
$fh = fopen($myFile, 'w') or die("can't open file"); 
fwrite($fh, $theData+1);
fclose($fh);
}


//ITO UNG MGGING REGISTRATION NUMBER NG OPD PRA SA PAG TRACKING IT SERVE AS UNIQUE IN EVERY REGISTRATION
public function getRegistrationNo() {
$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/registrationNo.dat";
$fh = fopen($myFile, 'r');
$theData = fread($fh, 1000);
fclose($fh);

    

$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/registrationNo.dat";
$fh = fopen($myFile, 'w') or die("can't open file"); 
fwrite($fh, $theData+1);
fclose($fh);
}



public function getTrackingLabNo() {
$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/labNo.dat";
$fh = fopen($myFile, 'r');
$theData = fread($fh, 1000);
fclose($fh);

    

$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/labNo.dat";
$fh = fopen($myFile, 'w') or die("can't open file"); 
fwrite($fh, $theData+1);
fclose($fh);
}


public function getBatchNo() {
$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/batchNo.dat";
$fh = fopen($myFile, 'r');
$theData = fread($fh, 1000);
fclose($fh);

    

$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/batchNo.dat";
$fh = fopen($myFile, 'w') or die("can't open file"); 
fwrite($fh, $theData+1);
fclose($fh);
}


public $userRegistrar;
public $userRegistered;

public function getUserRegistrar() {
return $this->userRegistrar;
}

public function getUserRegistered() {
return $this->userRegistered;
}

public function getAuthorizedRegistrar($password) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT username,module FROM registeredUser where password='$password' ");

while($row = mysqli_fetch_array($result))
  {
$this->userRegistrar = $row['module'];
$this->userRegistered = $row['username'];
  }

}


public function setVerificationNo($verificationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO verificationCode (verificationNo)
VALUES
('$verificationNo')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public $registrationDetails_patientNo;
public $registrationDetails_registrationNo;
public $registrationDetails_bloodPressure;
public $registrationDetails_temperature;
public $registrationDetails_height;
public $registrationDetails_weight;
public $registrationDetails_company;
public $registrationDetails_initialDiagnosis;
public $registrationDetails_finalDiagnosis;
public $registrationDetails_dateRegistered;
public $registrationDetails_dateUnregistered;
public $registrationDetails_timeRegistered;
public $registrationDetails_timeUnregistered;
public $registrationDetails_branch;
public $registrationDetails_type;
public $registrationDetails_room;
public $registrationDetails_PIN;
public $registrationDetails_registeredBy;

public $patientRecord_completeName;
public $patientRecord_lastName;
public $patientRecord_firstName;
public $patientRecord_middleName;
public $patientRecord_Birthdate;
public $patientRecord_age;
public $patientRecord_gender;
public $patientRecord_senior;
public $patientRecord_address;
public $patientRecord_contactNo;
public $patientRecord_phic;
public $patientRecord_civilStatus;


public function getRegistrationDetails_patientNo() {
return $this->registrationDetails_patientNo;
}
public function getRegistrationDetails_registrationNo() {
return $this->registrationDetails_registrationNo;
}
public function getRegistrationDetails_bloodPressure() {
return $this->registrationDetails_bloodPressure;
}
public function getRegistrationDetails_temperature() {
return $this->registrationDetails_temperature;
}
public function getRegistrationDetails_height() {
return $this->registrationDetails_height;
}
public function getRegistrationDetails_weight() {
return $this->registrationDetails_weight;
}
public function getRegistrationDetails_company() {
return $this->registrationDetails_company;
}
public function getRegistrationDetails_initialDiagnosis() {
return $this->registrationDetails_initialDiagnosis;
}
public function getRegistrationDetails_finalDiagnosis() {
return $this->registrationDetails_finalDiagnosis;
}
public function getRegistrationDetails_dateRegistered() {
return $this->registrationDetails_dateRegistered;
}
public function getRegistrationDetails_timeRegistered() {
return $this->registrationDetails_timeRegistered;
}

public function getRegistrationDetails_dateUnregistered() {
return $this->registrationDetails_dateUnregistered;
}

public function getRegistrationDetails_timeUnregistered() {
return $this->registrationDetails_timeUnregistered;
}

public function getRegistrationDetails_branch() {
return $this->registrationDetails_branch;
}

public function getRegistrationDetails_type() {
return $this->registrationDetails_type;
}

public function getRegistrationDetails_room() {
return $this->registrationDetails_room;
}

public function getRegistrationDetails_PIN() {
return $this->registrationDetails_PIN;
}

public function getRegistrationDetails_registeredBy() {
return $this->registrationDetails_registeredBy;
}

public function getPatientRecord_completeName() {
return $this->patientRecord_completeName;
}

public function getPatientRecord_lastName() {
return $this->patientRecord_lastName;
}

public function getPatientRecord_firstName() {
return $this->patientRecord_firstName;
}

public function getPatientRecord_middleName() {
return $this->patientRecord_middleName;
}

public function getPatientRecord_Birthdate() {
return $this->patientRecord_Birthdate;
}
public function getPatientRecord_age() {
return $this->patientRecord_age;
}
public function getPatientRecord_gender() {
return $this->patientRecord_gender;
}
public function getPatientRecord_senior() {
return $this->patientRecord_senior;
}
public function getPatientRecord_address() {
return $this->patientRecord_address;
}
public function getPatientRecord_contactNo() {
return $this->patientRecord_contactNo;
}
public function getPatientRecord_phic() {
return $this->patientRecord_phic;
}
public function getPatientRecord_civilStatus() {
return $this->patientRecord_civilStatus;
}


public function getPatientProfile($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registeredBy,rd.PIN,rd.dateUnregistered,rd.timeUnregistered,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,upper(pr.middleName) as middleName,rd.patientNo,rd.registrationNo,rd.bloodPressure,rd.temperature,rd.height,rd.weight,rd.Company,rd.initialDiagnosis,rd.finalDiagnosis,rd.dateRegistered,rd.timeRegistered,upper(pr.completeName) as completeName,pr.Birthdate,pr.Age,pr.Gender,upper(pr.senior) as senior,pr.Address,pr.contactNo,upper(pr.PHIC) as PHIC,pr.civilStatus,rd.branch,rd.room,rd.type FROM registrationDetails rd,patientRecord pr where rd.patientNo = pr.patientNo and rd.registrationNo='$registrationNo' ");

while($row = mysqli_fetch_array($result))
  {
$this->registrationDetails_patientNo = $row['patientNo'];
$this->registrationDetails_registrationNo = $row['registrationNo'];
$this->registrationDetails_bloodPressure = $row['bloodPressure'];
$this->registrationDetails_temperature = $row['temperature'];
$this->registrationDetails_height = $row['height'];
$this->registrationDetails_weight = $row['weight'];
$this->registrationDetails_company = $row['Company'];
$this->registrationDetails_initialDiagnosis = $row['initialDiagnosis'];
$this->registrationDetails_finalDiagnosis = $row['finalDiagnosis'];
$this->registrationDetails_dateRegistered = $row['dateRegistered'];
$this->registrationDetails_timeRegistered = $row['timeRegistered'];
$this->registrationDetails_dateUnregistered = $row['dateUnregistered'];
$this->registrationDetails_timeUnregistered = $row['timeUnregistered'];
$this->registrationDetails_branch = $row['branch'];
$this->registrationDetails_type = $row['type'];
$this->registrationDetails_room = $row['room'];
$this->registrationDetails_PIN = $row['PIN'];
$this->registrationDetails_registeredBy = $row['registeredBy'];

$this->patientRecord_completeName = $row['completeName'];
$this->patientRecord_lastName = $row['lastName'];
$this->patientRecord_firstName = $row['firstName'];
$this->patientRecord_middleName = $row['middleName'];
$this->patientRecord_Birthdate = $row['Birthdate'];
$this->patientRecord_age = $row['Age'];
$this->patientRecord_gender = $row['Gender'];
$this->patientRecord_senior = $row['senior'];
$this->patientRecord_address = $row['Address'];
$this->patientRecord_contactNo = $row['contactNo'];
$this->patientRecord_phic = $row['PHIC'];
$this->patientRecord_civilStatus = $row['civilStatus'];

  }


}



public function getAvailableCharges($charges,$registrationNo,$batchNo,$serverTime,$username,$room) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow;color:black;}

a { text-decoration:none; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$room = preg_split ("/\_/", $room); 

if($room[1] == "ER" || $room[1] == "OR/DR") {
$room[1] = $this->getReportInformation("anotherPrice");
}

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Category,chargesCode,upper(Description) as Description,(".$room[1].") as sellingPrice FROM availableCharges where Description like '$charges%%%%%' ");
$this->getPatientProfile($registrationNo);
echo "&nbsp;  <table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white><b>Description</b></font>&nbsp;</th>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white><b>Price</font></b>&nbsp;</th>";
if($this->getPatientRecord_senior() == "YES") {
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white><b>Senior</font></b>&nbsp;</th>";
}else {
echo "";
}
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white><b>Paid Via</font></b>&nbsp;</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result))
  {
echo "<tr>";

echo "<td>&nbsp;".$row['Description']."&nbsp;</td>";
echo "<td>&nbsp;<a href='#'>".number_format($row['sellingPrice'],2)."</a>&nbsp;</td>";
if($this->getPatientRecord_senior() == "YES") {
$senior = $row['sellingPrice'] - $row['sellingPrice'] * $this->percentage("senior");
echo "<td>&nbsp;<a href='#'>".$senior."</a>&nbsp;</td>";
}else {
echo "";
}
echo "</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableCharges/addCharges.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[chargesCode]&description=$row[Description]&sellingPrice=$row[sellingPrice]&discount=0&timeCharge=$serverTime&chargeBy=$username&service=Examination&title=$row[Category]&paidVia=Cash&cashPaid=0.00&batchNo=$batchNo&username=$username&quantity=1&inventoryFrom=none&room=".$room[0]."_".$room[1]."'><font color=blue>Cash</font></a>&nbsp;";

if($this->getRegistrationDetails_company() != "") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableCharges/addCharges.php?status=APPROVED&registrationNo=$registrationNo&chargesCode=$row[chargesCode]&description=$row[Description]&sellingPrice=$row[sellingPrice]&discount=0&timeCharge=$serverTime&chargeBy=$username&service=Examination&title=$row[Category]&paidVia=Company&cashPaid=0.00&batchNo=$batchNo&username=$username&quantity=1&inventoryFrom=none&room=".$room[0]."_".$room[1]."'><font color=red>Company</font></a>&nbsp;";
}else {
echo "";
}

$discount =$row['sellingPrice'] * $this->percentage("senior");
if($this->getPatientRecord_senior() == "YES") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableCharges/addCharges.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[chargesCode]&description=$row[Description]&sellingPrice=$row[sellingPrice]&discount=$discount&timeCharge=$serverTime&chargeBy=$username&service=Examination&title=$row[Category]&paidVia=Cash&cashPaid=0.00&batchNo=$batchNo&username=$username&quantity=1&inventoryFrom=none&room=".$room[0]."_".$room[1]."'><font color=darkgreen>Senior Disc</font></a>&nbsp;";
}else {
echo "";
}


echo "</td>";
echo "</tr>";



  
}

}





public function getAvailableDoctor($name,$registrationNo,$batchNo,$serverTime,$username) {



echo "
<style type='text/css'>
tr:hover { background-color:yellow;color:black;}

a { text-decoration:none; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT doctorCode,Name FROM Doctors where Name like '$name%%%%%' group by Name ");

echo "&nbsp;  <table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white><b>Doctor</b></font>&nbsp;</th>";
echo "</tr>";

while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['Name']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/selectService.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[doctorCode]&description=$row[Name]&sellingPrice=&timeCharge=$serverTime&chargeBy=$username&title=PROFESSIONAL FEE&paidVia=Cash&cashPaid=0.00&batchNo=$batchNo&username=$username&quantity=1&inventoryFrom=none&discount=0&room='><font color=blue>Cash</font></a>&nbsp;";

$this->getPatientProfile($registrationNo);
if($this->getRegistrationDetails_company() != "") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/selectService.php?status=APPROVED&registrationNo=$registrationNo&chargesCode=$row[doctorCode]&description=$row[Name]&sellingPrice=&timeCharge=$serverTime&chargeBy=$username&title=PROFESSIONAL FEE&paidVia=Company&cashPaid=0.00&batchNo=$batchNo&username=$username&quantity=1&inventoryFrom=none&discount=0&room='><font color=red>Company</font></a>&nbsp;";
}else {
echo "";
}


if($this->getPatientRecord_senior() == "YES") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/selectService.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[doctorCode]&description=$row[Name]&sellingPrice=&timeCharge=$serverTime&chargeBy=$username&title=PROFESSIONAL FEE&paidVia=Cash&cashPaid=0.00&batchNo=$batchNo&username=$username&quantity=1&inventoryFrom=none&discount=Senior&room='><font color=darkgreen>Senior Disc</font></a>&nbsp;";
}else {
echo "";
}

echo "<td></td>";  
}

}



public function deletePatientCharges($registrationNo,$itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM patientCharges WHERE registrationNo='$registrationNo' and itemNo='$itemNo'");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function deleteNow($table,$identifier,$data) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM $table WHERE $identifier='$data' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$discount,$total,$cashUnpaid,$phic,$company,$timeCharge,$dateCharge,$chargeBy,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$branch,$room) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientCharges (status,registrationNo,chargesCode,description,sellingPrice,discount,total,cashUnpaid,phic,company,timeCharge,dateCharge,chargeBy,
service,title,paidVia,cashPaid,batchNo,quantity,inventoryFrom,branch)
VALUES
('$status','$registrationNo','$chargesCode','$description','$sellingPrice','$discount','$total','$cashUnpaid','$phic','$company',
'$timeCharge','$dateCharge','$chargeBy','$service','$title','$paidVia','$cashPaid','$batchNo','$quantity','$inventoryFrom','$branch')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }


if($title == "LABORATORY" || $title == "RADIOLOGY") { 
echo "
<script type='text/javascript'>
window.location='http://".$this->getMyUrl()."/COCONUT/availableCharges/searchCharges.php?registrationNo=$registrationNo&username=$chargeBy&room=$room&batchNo=$batchNo';
</script>";
}else if($title == "MEDICINE") {
echo "
<script type='text/javascript'>
window.location='http://".$this->getMyUrl()."/COCONUT/availableMedicine/searchMedicine.php?registrationNo=$registrationNo&username=$chargeBy&inventoryFrom=$inventoryFrom&room=$room&batchNo=$batchNo';
</script>";
}else if($title == "SUPPLIES") {
echo "
<script type='text/javascript'>
window.location='http://".$this->getMyUrl()."/COCONUT/availableSupplies/searchSupplies.php?registrationNo=$registrationNo&username=$chargeBy&inventoryFrom=$inventoryFrom&room=$room&batchNo=$batchNo';
</script>";
}
else if($title == "PROFESSIONAL FEE") {
echo "
<script type='text/javascript'>
window.location='http://".$this->getMyUrl()."/COCONUT/Doctor/searchDoctor.php?registrationNo=$registrationNo&username=$chargeBy&room=$room&batchNo=$batchNo';
</script>";
}else {
echo "";
}
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public $patientChargez_cashUnpaid;
public $patientChargez_company;
public $patientChargez_phic;
public $patientChargez_disc;
public $patientChargez_total;
public $patientChargez_paid;


public function getPatientCharges($registrationNo,$username,$show,$desc) {


echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:12px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' order by description asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and description like '$desc%%%%%%' order by description asc ");
}


while($row = mysqli_fetch_array($result))
  {
$this->getMyResults($this->getResult_labNo($row['itemNo']),$username);
$price = preg_split ("/\//", $row['sellingPrice']); 
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
echo "<tr>";


$this->patientChargez_cashUnpaid+=$row['cashUnpaid'];
$this->patientChargez_company+=$row['company'];
$this->patientChargez_phic+=$row['phic'];
$this->patientChargez_disc+=$row['discount'];
$this->patientChargez_total+=$row['total'];
$this->patientChargez_paid+=$row['cashPaid'];


echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$row[description]&quantity=$row[quantity]&username=$username&show=$show&desc=$desc'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></td>";

if($deptStatus[0] == "dispensedBy") {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']." &nbsp;(<font size=1 color=red>Dispensed</font>)</a></font>&nbsp;</td>";
}else if($this->checkIfLabResultExist($row['itemNo']) > 0 && $row['title'] == "LABORATORY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/laboratoryResult.php?labNo=".$this->getLabNo()."&username=$username&registrationNo=$registrationNo&pathologist=".$this->getPathologist()."&medTech=".$this->getMedTech()."&dateReceived=".$this->getDateReceived()."&dateReleased=".$this->getDateReleased()."&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfRadResultExist($row['itemNo']) > 0 && $row['title'] == "RADIOLOGY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/resultReport.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfSoapExist($row['itemNo']) > 0 && $row['title'] == "PROFESSIONAL FEE" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]'>(<font color=red size=1>S.O.A.P</font>)</font></a>&nbsp;</td>";
}else  {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a></font>&nbsp;</td>";
}


if($row['title']=="PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['discount']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";

if($row['inventoryFrom'] != "none") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font><br><font class='data'>".$row['inventoryFrom']."</font>&nbsp;</td>";
}else if($row['inventoryFrom'] == "") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}else if($row['title'] == "LABORATORY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/addResults.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "RADIOLOGY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/addRadioResult.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soap.php?registrationNo=$registrationNo&itemNo=$row[itemNo]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}

if($row['status']=="PAID" ) {
echo "<td>&nbsp;<font class='data' color=blue>".$row['status']."</font>&nbsp;</td>";
}
else if($row['status']=="BALANCE" || $row['status']=="APPROVED") {
echo "<td>&nbsp;<font class='data' color=red>".$row['status']."</font>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
}
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";
if($this->checkBalanceItem($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'>".number_format(($row['cashPaid'] + $this->getBalancePaid($row['itemNo'])),2)."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".number_format($row['cashPaid'],2)."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['title']."</font>&nbsp;</td>";
echo "</tr>";
  }


//row after looping d2 ippkta ung total ng "balance","Company","hmo"
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_disc,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_total,2)."</center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_cashUnpaid,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_company,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_phic,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_paid,2)."</center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

echo "</tr>";


}


public $dependsTitle_cashUnpaid;
public $dependsTitle_company;
public $dependsTitle_phic;
public $dependsTitle_paid;
public $dependsTitle_disc;
public $dependsTitle_total;

public function getPatientChargesDependsOnTitle($registrationNo,$title,$username,$show,$desc) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:12px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and title='$title' order by description asc ");

while($row = mysqli_fetch_array($result))
  {
$this->getMyResults($this->getResult_labNo($row['itemNo']),$username);
$price = preg_split ("/\//", $row['sellingPrice']); 
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 

echo "<tr>";

$this->dependsTitle_cashUnpaid += $row['cashUnpaid'];
$this->dependsTitle_company += $row['company'];
$this->dependsTitle_phic += $row['phic'];
$this->dependsTitle_total += $row['total'];
$this->dependsTitle_disc += $row['discount'];
$this->dependsTitle_paid += $row['cashPaid'];

echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$row[description]&quantity=$row[quantity]&username=$username&show=$show&desc=$desc'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";

if($deptStatus[0] == "dispensedBy") {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']." &nbsp;<font size=1 color=red>(Dispensed)</font></a></font>&nbsp;</td>";
}else if($this->checkIfLabResultExist($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/laboratoryResult.php?labNo=".$this->getLabNo()."&username=$username&registrationNo=$registrationNo&pathologist=".$this->getPathologist()."&medTech=".$this->getMedTech()."&dateReceived=".$this->getDateReceived()."&dateReleased=".$this->getDateReleased()."&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfRadResultExist($row['itemNo']) > 0 && $row['title'] == "RADIOLOGY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/resultReport.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfSoapExist($row['itemNo']) > 0 && $row['title'] == "PROFESSIONAL FEE" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]'>(<font color=red size=1>S.O.A.P</font>)</font></a>&nbsp;</td>";
}else  {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a></font>&nbsp;</td>";
}


if($row['title']=="PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['discount']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";

if($row['inventoryFrom'] != "none") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font><br><font class='data'>".$row['inventoryFrom']."</font>&nbsp;</td>";
}else if($row['inventoryFrom'] == "") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}else if($row['title'] == "LABORATORY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/addResults.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "RADIOLOGY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/addRadioResult.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soap.php?registrationNo=$registrationNo&itemNo=$row[itemNo]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}

if($row['status']=="PAID" ) {
echo "<td>&nbsp;<font class='data' color=blue>".$row['status']."</font>&nbsp;</td>";
}
else if($row['status']=="BALANCE" || $row['status']=="APPROVED") {
echo "<td>&nbsp;<font class='data' color=red>".$row['status']."</font>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
}
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";
if($this->checkBalanceItem($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'>".($row['cashPaid'] + $this->getBalancePaid($row['itemNo']))."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['cashPaid']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "</tr>";
  }


//row after looping d2 ippkta ung total ng "balance","Company","hmo"
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><center><font class='data' color=red>".number_format($this->dependsTitle_disc,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->dependsTitle_total,2)."</center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><center><font class='data' color=red>".number_format($this->dependsTitle_cashUnpaid,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->dependsTitle_company,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->dependsTitle_phic,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->dependsTitle_paid,2)."</center></td>";
echo "<td>&nbsp;</td>";

echo "</tr>";




}



public $chargesStatus; //identifier pra sa status ng charges
public $patientType;


public function getPatientChargesByTitle($registrationNo,$title,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$module) {

$selectedDate = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:13px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));


if($module == "PHARMACY" || $module=="CSR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.type FROM patientCharges pc,registrationDetails rd where rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and pc.inventoryFrom='$title' and pc.dateCharge='$selectedDate' and pc.paidVia ='Cash' and (pc.timeCharge between '$fromTimez' and '$toTimez') and pc.departmentStatus not like 'dispensedBy%%%%%' group by pc.itemNo order by pc.description asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* FROM patientCharges pc,registrationDetails rd where rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and pc.title='$title' and pc.dateCharge='$selectedDate' and pc.paidVia ='Cash' and (pc.timeCharge between '$fromTimez' and '$toTimez') and pc.departmentStatus not like 'remittedBy%%%%%' group by pc.itemNo order by pc.description asc ");
}


echo "<form method='get' action='updateDepartmentStatus.php'>";
echo "<input type=hidden name='username' value='$username'>";
while($row = mysqli_fetch_array($result))
  {
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
$this->getInventoryFrom($row['itemNo']);
$this->chargesStatus = $row['status'];
$this->patientType = $row['type'];
echo "<tr>";
if($row['status']=="Return") {
echo "<input type=hidden name='quantity' value='".$deptStatus[0]."'>";
}else {
echo "<input type=hidden name='quantity' value='".$row['quantity']."'>";
}
if($row['status'] == "PAID" || $row['type'] == "IPD") {
echo "<td><input type=checkbox name='departmentStatus[]' value='$row[itemNo]' checked></td>";
}else {
echo "<td><input type=hidden name='departmentStatus[]' value=''></td>";
}
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/Cashier/verifyDelete.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$row[description]&quantity=$row[quantity]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&desc=&show=&username=$username'>".$row['description']."</a></font>&nbsp;</td>";
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
if($row['status'] == "Return") {
echo "<td>&nbsp;<font class='data'>".$deptStatus[0]."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".number_format($row['discount'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}
echo "</tr>";
  }
if($this->getDepartmentInventory() =="PHARMACY" || $this->getDepartmentInventory() =="CSR") {
if($this->chargesStatus =="PAID" || $this->patientType == "IPD" || $this->patientType == "ER" || $this->patientType == "OR/DR") {
echo "<input type=submit value='Dispense' style='border:1px solid #000; background-color:#3b5998; color:white'>";
}else if($this->chargesStatus == "Return") {
echo "<input type=submit value='Return' style='border:1px solid #000; background-color:#3b5998; color:white'>";
}else {
echo "<font size=2 color=red>You can only Dispense a medicine/supplies when it is PAID</font>";
}

}else {
if($this->chargesStatus == "PAID" || $this->patientType == "IPD" || $this->patientType == "ER" || $this->patientType == "OR/DR") {
echo "<input type=submit value='Remit' style='border:1px solid #000; background-color:#3b5998; color:white'>";
}else {
echo "<font size=2 color=red>You can only Remit a charges when it is PAID</font>";
}
}
echo "</form>";



}

public function getSynapseTime() {
$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);
return date("H:i:s");
}

public function getPatientChargesUnpaid($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$registrationNo) {


$selectedDate = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);


echo "
<script src='http://".$this->getMyUrl()."/COCONUT/serverTime/serverTime.js'></script>
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:13px;
}

.shortField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 120px;
	padding:4px 4px 4px 5px;
}

.labelz {
color:#000;
font-size:14px;
}
</style>";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and status='UNPAID' and dateCharge='$selectedDate' and paidVia ='Cash' and (timeCharge between '$fromTimez' and '$toTimez') and departmentStatus not like 'remittedBy%%%%%' group by itemNo order by description asc ");

echo "<body onload='DisplayTime();'>";
echo "<form method='get' action='paymentManager.php'>";
echo "<div style='border:1px solid #000000; width:500px; height:60px; border-color:black black black black;'>";
echo "<br>&nbsp;&nbsp;";
echo "<font>Payment</font>";
echo "&nbsp;&nbsp;<input type=text name='totalPaid' class='shortField' value='".$this->getUnpaidPatientAmount($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$registrationNo)."'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='paymentType' value='Cash' checked><font size=2>Cash</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='paymentType' value='Credit Card'><font size=2>Credit Card</font> <br>";
echo "<br><input type=submit value='Paid' style='border:1px solid #000; background-color:#3b5998; color:white'>";
echo "<br></div><br><br>";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='serverTime' value='".date("H:i:s")."'>";
while($row = mysqli_fetch_array($result))
  {

$price = preg_split ("/\//", $row['sellingPrice']); 

echo "<tr>";
echo "<td><input type=checkbox name='cashierPaid[]' value='$row[itemNo]' checked></td>";
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$row[description]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]'>".$row['description']."</a></font>&nbsp;</td>";

if($row['title'] == "PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['discount'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data' color=red>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "<input type=hidden name='chargeStatus' value='".$row['status']."'>";
echo "</tr>";
}
echo "</table>";
echo "</form>";
echo "</body>";




}


public function getPatientCharges_balance($registrationNo,$username) {

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

echo "
<script src='http://".$this->getMyUrl()."/COCONUT/serverTime/serverTime.js'></script>
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:13px;
}

.shortField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 120px;
	padding:4px 4px 4px 5px;
}

.labelz {
color:#000;
font-size:14px;
}
</style>";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }


((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and status='BALANCE' and paidVia ='Cash' group by itemNo order by description asc ");

echo "<body onload='DisplayTime();'>";
echo "<form method='get' action='paymentManager.php'>";
echo "<div style='border:1px solid #000000; width:200px; height:60px; border-color:black black black black;'>";
echo "<br>&nbsp;&nbsp;<font class='labelz'>Cash:</font>&nbsp;&nbsp;<input type=text name='totalPaid' class='shortField' value='".$this->getTotalBalance($registrationNo)."'><br>";
echo "<br><input type=submit value='Payment' style='border:1px solid #000; background-color:#3b5998; color:white'>";
echo "<br></div><br><br>";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=hidden name='serverTime' value='".date("H:i:s")."'>";
echo "<input type=hidden name='chargeStatus' value='BALANCE'>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td><input type=checkbox name='cashierPaid[]' value='$row[itemNo]' checked></td>";
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$row[description]&quantity=$row[quantity]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]'>".$row['description']."</a></font>&nbsp;</td>";
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['discount'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timePaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['datePaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['paidBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['cashPaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "</tr>";
  }

echo "</form>";
echo "</body>";


}







public $patientRecordz_lastName;
public $patientRecordz_firstName;
public $patientRecordz_middleName;
public $patientRecordz_contactNo;
public $patientRecordz_birthDate;
public $patientRecordz_Gender;
public $patientRecordz_Senior;
public $patientRecordz_PHIC;
public $patientRecordz_civilStatus;
public $patientRecordz_address;
public $patientRecordz_phicType;

public function getLastName_patientRecord() {
return $this->patientRecordz_lastName;
}
public function getFirstName_patientRecord() {
return $this->patientRecordz_firstName;
}
public function getMiddleName_patientRecord() {
return $this->patientRecordz_middleName;
}
public function getContactNo_patientRecord() {
return $this->patientRecordz_contactNo;
}
public function getBirthDate_patientRecord() {
return $this->patientRecordz_birthDate;
}
public function getGender_patientRecord() {
return $this->patientRecordz_Gender;
}
public function getSenior_patientRecord() {
return $this->patientRecordz_Senior;
}
public function getPHIC_patientRecord() {
return $this->patientRecordz_PHIC;
}
public function getCivilStatus_patientRecord() {
return $this->patientRecordz_civilStatus;
}
public function getAddress_patientRecord() {
return $this->patientRecordz_address;
}
public function getPHICtype_patientRecord() {
return $this->patientRecordz_phicType;
}


public function setPatientRecord($patientNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientRecord where patientNo='$patientNo' ");

while($row = mysqli_fetch_array($result))
  {
$this->patientRecordz_lastName = $row['lastName'];
$this->patientRecordz_firstName = $row['firstName'];
$this->patientRecordz_middleName = $row['middleName'];
$this->patientRecordz_contactNo = $row['contactNo'];
$this->patientRecordz_birthDate = $row['Birthdate'];
$this->patientRecordz_Gender = $row['Gender'];
$this->patientRecordz_Senior = $row['Senior'];
$this->patientRecordz_PHIC = $row['PHIC'];
$this->patientRecordz_civilStatus = $row['civilStatus'];
$this->patientRecordz_address = $row['Address'];
$this->patientRecordz_phicType = $row['phicType'];
  }

}




public function verifyRecord($name) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover{ background-color:yellow; color:black; }
</style>
";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pr.patientNo,(pr.completeName) as completeName,pr.Birthdate,pr.Gender FROM patientRecord pr where pr.completeName like '$name%%%%%%%' group by pr.patientNo ");

echo "<br>&nbsp;  <table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white>Patient's Name</font>&nbsp;</th>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white>BirthDate</font>&nbsp;</th>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white>Gender</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Registration/newRecord_again.php?patientNo=$row[patientNo]'>".$row['completeName']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['Birthdate']."&nbsp;</td>";
echo "<td>&nbsp;".$row['Gender']."&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}




public function showInventoryLocation() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT inventoryLocation FROM inventoryLocation order by inventoryLocation asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['inventoryLocation']."'>".$row['inventoryLocation']."</option>";
  }

}




//UNIVERSAL OPTION PRA SA COMOBOX
public function showOption($table,$cols) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ($cols) cols FROM $table order by cols asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['cols']."'>".$row['cols']."</option>";
  }

}

public function showOption_group($table,$cols) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ($cols) cols FROM $table group by cols order by cols asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['cols']."'>".$row['cols']."</option>";
  }

}

public function showOptionRoom($table,$cols,$cols1) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ($cols) cols,($cols1) as cols1 FROM $table order by cols asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['cols']."'>".$row['cols']." - ".$row['cols1']."</option>";
  }

}


//UNIVERSAL OPTION PRA SA COMOBOX NA MEI KXAMANG WHERE CLAUSE
public function showOption_where($table,$cols,$identifier,$identifierData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ($cols) cols FROM $table WHERE $identifier = '$identifierData' order by cols asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['cols']."'>".$row['cols']."</option>";
  }

}

public function showCivilStatus() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT civilStatus FROM civilStatus order by civilStatus asc ");

while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row['civilStatus']."'>".$row['civilStatus']."</option>";
  }

}



public function addNewMedicine($description,$generic,$unitcost,$quantity,$expiration,$addedBy,$dateAdded,$timeAdded,$inventoryLocation,$inventoryType,$branch,$transition,$remarks,$preparation) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO inventory (description,genericName,unitcost,quantity,expiration,addedBy,dateAdded,timeAdded,inventoryLocation,inventoryType,branch,transition,remarks,preparation)
VALUES
('$description','$generic','$unitcost','$quantity','$expiration','$addedBy','$dateAdded','$timeAdded','$inventoryLocation','$inventoryType','$branch','$transition','$remarks','$preparation')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of $inventoryType');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/inventory/addInventory.php?username=$addedBy '";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}




//pra sa receiving of request
public function addNewMedicine1($description,$generic,$unitcost,$quantity,$expiration,$addedBy,$dateAdded,$timeAdded,$inventoryLocation,$inventoryType,$branch,$transition,$remarks) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO inventory (description,genericName,unitcost,quantity,expiration,addedBy,dateAdded,timeAdded,inventoryLocation,inventoryType,branch,transition,remarks)
VALUES
('$description','$generic','$unitcost','$quantity','$expiration','$addedBy','$dateAdded','$timeAdded','$inventoryLocation','$inventoryType','$branch','$transition','$remarks')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }


echo "
<script type='text/javascript'>
alert('$description Received');
window.parent.location.reload();
window.location='http://".$this->getMyUrl()."/Department/departmentPage.php'
</script>

";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



//ITO UNG KKUHA NG PERCENTAGE PRA SA SENIOR DISC,MEDICINE
public function percentage($percentageType) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT percentageAmount FROM percentage WHERE percentageType = '$percentageType' ");

while($row = mysqli_fetch_array($result))
  {
return $row['percentageAmount'];
  }

}



public function getAvailableMedicine($searchBy,$searchDesc,$registrationNo,$batchNo,$serverTime,$username,$searchFrom,$branch,$room) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}
</style>
";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT preparation,inventoryCode,description,genericName,((unitcost * ".$this->percentage("medicine").") + unitcost) as sellingPrice,quantity FROM inventory WHERE $searchBy like '$searchDesc%%%%%%%' and inventoryType = 'medicine' and inventoryLocation = '$searchFrom' and branch = '$branch' order by $searchBy asc ");

echo "<table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Description</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Generic</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Prep</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Price</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>QTY</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Paid Via</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
$senior = $row['sellingPrice'] * $this->percentage("senior");
echo "<td>&nbsp;<a href='#'>".$row['description']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['genericName']."&nbsp;</td>";
echo "<td>&nbsp;".$row['preparation']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['sellingPrice'],2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['quantity']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/quantity.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[inventoryCode]&description=$row[description]&sellingPrice=$row[sellingPrice]&timeCharge=$serverTime&chargeBy=$username&service=Medication&title=MEDICINE&paidVia=Cash&cashPaid=0&batchNo=$batchNo&username=$username&inventoryFrom=$searchFrom&discount=0&room=$room'><font color=blue>Cash</font></a>&nbsp;";

$this->getPatientProfile($registrationNo);
if($this->getRegistrationDetails_company() != "") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/quantity.php?status=APPROVED&registrationNo=$registrationNo&chargesCode=$row[inventoryCode]&description=$row[description]&sellingPrice=$row[sellingPrice]&timeCharge=$serverTime&chargeBy=$username&service=Medication&title=MEDICINE&paidVia=Company&cashPaid=0&batchNo=$batchNo&username=$username&inventoryFrom=$searchFrom&discount=0&room=$room'><font color=red>Company</font></a>&nbsp;";
}else {
echo "";
}


if($this->getPatientRecord_senior() == "YES") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/quantity.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[inventoryCode]&description=$row[description]&sellingPrice=$row[sellingPrice]&timeCharge=$serverTime&chargeBy=$username&service=Medication&title=MEDICINE&paidVia=Cash&cashPaid=0&batchNo=$batchNo&username=$username&inventoryFrom=$searchFrom&discount=$senior&room=$room'><font color=darkgreen>Senior Disc</font></a>&nbsp;";
}else {
echo "";
}

echo "</td></tr>";

  }
echo "</table>";

}



public function getAvailableSupplies($searchBy,$searchDesc,$registrationNo,$batchNo,$serverTime,$username,$searchFrom,$branch) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}
</style>
";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT inventoryCode,description,unitcost,quantity FROM inventory WHERE $searchBy like '$searchDesc%%%%%%%' and inventoryType = 'supplies' and inventoryLocation = '$searchFrom' and branch = '$branch' order by $searchBy asc ");

echo "<table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Description</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Price</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>QTY</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Paid Via</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
$senior = $row['unitcost'] * $this->percentage("senior");
echo "<td>&nbsp;<a href='#'>".$row['description']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['unitcost']."&nbsp;</td>";
echo "<td>&nbsp;".$row['quantity']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/quantity.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[inventoryCode]&description=$row[description]&sellingPrice=$row[unitcost]&timeCharge=$serverTime&chargeBy=$username&service=Others&title=SUPPLIES&paidVia=Cash&cashPaid=0&batchNo=$batchNo&username=$username&inventoryFrom=$searchFrom&discount=0&room='><font color=blue>Cash</font></a>&nbsp;";

$this->getPatientProfile($registrationNo);

if($this->getRegistrationDetails_company() != "") { // KUNG MAY COMPANY LLBAS ITO
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/quantity.php?status=APPROVED&registrationNo=$registrationNo&chargesCode=$row[inventoryCode]&description=$row[description]&sellingPrice=$row[unitcost]&timeCharge=$serverTime&chargeBy=$username&service=Others&title=SUPPLIES&paidVia=Company&cashPaid=0&batchNo=$batchNo&username=$username&inventoryFrom=$searchFrom&discount=0&room='><font color=red>Company</font></a>&nbsp;";

}else { // KUNG WLANG COMPANY HNDI NLA MKKTA ITO
echo "";
}

if($this->getPatientRecord_senior() == "YES") {
echo "|&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/quantity.php?status=UNPAID&registrationNo=$registrationNo&chargesCode=$row[inventoryCode]&description=$row[description]&sellingPrice=$row[unitcost]&timeCharge=$serverTime&chargeBy=$username&service=Medication&title=SUPPLIES&paidVia=Cash&cashPaid=0&batchNo=$batchNo&username=$username&inventoryFrom=$searchFrom&discount=$senior&room='><font color=darkgreen>Senior Disc</font></a>&nbsp;";
}else {
echo "";
}


echo "</td></tr>";
  }
echo "</table>";

}





public $patientCharges_itemNo;
public $patientCharges_status;
public $patientCharges_registrationNo;
public $patientCharges_chargesCode;
public $patientCharges_description;
public $patientCharges_sellingPrice;
public $patientCharges_quantity;
public $patientCharges_discount;
public $patientCharges_total;
public $patientCharges_cashUnpaid;
public $patientCharges_phic;
public $patientCharges_company;
public $patientCharges_timeCharge;
public $patientCharges_dateCharge;
public $patientCharges_chargeBy;
public $patientCharges_service;
public $patientCharges_title;
public $patientCharges_paidVia;
public $patientCharges_cashPaid;
public $patientCharges_batchNo;
public $patientCharges_inventoryFrom;
public $patientCharges_cashCovered;
public $patientCharges_companyCovered;
public $patientCharges_phicCovered;
public $patientCharges_branch;

//IF PAID
public $patientCharges_datePaid;
public $patientCharges_timePaid;
public $patientCharges_paidBy;

public function patientCharges_ItemNo() {
return $this->patientCharges_itemNo;
}
public function patientCharges_status() {
return $this->patientCharges_status;
}
public function patientCharges_registrationNo() {
return $this->patientCharges_registrationNo;
}
public function patientCharges_chargesCode() {
return $this->patientCharges_chargesCode;
}
public function patientCharges_Description() {
return $this->patientCharges_description;
}
public function patientCharges_sellingPrice() {
return $this->patientCharges_sellingPrice;
}
public function patientCharges_quantity() {
return $this->patientCharges_quantity;
}
public function patientCharges_discount() {
return $this->patientCharges_discount;
}
public function patientCharges_total() {
return $this->patientCharges_total;
}
public function patientCharges_cashUnpaid() {
return $this->patientCharges_cashUnpaid;
}
public function patientCharges_phic() {
return $this->patientCharges_phic;
}
public function patientCharges_company() {
return $this->patientCharges_company;
}
public function patientCharges_timeCharge() {
return $this->patientCharges_timeCharge;
}
public function patientCharges_dateCharge() {
return $this->patientCharges_dateCharge;
}
public function patientCharges_chargeBy() {
return $this->patientCharges_chargeBy;
}
public function patientCharges_service() {
return $this->patientCharges_service;
}
public function patientCharges_title() {
return $this->patientCharges_title;
}
public function patientCharges_paidVia() {
return $this->patientCharges_paidVia;
}
public function patientCharges_cashPaid() {
return $this->patientCharges_cashPaid;
}
public function patientCharges_batchNo() {
return $this->patientCharges_batchNo;
}
public function patientCharges_inventoryFrom() {
return $this->patientCharges_inventoryFrom;
}

public function patientCharges_companyCovered() {
return $this->patientCharges_companyCovered;
}

public function patientCharges_phicCovered() {
return $this->patientCharges_phicCovered;
}

public function patientCharges_branch() {
return $this->patientCharges_branch;
}

public function patientCharges_datePaid() {
return $this->patientCharges_datePaid;
}

public function patientCharges_timePaid() {
return $this->patientCharges_timePaid;
}

public function patientCharges_paidBy() {
return $this->patientCharges_paidBy;
}



public function getPatientChargesToEdit($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges WHERE itemNo = '$itemNo' ");

while($row = mysqli_fetch_array($result))
  {
$this->patientCharges_itemNo = $row['itemNo'];
$this->patientCharges_status = $row['status'];
$this->patientCharges_registrationNo = $row['registrationNo'];
$this->patientCharges_chargesCode = $row['chargesCode'];
$this->patientCharges_description = $row['description'];
$this->patientCharges_sellingPrice = $row['sellingPrice'];
$this->patientCharges_quantity = $row['quantity'];
$this->patientCharges_discount = $row['discount'];
$this->patientCharges_total = $row['total'];
$this->patientCharges_cashUnpaid = $row['cashUnpaid'];
$this->patientCharges_phic = $row['phic'];
$this->patientCharges_company = $row['company'];
$this->patientCharges_timeCharge = $row['timeCharge'];
$this->patientCharges_dateCharge = $row['dateCharge'];
$this->patientCharges_chargeBy = $row['chargeBy'];
$this->patientCharges_service = $row['service'];
$this->patientCharges_title = $row['title'];
$this->patientCharges_paidVia = $row['paidVia'];
$this->patientCharges_cashPaid = $row['cashPaid'];
$this->patientCharges_batchNo = $row['batchNo'];
$this->patientCharges_inventoryFrom = $row['inventoryFrom'];
$this->patientCharges_companyCovered = $row['company'];
$this->patientCharges_phicCovered = $row['phic'];
$this->patientCharges_branch = $row['branch'];
$this->patientCharges_datePaid = $row['datePaid'];
$this->patientCharges_timePaid = $row['timePaid'];
$this->patientCharges_paidBy = $row['paidBy'];

  }


}



public function editCharges($itemNo,$columns,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientCharges SET $columns = '$newData'
WHERE itemNo = '$itemNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editNow($table,$identifier,$identifierData,$columns,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE $table SET $columns = '$newData'
WHERE $identifier = '$identifierData' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}

public function addUser($username,$password,$module,$branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO registeredUser (username,password,module,branch)
VALUES
('$username','$password','$module','$branch')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addUser.php?username=$addedBy '";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editCompleteName($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET completeName = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editLastName($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET lastName = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editFirstName($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET firstName = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editMiddleName($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET middleName = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editAge($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET age = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editCivilStatus($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET civilStatus = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editBirthDate($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET Birthdate = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editContactNo($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET contactNo = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editSenior($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET Senior = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editPHIC($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET PHIC = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editCompany($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET Company = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editTimeRegistered($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET timeRegistered = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editDateRegistered($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET dateRegistered = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editAddress($patientNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientRecord SET Address = '$newData'
WHERE patientNo = '$patientNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function editHeight($registrationNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET height = '$newData'
WHERE registrationNo = '$registrationNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editWeight($registrationNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET weight = '$newData'
WHERE registrationNo = '$registrationNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editBloodPressure($registrationNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET bloodPressure = '$newData'
WHERE registrationNo = '$registrationNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editTemperature($registrationNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET temperature = '$newData'
WHERE registrationNo = '$registrationNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function editInitialDiagnosis($registrationNo,$newData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE registrationDetails SET initialDiagnosis = '$newData'
WHERE registrationNo = '$registrationNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}

public function showPatient($completeName) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,rd.dateRegistered,upper(pr.completeName) as completeName FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and pr.completeName like '$completeName%%%%%' group by completeName ");

while($row = mysqli_fetch_array($result))
  {
echo $row['completeName']."\n";
  }

}


public function showPatientHistory($completeName,$username) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow;color:black;}

a { text-decoration:none; color:black; }
.myData { font-size:17px; }
.myHeader { font-size:18px; }
</style>";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pr.completeName,rd.registrationNo,rd.dateRegistered,rd.branch FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and pr.completeName = '$completeName' order by registrationNo desc  ");

echo "<br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Reg. No");
$this->coconutTableHeader("Name");
$this->coconutTableHeader("Registration Date");
$this->coconutTableHeader("Branch");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td class='myData'><center>".$row['registrationNo']."</center></td>";
echo "<td class='myData'>&nbsp;<a href='http://".$this->getMyUrl()."/Department/redirect.php?username=$username&registrationNo=$row[registrationNo]'>".$row['completeName']."</a>&nbsp;</td>";
echo "<td class='myData'><center>".$row['dateRegistered']."</center></td>";
echo "<td class='myData'><center>".$row['branch']."</center></td>";
echo "</tr>";
  }
$this->coconutTableStop();

}



public function addNewDoctorService($serviceName,$specialization,$cashAmount,$companyRate,$doctorShare,$discount,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO DoctorService (serviceName,specialization,cashAmount,companyRate,doctorShare,discount)
VALUES
('$serviceName','$specialization','$cashAmount','$companyRate','$doctorShare','$discount')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$serviceName was Successfully Added to the List of Doctor Service with a Specialization of $specialization');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/Doctor/addNewDoctorService.php?username=$username '";
echo "</script>";


((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function addNewDoctor($doctorName,$specialization1,$specialization2,$specialization3,$specialization4,$specialization5,$accreditationNo,$username,$usernameDoctor,$password,$module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO Doctors (Name,Specialization1,Specialization2,Specialization3,Specialization4,Specialization5,PhilHealth_AccreditationNo,username,password,module)
VALUES
('$doctorName','$specialization1','$specialization2','$specialization3','$specialization4','$specialization5','$accreditationNo','$usernameDoctor','$password','$module')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$doctorName was Successfully Added to the List of Doctor');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/Doctor/addNewDoctor.php?username=$username '";
echo "</script>";


((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function addNewRoom($description,$type,$rate,$branch,$floor) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO room (Description,type,rate,branch,floor,status)
VALUES
('$description','$type','$rate','$branch','$floor','Vacant')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Room with a rate of $rate');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/Doctor/addNewDoctorService.php?username=$username '";
echo "</script>";


((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function addNewCredit($registrationNo,$limitTo,$limitVia,$amountLimit,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientCreditLimit (registrationNo,limitTo,limitVia,amountLimit,username)
VALUES
('$registrationNo','$limitTo','$limitVia','$amountLimit','$username')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/creditLimit/viewCreditLimit.php?username=$username&registrationNo=$registrationNo '";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function addPayment($registrationNo,$amountPaid,$datePaid,$timePaid,$paidBy,$paymentFor) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientPayment (registrationNo,amountPaid,datePaid,timePaid,paidBy,paymentFor)
VALUES
('$registrationNo','$amountPaid','$datePaid','$timePaid','$paidBy','$paymentFor')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public $cashAmount;
public $companyRate;
public $doctorShare;
public $serviceDiscount;

public function cashAmount() {
return $this->cashAmount;
}
public function doctorShare() {
return $this->doctorShare;
}
public function serviceDiscount() {
return $this->serviceDiscount;
}
public function companyRate() {
return $this->companyRate;
}

public function doctorServiceRate($specialization,$service) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM DoctorService WHERE serviceName = '$service' and specialization='$specialization' ");

while($row = mysqli_fetch_array($result))
  {
$this->cashAmount = $row['cashAmount'];
$this->companyRate = $row['companyRate'];
$this->doctorShare = $row['doctorShare'];
$this->serviceDiscount = $row['discount'];

  }

}

public $specialization1;
public $specialization2;
public $specialization3;
public $specialization4;
public $specialization5;

public function specialization1() {
return $this->specialization1;
}
public function specialization2() {
return $this->specialization2;
}
public function specialization3() {
return $this->specialization3;
}
public function specialization4() {
return $this->specialization4;
}
public function specialization5() {
return $this->specialization5;
}

public function getDoctorSpecialization($doctorCode) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Specialization1,Specialization2,Specialization3,Specialization4,Specialization5 FROM Doctors WHERE doctorCode = '$doctorCode' ");

while($row = mysqli_fetch_array($result))
  {
$this->specialization1 = $row['Specialization1'];
$this->specialization2 = $row['Specialization2'];
$this->specialization3 = $row['Specialization3'];
$this->specialization4 = $row['Specialization4'];
$this->specialization5 = $row['Specialization5'];
  }

}



//ITO UNG KKUHA NG RATE NG COMPANY KPAG NAG CHARGE NG DOCTOR AT ANG PATIENT AY MAY COMPANY
public function getCompanyRate($companyName,$rate) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ($rate) as rate FROM Company WHERE companyName = '$companyName' ");

while($row = mysqli_fetch_array($result))
  {
return $row['rate'];
  }

}

public function getReportInformation($reportName) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT information FROM reportHeading WHERE reportName = '$reportName' ");

while($row = mysqli_fetch_array($result))
  {
return $row['information'];
  }

}


public function getDiagnosticTimer() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT time FROM diagnosticTimer ");

while($row = mysqli_fetch_array($result))
  {
return $row['time'];
  }

}



//ITO UNG KKUHA NG PATIENT SA MGA DEPARTMENT KPG NDI P NREMIT
public function getTransactionPatient($m,$d,$y,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$module,$username,$branch) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

$dateSelected = $m."_".$d."_".$y;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module=="PHARMACY" || $module =="CSR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.type,rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,sum(pc.total) as grandTotal FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') and pc.inventoryFrom='$module' and pc.departmentStatus not like 'dispensedBy%%%%' and rd.branch='$branch' group by rd.registrationNo order by pr.lastName asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.type,rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,sum(pc.total) as grandTotal FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') and pc.title='$module' and pc.departmentStatus not like 'remittedBy%%%%' and rd.branch='$branch' group by rd.registrationNo order by pr.lastName asc ");
}


while($row = mysqli_fetch_array($result))
  {

echo "<tr>";

if($row['type'] == "IPD") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=$module&month=$m&day=$d&year=$y&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&module=$module' target='patientCharges'><font size='2' color=blue>".$row['lastName']." ".$row['firstName']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=$module&month=$m&day=$d&year=$y&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&module=$module' target='patientCharges'><font size='2'>".$row['lastName']." ".$row['firstName']."</font></a>&nbsp;</td>";
}


if($row['grandTotal'] > 0) {
echo "<td>&nbsp;".number_format($row['grandTotal'],2)."&nbsp;</td>";
}else {
echo "";
}
echo "</tr>";

}

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);
}



public function getReturnMedicine($m,$d,$y,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$module,$username,$branch) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

$dateSelected = $m."_".$d."_".$y;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,sum(pc.total) as grandTotal FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') and pc.title='$module' and pc.departmentStatus not like 'Return' and rd.branch='$branch' group by rd.registrationNo order by pr.lastName asc ");

while($row = mysqli_fetch_array($result))
  {

echo "<tr>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=$module&month=$m&day=$d&year=$y&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&module=$module' target='patientCharges'><font size='2'>".$row['lastName']." ".$row['firstName']."</font></a>&nbsp;</td>";
if($row['grandTotal'] > 0) {
echo "<td>&nbsp;".number_format($row['grandTotal'],2)."&nbsp;</td>";
}else {
echo "";
}
echo "</tr>";

}

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}




//ITO UNG MAG UUPDATE SA COLUMN NA "departmentStatus" SA TABLE NA "patientCharges"
public function remitNow($itemNo,$status) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientCharges SET departmentStatus = '$status'
WHERE itemNo = '$itemNo' ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}

//ITO UNG MAG MAG-UUPDATE NG TIMER SA MGA DIAGNOSTIC
public function updateDiagnosticTimer($timer) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE diagnosticTimer SET time = '$timer'
 ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public $sales_total;
public $sales_unpaid;
public $sales_paid;

public function getSalesTotal() {
return $this->sales_total;
}
public function getSalesUnpaid() {
return $this->sales_unpaid;
}
public function getSalesPaid() {
return $this->sales_paid;
}

//SALES REPORT NG BAWAT DEPARTMENT
public function getSalesReport($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$module) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.completeName) as completeName,pc.description,pc.sellingPrice,pc.quantity,pc.discount,pc.total,pc.cashUnpaid,pc.cashPaid,pc.chargeBy FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') and title='$module' group by pc.itemNo order by completeName asc ");

echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Name&nbsp;</th>";
echo "<th>&nbsp;Description&nbsp;</th>";
echo "<th>&nbsp;Price&nbsp;</th>";
echo "<th>&nbsp;QTY&nbsp;</th>";
echo "<th>&nbsp;Disc&nbsp;</th>";
echo "<th>&nbsp;Total&nbsp;</th>";
echo "<th>&nbsp;Unpaid&nbsp;</th>";
echo "<th>&nbsp;Paid&nbsp;</th>";
echo "<th>&nbsp;Charge By&nbsp;</th>";
echo "</tr>";
$this->sales_total=0;
$this->sales_unpaid=0;
$this->sales_paid=0;
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['completeName']."&nbsp;</td>";
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['sellingPrice'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['quantity'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['discount'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['total'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashUnpaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashPaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['chargeBy']."&nbsp;</td>";
$this->sales_total+=$row['total'];
$this->sales_paid+=$row['cashPaid'];
$this->sales_unpaid+=$row['cashUnpaid'];
echo "</tr>";
  }
echo "</table>";
echo "<br>Total Sales:&nbsp;".$this->sales_total;
echo "<br>Total Unpaid:&nbsp;".$this->sales_unpaid;
echo "<br>Total Paid&nbsp;".$this->sales_paid;

}




//REMITTANCE REPORT NG BAWAT DEPARTMENT
public function getRemittanceReport($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$module) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module == "PHARMACY" || $module == "CSR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.completeName) as completeName,pc.description,pc.sellingPrice,pc.quantity,pc.discount,pc.total,pc.cashUnpaid,pc.cashPaid,pc.chargeBy FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$dateSelected' and (pc.departmentStatus_time between '$fromTimez' and '$toTimez') and inventoryFrom='$module' and departmentStatus='dispensedBy_$username' group by pc.itemNo order by completeName asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.completeName) as completeName,pc.description,pc.sellingPrice,pc.quantity,pc.discount,pc.total,pc.cashUnpaid,pc.cashPaid,pc.chargeBy FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$dateSelected' and (pc.departmentStatus_time between '$fromTimez' and '$toTimez') and title='$module' and departmentStatus='remittedBy_$username' group by pc.itemNo order by completeName asc ");
}


echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Name&nbsp;</th>";
echo "<th>&nbsp;Description&nbsp;</th>";
echo "<th>&nbsp;Price&nbsp;</th>";
echo "<th>&nbsp;QTY&nbsp;</th>";
echo "<th>&nbsp;Disc&nbsp;</th>";
echo "<th>&nbsp;Total&nbsp;</th>";
echo "<th>&nbsp;Unpaid&nbsp;</th>";
echo "<th>&nbsp;Paid&nbsp;</th>";
echo "<th>&nbsp;Charge By&nbsp;</th>";
echo "</tr>";
$this->sales_total=0;
$this->sales_unpaid=0;
$this->sales_paid=0;
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['completeName']."&nbsp;</td>";
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['sellingPrice'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['quantity'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['discount'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['total'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashUnpaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashPaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['chargeBy']."&nbsp;</td>";
$this->sales_total+=$row['total'];
$this->sales_paid+=$row['cashPaid'];
$this->sales_unpaid+=$row['cashUnpaid'];
echo "</tr>";
  }
echo "</table>";
echo "<br>Total Sales:&nbsp;".$this->sales_total;
echo "<br>Total Unpaid:&nbsp;".$this->sales_unpaid;
echo "<br>Total Paid&nbsp;".$this->sales_paid;

}


public $collection_salesTotal;
public $collection_salesUnpaid;
public $collection_salesPaid;
public $collection_cash;
public $collection_creditCard;

public function collection_salesTotal() {
return $this->collection_salesTotal;
}

public function collection_salesUnpaid() {
return $this->collection_salesUnpaid;
}

public function collection_salesPaid() {
return $this->collection_salesPaid;
}

public function collection_cash() {
return $this->collection_cash;
}

public function collection_creditCard() {
return $this->collection_creditCard;
}

//COLLLECTION REPORT CASHIER
public function getCashierReport($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$status) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.completeName) as completeName,pc.description,pc.sellingPrice,pc.quantity,pc.discount,pc.total,pc.cashUnpaid,pc.cashPaid,pc.paidBy,pc.paidVia FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.datePaid = '$dateSelected' and (pc.timePaid between '$fromTimez' and '$toTimez') and (pc.status='PAID' or pc.status='BALANCE') and pc.paidBy='$username' group by pc.itemNo order by completeName asc ");


$this->collection_salesTotal=0;
$this->collection_salesUnpaid=0;
$this->collection_salesPaid=0;
while($row = mysqli_fetch_array($result))
  {

$price = preg_split ("/\//", $row['sellingPrice']); 

echo "<tr>";
echo "<td>&nbsp;".$row['completeName']."&nbsp;</td>";
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($price[0],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['quantity'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['discount'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['total'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashUnpaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashPaid'],2)." - (".$row['paidVia'].")&nbsp;</td>";
echo "<td>&nbsp;".$row['paidBy']."&nbsp;</td>";
$this->collection_salesTotal+=$row['total'];
$this->collection_salesUnpaid+=$row['cashUnpaid'];
$this->collection_salesPaid+=$row['cashPaid'];

if($row['paidVia'] == "Cash") {
$this->collection_cash += $row['cashPaid'];
}else {
$this->collection_creditCard += $row['cashPaid'];
}

echo "</tr>";
  }



}




public $balance_salesTotal;
public $balance_salesUnpaid;
public $balance_salesPaid;

public function balance_salesTotal() {
return $this->balance_salesTotal;
}

public function balance_salesUnpaid() {
return $this->balance_salesUnpaid;
}

public function balance_salesPaid() {
return $this->balance_salesPaid;
}


//BALANCE N BNYRAN NA
public function getCashierReportBalance($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$status) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.completeName) as completeName,pc.description,pc.sellingPrice,pc.quantity,pc.discount,pc.total,pc.cashUnpaid,pb.amountPaid,pb.paidBy,pc.dateCharge FROM patientRecord pr,registrationDetails rd,patientCharges pc,patientBalance pb WHERE pb.itemNo=pc.itemNo and pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pb.datePaid = '$dateSelected' and (pb.timePaid between '$fromTimez' and '$toTimez') and (pc.status='PAID' or pc.status='BALANCE') and pc.paidBy='$username' group by pc.itemNo order by completeName asc ");


$this->balance_salesTotal=0;
$this->balance_salesUnpaid=0;
$this->blance_sales_salesPaid=0;
while($row = mysqli_fetch_array($result))
  {

$price = preg_split ("/\//", $row['sellingPrice']); 

echo "<tr>";
echo "<td>&nbsp;".$row['completeName']."&nbsp;</td>";
echo "<td>&nbsp;<font>".$row['description']."</font><br>&nbsp;<font size=2 color=red>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;".number_format($price[0],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['quantity'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['discount'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['amountPaid'],2)."<br><font size=2	 color=red>Previous Balance</font>&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashUnpaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['amountPaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['paidBy']."&nbsp;</td>";
$this->balance_salesTotal+=$row['amountPaid'];
$this->balance_salesUnpaid+=$row['cashUnpaid'];
$this->balance_salesPaid+=$row['amountPaid'];
echo "</tr>";
  }



}





//KKUHAIN UNG MGA PATIENT CHARGES N ANG STATUS AY UNPAID
public function getUnpaidPatient($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$branch) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
.Unpaid {
font-size:12px;
}
</style>";

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,sum(pc.cashUnpaid) as total FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.status='UNPAID' and pc.dateCharge='$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') and pc.branch='$branch' group by rd.registrationNo order by pr.lastName asc  ");

echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th><font class='Unpaid'>Name</font></th>";
echo "<th><font class='Unpaid'>Amount</font></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Cashier/patientUnpaidCharges.php?month=$month&day=$day&year=$year&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&registrationNo=$row[registrationNo]' target='patientCharges'><font class='Unpaid'>".$row['lastName'].", ".$row['firstName']."</font></a>&nbsp;</td>";
echo "<td>&nbsp;<font class='Unpaid'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}


//KKUHAIN UNG TOTAL UNPAID AMOUNT NG PATIENT
public function getUnpaidPatientAmount($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$registrationNo) {


$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.cashUnpaid) as total FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.status='UNPAID' and pc.dateCharge='$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') and rd.registrationNo='$registrationNo' group by rd.registrationNo order by pr.lastName asc  ");


while($row = mysqli_fetch_array($result))
  {
return $row['total'];
  }
echo "</table>";

}



public function paymentManager($itemNo,$status,$paidBy,$amountPaid,$datePaid,$timePaid,$cashUnpaid) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientCharges SET status = '$status',paidBy='$paidBy',cashPaid='$amountPaid',datePaid='$datePaid',timePaid='$timePaid',cashUnpaid='$cashUnpaid' WHERE itemNo = '$itemNo'
 ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}

//KKUNIN UNG TOTAL NG BAWAT CHARGES NG PATIENT 
public function getItemNo_total($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT cashUnpaid from patientCharges where itemNo = '$itemNo' ");


while($row = mysqli_fetch_array($result))
  {
return $row['cashUnpaid'];
  }

}


//CHECK WHERE INVENTORY WILL GET THE MEDS OR SUPPLIES
public function checkInventory($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT inventoryFrom from patientCharges where itemNo = '$itemNo' ");


while($row = mysqli_fetch_array($result))
  {
return $row['inventoryFrom'];
  }

}



public function getTotalBalance($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(cashUnpaid) as total from patientCharges where registrationNo = '$registrationNo' and status='BALANCE' ");


while($row = mysqli_fetch_array($result))
  {
return $row['total'];
  }

}



public function searchBalance($completeName,$username) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
.Unpaid {
font-size:13px;
}
</style>";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastName) as lastName,upper(firstName) as firstName,pc.cashUnpaid,pc.description,pc.datePaid from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pr.completeName like '$completeName%%%%%%%' and pc.status='BALANCE' ");

echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td>&nbsp;Patient&nbsp;</td>";
echo "<td>&nbsp;Description&nbsp;</td>";
echo "<td>&nbsp;Date of Balance&nbsp;</td>";
echo "<td>&nbsp;Balance&nbsp;</td>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Cashier/balanceProfile.php?registrationNo=$row[registrationNo]&username=$username'>".$row['lastName']." ".$row['firstName']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
echo "<td>&nbsp;".$row['datePaid']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['cashUnpaid'],2)."&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}


//KKUHAIN UNG BNYARAN N BALANCE
public function getBalancePaid($itemNo) {
$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT amountPaid from patientBalance  where itemNo = '$itemNo'   ");

while($row = mysqli_fetch_array($result))
  {
return $row['amountPaid'];
  }

}

//TTGNAN KUNG MEI BALANCE UNG ITEM
public function checkBalanceItem($itemNo) {
$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(itemNo) as itemNo from patientBalance  where itemNo = '$itemNo'  ");

while($row = mysqli_fetch_array($result)) {
return $row['itemNo'];
}

}


public function payBalance($itemNo,$datePaid,$timePaid,$paidBy,$amountPaid) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientBalance (itemNo,datePaid,timePaid,paidBy,amountPaid)
VALUES
('$itemNo','$datePaid','$timePaid','$paidBy','$amountPaid')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$doctorName was Successfully Added to the List of Doctor');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/Doctor/addNewDoctor.php?username=$username '";
echo "</script>";
*/

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function addBranch($branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO branch (branch)
VALUES
('$branch')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$doctorName was Successfully Added to the List of Doctor');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/Doctor/addNewDoctor.php?username=$username '";
echo "</script>";
*/

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function updateStatus($itemNo,$status) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE patientCharges SET status = '$status' WHERE itemNo='$itemNo'
 ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}




public function getDispensePatient($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$inventoryFrom) {

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pc.lastName) as lastName,upper(pr.firstName) as firstName from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.registrationNo and rd.registrationNo=pc.registrationNo and pc.inventoryFrom='inventoryFrom' and pc.dateCharge = '$dateSelected' and (pc.timeCharge between '$fromTimez' and '$toTimez') group by rd.registrationNo order by lastName asc  ");

echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td>&nbsp;Name&nbsp;</td>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['lastName']." ".$row['firstName']."&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}



public function getChargesCode($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT chargesCode from patientCharges  where itemNo = '$itemNo'   ");

while($row = mysqli_fetch_array($result))
  {
return $row['chargesCode'];
  }


}


public function getCurrentQTY($inventoryCode) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT quantity from inventory  where inventoryCode = '$inventoryCode'   ");

while($row = mysqli_fetch_array($result))
  {
return $row['quantity'];
  }

}


//UNIVERSAL SELECT
public function selectNow($table,$cols,$identifier,$identifierData) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT ($cols) as cols from $table  where $identifier = '$identifierData'   ");

while($row = mysqli_fetch_array($result))
  {
return $row['cols'];
  }

}



//SINGLE 
public function getTitle($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT title from patientCharges  where itemNo = '$itemNo'   ");

while($row = mysqli_fetch_array($result))
  {
return $row['title'];
  }

}

public $department_title;

//CALLEE
public function getDepartmentInventory() {
return $this->department_title;
}

//MULTIPLE ITO ANG CALLER
public function getInventoryFrom($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT inventoryFrom from patientCharges  where itemNo = '$itemNo'   ");

while($row = mysqli_fetch_array($result))
  {
$this->department_title = $row['inventoryFrom'];
  }

}



public function changeQTY($chargesCode,$newQTY) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE inventory SET quantity = '$newQTY' WHERE inventoryCode='$chargesCode'
 ");

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function  checkBalance($patientNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.cashUnpaid) as cashUnpaid from patientCharges pc,patientRecord pr,registrationDetails rd  where rd.patientNo='$patientNo' and rd.registrationNo = pc.registrationNo and pc.status = 'BALANCE' group by pc.status   ");

while($row = mysqli_fetch_array($result))
  {
return $row['cashUnpaid'];
  }

}


//BASED ON PASSWORD
public function getUserBranch($password) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from registeredUser where password='$password'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['branch'];
  }

}


//BASED ON USERNAME AND MODULE
public function getUserBranch_username($username,$module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from registeredUser where username='$username' and module = '$module'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['branch'];
  }

}

public function getUserBranch_dept($username,$module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from registeredUser where username='$username' and module='$module'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['branch'];
  }

}


public function checkBranch($branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch where branch='$branch'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['branch'];
  }

}



//PRA LUMABAS LHAT NG BRANCH N NKA DROPDOWN MENU SA ADMIN (MEDICINE)
public function getAdminBranchMeds($username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/ADMIN/inventoryBranch.php?username=$username&branch=$row[branch]&inventoryType=medicine&show=All' target='departmentX'>Medicine in ".$row['branch']."</a></li>";
  }

}


//PRA LUMABAS LHAT NG BRANCH N NKA DROPDOWN MENU SA ADMIN (SUPPLIES)
public function getAdminBranchSupplies($username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/ADMIN/inventoryBranch.php?username=$username&branch=$row[branch]&inventoryType=supplies&show=All' target='departmentX'>Supplies in ".$row['branch']."</a></li>";
  }

}

//PRA LUMABAS LHAT NG BRANCH N NKA DROPDOWN MENU SA MAINTENANCE
public function getMaintenanceBranch($username,$target,$inventoryType) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {

if($inventoryType == "CSR" || $inventoryType == "PHARMACY") {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/masterfile/inventory.php?username=$username&branch=$row[branch]&inventoryType=$inventoryType&show=All' target='$target'>Stocklist of $inventoryType in ".$row['branch']."</a></li>";
}else {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/masterfile/inventory.php?username=$username&branch=$row[branch]&inventoryType=$inventoryType&show=All' target='$target'>List of $inventoryType in ".$row['branch']."</a></li>";
}
  }

}


//PRA LUMABAS LHAT NG BRANCH N NKA DROPDOWN MENU SA ADMIN
public function getDepartmentBranch($target,$inventoryType,$username,$requestingDepartment) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/medicineRequest.php?branch=$row[branch]&inventoryType=$inventoryType&username=$username&requestingDepartment=$requestingDepartment' target='$target'>Request $inventoryType to the CSR of ".$row['branch']."</a></li>";
  }

}




//RECEIVE REQUESTITION
public function receiveRequest($target,$inventoryType,$username,$requestingDepartment) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/medicineRequest.php?branch=$row[branch]&inventoryType=$inventoryType&username=$username&requestingDepartment=$requestingDepartment' target='$target'>Request $inventoryType to the CSR of ".$row['branch']."</a></li>";
  }

}


//KKUNIN LHAT NG NAG REQUEST SA DEPARTMENT AT BRANCH N CSR
public function getCSRBranch($target,$username,$myDepartment,$myBranch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT requestingBranch,requestingDepartment,requestTo_department,requestTo_branch from inventoryManager WHERE requestTo_department='$myDepartment' and requestTo_branch = '$myBranch' and status='requesting' group by requestingBranch,requestingDepartment ");

if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_array($result))
  {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/showRequestList.php?username=$username&requestingDepartment=$row[requestingDepartment]&requestingBranch=$row[requestingBranch]&requestTo_department=$myDepartment&requestTo_branch=$myBranch' target='$target'>From ".$row['requestingDepartment']." of ".$row['requestingBranch']." (<font color=red>".$this->getRequest($row['requestTo_department'],$row['requestTo_branch'],$row['requestingDepartment'],$row['requestingBranch'])."</font>)</a></li>";

  }
}else {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/medicineRequest.php?username=$username' target='$target'>You Have no Request</a></li>";
}

}



public $allRequest;

public function allRequest() {
return $this->allRequest;
}

//BBLANGIN LHAT NG REQUEST AS IN SUMMARY
public function getTotalRequest($target,$username,$myDepartment,$myBranch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT requestingBranch,requestingDepartment,requestTo_department,requestTo_branch from inventoryManager WHERE requestTo_department='$myDepartment' and requestTo_branch = '$myBranch' group by requestingBranch,requestingDepartment  ");

while($row = mysqli_fetch_array($result))
  {
$this->allRequest+=$this->getRequest($row['requestTo_department'],$row['requestTo_branch'],$row['requestingDepartment'],$row['requestingBranch']);

  }

}



//PRA SA REPORT NG ALL BRANCHES LLBAS ANG MGA BRANCH AS TABLE HEADER SA REPORT
public function getHeaderBranch() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<th>&nbsp;".$row['branch']."&nbsp;</th>";
  }

}


//KKUNIN ANG DEPARTMENT STATUS
public function getDepartmentStatus($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges where itemNo = '$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['departmentStatus'];
  }

}



//KKUNIN ANG STATUS
public function getChargesStatus($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges where itemNo = '$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['status'];
  }

}


//KKUNIN ANG QTY NG CHARGES
public function getPatientChargesQTY($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges where itemNo = '$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['quantity'];
  }

}



//KKUHAIN ANG TOTAL NG BWAT MODULE/DEPT
public function getTotalEachBranch_module($type,$branch,$module,$m,$d,$y,$m1,$d1,$y1) {

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module == "PHARMACY" || $module == "CSR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.cashPaid) as cashPaid from patientCharges pc,registrationDetails rd where pc.registrationNo = rd.registrationNo and (pc.status = 'PAID' or pc.status='Approved') and rd.type='$type' and pc.branch = '$branch' and pc.inventoryFrom = '$module' and (pc.datePaid between '$fromDate' and '$toDate')  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.cashPaid) as cashPaid from patientCharges pc,registrationDetails rd where pc.registrationNo = rd.registrationNo and (pc.status = 'PAID' or pc.status='Approved')  and rd.type='$type' and pc.branch = '$branch' and pc.title = '$module' and (pc.datePaid between '$fromDate' and '$toDate')   ");
}
while($row = mysqli_fetch_array($result))
  {
return $row['cashPaid'];
  }

}



public function getTotalEachBranch_module_balance($type,$branch,$module,$m,$d,$y,$m1,$d1,$y1) {

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module == "PHARMACY" || $module == "CSR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pb.amountPaid) as amountPaid from patientCharges pc,registrationDetails rd,patientBalance pb where pb.itemNo = pc.itemNo and pc.registrationNo = rd.registrationNo and (pc.status = 'PAID' or pc.status='Approved')  and pc.branch = '$branch' and rd.type='$type' and pc.inventoryFrom = '$module' and (pc.datePaid between '$fromDate' and '$toDate')  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pb.amountPaid) as amountPaid from patientCharges pc,registrationDetails rd,patientBalance pb where pb.itemNo = pc.itemNo and pc.registrationNo = rd.registrationNo and (pc.status = 'PAID' or pc.status='Approved')  and pc.branch = '$branch' and rd.type='$type' and pc.title = '$module' and (pc.datePaid between '$fromDate' and '$toDate')   ");
}
while($row = mysqli_fetch_array($result))
  {
return $row['amountPaid'];
  }

}





public function getTotalEachBranch_All($branch,$module,$m,$d,$y,$m1,$d1,$y1) {

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module == "PHARMACY" || $module == "CSR") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.cashPaid) as cashPaid from patientCharges pc,registrationDetails rd where pc.registrationNo = rd.registrationNo and (pc.status = 'PAID' or pc.status='Approved')  and pc.branch = '$branch' and (pc.datePaid between '$fromDate' and '$toDate')  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.cashPaid) as cashPaid from patientCharges pc,registrationDetails rd where pc.registrationNo = rd.registrationNo and (pc.status = 'PAID' or pc.status='Approved')  and pc.branch = '$branch' and (pc.datePaid between '$fromDate' and '$toDate')   ");
}
while($row = mysqli_fetch_array($result))
  {
return $row['cashPaid'];
  }

}


public function getPaidBalance_allBranch($branch,$module,$m,$d,$y,$m1,$d1,$y1) {

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pb.amountPaid) as amountPaid from patientCharges pc,registrationDetails rd,patientBalance pb where pc.registrationNo = rd.registrationNo and pc.itemNo = pb.itemNo and (pc.status = 'PAID' )  and pc.branch = '$branch' and (pc.datePaid between '$fromDate' and '$toDate')   ");

while($row = mysqli_fetch_array($result))
  {
return $row['amountPaid'];
  }


}


public $accttitle_total;

//ITO UNG MGGING ROW SA REPORT N ANG LAMAN IS UNG TOTAL NG BWAT DEPT
public function reportRowBranch($type,$module,$m,$d,$y,$m1,$d1,$y1) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

$this->accttitle_total=0;
while($row = mysqli_fetch_array($result))
  {
echo "<td>&nbsp;".number_format($this->getTotalEachBranch_module($type,$row['branch'],$module,$m,$d,$y,$m1,$d1,$y1) + $this->getTotalEachBranch_module_balance($type,$row['branch'],$module,$m,$d,$y,$m1,$d1,$y1),2)."&nbsp;</td>";
//COMPUTE TOTAL
$this->accttitle_total+=$this->getTotalEachBranch_module($type,$row['branch'],$module,$m,$d,$y,$m1,$d1,$y1) + $this->getTotalEachBranch_module_balance($type,$row['branch'],$module,$m,$d,$y,$m1,$d1,$y1);
  }
echo "<Td>&nbsp;<b>".number_format($this->accttitle_total,2)."</b>&nbsp;</td>";
}


//KKUHAIN ANG TOTAL NG BWAT BRANCH
public function getRowTotal($module,$m,$d,$y,$m1,$d1,$y1) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<td>&nbsp;".number_format($this->getTotalEachBranch_All($row['branch'],$module,$m,$d,$y,$m1,$d1,$y1) + $this->getPaidBalance_allBranch($row['branch'],$module,$m,$d,$y,$m1,$d1,$y1),2)."&nbsp;</td>";
  }

}


public function getMasterListCharges($show,$desc,$title,$username) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));


if($show == "All") { // iLLbas Lhat ng charges
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from availableCharges where Category = '$title' order by Description asc  ");
}else { // iLLbas kung anu Lng ung cnsearch
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from availableCharges where Category = '$title' and description like '$desc%%%%%%%' order by Description asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
$this->coconutTableHeader("Code");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("Service");
$this->coconutTableHeader("Category");
$this->coconutTableHeader("OPD");
$this->coconutTableHeader("WARD");
$this->coconutTableHeader("SOLOWARD");
$this->coconutTableHeader("SEMIPRIVATE");
$this->coconutTableHeader("PRIVATE");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['chargesCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Service']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Category']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['OPD']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['WARD']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['SOLOWARD']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['SEMIPRIVATE']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['PRIVATE']."</font>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editCharges.php?chargesCode=$row[chargesCode]&description=$row[Description]&service=$row[Service]&category=$row[Category]&opd=$row[OPD]&ward=$row[WARD]&soloward=$row[SOLOWARD]&semiprivate=$row[SEMIPRIVATE]&private=$row[PRIVATE]&module=$title&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteCharges.php?username=$username&chargesCode=$row[chargesCode]&description=$row[Description]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</tr>";

}



public function getMasterListICDcode($show,$desc,$protoType,$registrationNo,$username) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));


if($show == "All") { // iLLbas Lhat ng charges
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from availableICD order by icdCode asc  ");
}else { // iLLbas kung anu Lng ung cnsearch
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from availableICD where icdCode like '$desc%%%%%%%' order by icdCode asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
$this->coconutTableHeader("ICD Code");
$this->coconutTableHeader("Diagnosis");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['icdCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['diagnosis']."</font>&nbsp;</td>";

if($protoType == "maintenance") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editICD.php?username=$username&icdCode=$row[icdCode]&diagnosis=$row[diagnosis]&icdTrackNo=$row[icdTrackNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";


echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteICD.php?icdTrackNo=$row[icdTrackNo]&icdCode=$row[icdCode]&diagnosis=$row[diagnosis]&username=$username&show=$show'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";

}else {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/addPatientICD.php?registrationNo=$registrationNo&icdCode=$row[icdCode]&diagnosis=$row[diagnosis]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/check.jpeg'></a>&nbsp;</td>";
}  
echo "</tr>";
}
echo "</tr>";

}


public function getMasterListInventory($show,$desc,$inventoryType,$username,$branch) {


echo "
<style type='text/css'>
.data{
font-size:12px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));
if($branch == "All") {

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where (inventoryType = '$inventoryType' or inventoryLocation='$inventoryType') order by description asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where description like '$desc%%%%%%%' and (inventoryType = '$inventoryType' or inventoryLocation='$inventoryType') order by description asc  ");
}

}else {

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where (inventoryType = '$inventoryType' or inventoryLocation='$inventoryType') and branch='$branch' order by description asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where description like '$desc%%%%%' and (inventoryType = '$inventoryType' or inventoryLocation='$inventoryType') and branch='$branch' order by description asc  ");
}

}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Inventory Code</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Generic</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Preparation</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Unit Cost</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>QTY</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Expiration</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Added By</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Date Added</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Time Added</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Inventory Location</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Inventory Type</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Branch</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Transition</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Remarks</font>&nbsp;</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['genericName']."</font>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".$row['preparation']."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['unitcost']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['expiration']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['addedBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateAdded']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeAdded']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryLocation']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryType']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['transition']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['remarks']."</font>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editInventory.php?inventoryCode=$row[inventoryCode]&description=$row[description]&genericName=$row[genericName]&unitcost=$row[unitcost]&quantity=$row[quantity]&expiration=$row[expiration]&addedBy=$row[addedBy]&dateAdded=$row[dateAdded]&timeAdded=$row[timeAdded]&inventoryLocation=$row[inventoryLocation]&inventoryType=$row[inventoryType]&branch=$row[branch]&username=$username&transition=$row[transition]&remarks=$row[remarks]&preparation=$row[preparation]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteInventory.php?inventoryCode=$row[inventoryCode]&username=$username&description=$row[description]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";


}



public function getMasterListDoctor($show,$desc,$username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Doctors order by Name asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Doctors WHERE Name like '$desc%%%%%%' order by Name asc  ");
}

echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Doctor Code</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Name</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Specialization1</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Specialization2</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Specialization3</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Specialization4</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Specialization5</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>PHIC Accreditation No</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>User Name</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Password</font>&nbsp;</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['doctorCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Name']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Specialization1']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Specialization2']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Specialization3']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Specialization4']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['Specialization5']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['PhilHealth_AccreditationNo']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['username']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['password']."</font>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editDoctor.php?doctorCode=$row[doctorCode]&name=$row[Name]&specialization1=$row[Specialization1]&specialization2=$row[Specialization2]&specialization3=$row[Specialization3]&specialization4=$row[Specialization4]&specialization5=$row[Specialization5]&PHIC=$row[PhilHealth_AccreditationNo]&username=$username&usernameDoctor=$row[username]&password=$row[password]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteDoctor.php?username=$username&doctorCode=$row[doctorCode]&name=$row[Name]&show=$show'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";  
}
echo "</table>";
}



public function getMasterListDoctorService($show,$desc,$username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from DoctorService order by serviceName asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from DoctorService WHERE serviceName like '$desc%%%%' order by serviceName asc  ");
}

echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Service Name&nbsp;</th>";
echo "<th>&nbsp;Specialization&nbsp;</th>";
echo "<th>&nbsp;Cash&nbsp;</th>";
echo "<th>&nbsp;Company&nbsp;</th>";
echo "<th>&nbsp;PF Share&nbsp;</th>";
echo "<th>&nbsp;Senior Discount&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['serviceName']."&nbsp;</td>";
echo "<td>&nbsp;".$row['specialization']."&nbsp;</td>";
echo "<td>&nbsp;".$row['cashAmount']."&nbsp;</td>";
echo "<td>&nbsp;".$row['companyRate']."&nbsp;</td>";
echo "<td>&nbsp;".$row['doctorShare']."&nbsp;</td>";
echo "<td>&nbsp;".$row['discount']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/EditDoctorService.php?serviceNo=$row[serviceNo]&serviceName=$row[serviceName]&specialization=$row[specialization]&cashAmount=$row[cashAmount]&companyRate=$row[companyRate]&doctorShare=$row[doctorShare]&discount=$row[discount]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteDoctorService.php?username=$username&serviceNo=$row[serviceNo]&serviceName=$row[serviceName]&specialization=$row[specialization]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";
}


public function getMasterListServices($show,$desc,$username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Services order by Service asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Services WHERE Service like '$desc%%%%%' order by Service asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Service&nbsp;</th>";
echo "<th>&nbsp;Category&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['Service']."&nbsp;</td>";
echo "<td>&nbsp;".$row['Category']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editService.php?service=$row[Service]&category=$row[Category]&serviceNo=$row[serviceNo]&username=$username&show=$show&desc=$desc'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteService.php?serviceNo=$row[serviceNo]&username=$username&service=$row[Service]&category=$row[Category]&show=$show'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";
}


public function getMasterListCompany($show,$desc,$username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Company where companyName != '' order by companyName asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Company where companyName like '$desc%%%%' order by companyName asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Name&nbsp;</th>";
echo "<th>&nbsp;Address&nbsp;</th>";
echo "<th>&nbsp;Rate 1&nbsp;</th>";
echo "<th>&nbsp;Rate 2&nbsp;</th>";
echo "<th>&nbsp;Rate 3&nbsp;</th>";
echo "<th>&nbsp;Rate 4&nbsp;</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['companyName']."&nbsp;</td>";
echo "<td>&nbsp;".$row['companyAddress']."&nbsp;</td>";
echo "<td>&nbsp;".$row['rate1']."&nbsp;</td>";
echo "<td>&nbsp;".$row['rate2']."&nbsp;</td>";
echo "<td>&nbsp;".$row['rate3']."&nbsp;</td>";
echo "<td>&nbsp;".$row['rate4']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editCompany.php?username=$username&companyName=$row[companyName]&companyAddress=$row[companyAddress]&rate1=$row[rate1]&rate2=$row[rate2]&rate3=$row[rate3]&rate4=$row[rate4]&companyNo=$row[companyNo]&username=$username&show=$show&desc=$desc'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteCompany.php?username=$username&companyNo=$row[companyNo]&companyName=$row[companyName]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}


public function getMasterListUser($show,$desc,$username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from registeredUser order by username asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from registeredUser WHERE username like '$desc%%%%%%' order by username asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Username&nbsp;</th>";
echo "<th>&nbsp;Password&nbsp;</th>";
echo "<th>&nbsp;Module&nbsp;</th>";
echo "<th>&nbsp;Branch&nbsp;</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['username']."&nbsp;</td>";
echo "<td>&nbsp;".$row['password']."&nbsp;</td>";
echo "<td>&nbsp;".$row['module']."&nbsp;</td>";
echo "<td>&nbsp;".$row['branch']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editUser.php?username=$username&user=$row[username]&password=$row[password]&module=$row[module]&branch=$row[branch]&employeeID=$row[employeeID]&show=$show'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteUser.php?username=$username&employeeID=$row[employeeID]&user=$row[username]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}



public function getMasterListBranch($show,$desc,$username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from branch order by branch asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from branch WHERE branch like '$desc%%%%' order by branch asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Branch&nbsp;</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['branch']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editBranch.php?branchID=$row[branchID]&branch=$row[branch]&username=$username&show=$show'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteBranch.php?branchID=$row[branchID]&branch=$row[branch]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}



public function getMasterListPercentage($username) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from percentage order by percentageType asc  ");
echo "<center>";
echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Description&nbsp;</th>";
echo "<th>&nbsp;percentageType&nbsp;</th>";
echo "<th>&nbsp;Amount&nbsp;</th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
echo "<td>&nbsp;".$row['percentageType']."&nbsp;</td>";
echo "<td>&nbsp;".$row['percentageAmount']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editPercentage.php?percentageNo=$row[percentageNo]&description=$row[description]&percentageAmount=$row[percentageAmount]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}



public function getMasterListRoom($username,$show,$desc) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));
if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from room order by Description asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from room WHERE Description like '$desc%%%%%%%' order by Description asc  ");
}
echo "<center>";
echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Description&nbsp;</th>";
echo "<th>&nbsp;Type&nbsp;</th>";
echo "<th>&nbsp;Rate&nbsp;</th>";
echo "<th>&nbsp;Floor&nbsp;</th>";
echo "<th>&nbsp;Branch&nbsp;</th>";
echo "<th>&nbsp;Status&nbsp;</th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
$myRoom = preg_split ("/\_/", $row['Description']); 
echo "<td>&nbsp;".$myRoom[0]."&nbsp;</td>";
echo "<td>&nbsp;".$row['type']."&nbsp;</td>";
echo "<td>&nbsp;".$row['rate']."&nbsp;</td>";
echo "<td>&nbsp;".$row['floor']."&nbsp;</td>";
echo "<td>&nbsp;".$row['branch']."&nbsp;</td>";
echo "<td>&nbsp;".$row['status']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editRoom.php?roomNo=$row[roomNo]&description=$row[Description]&type=$row[type]&rate=$row[rate]&branch=$row[branch]&username=$username&show=$show&desc=$desc&floor=$row[floor]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteRoom.php?roomNo=$row[roomNo]&description=$row[Description]&type=$row[type]&rate=$row[rate]&username=$username&show=$show&desc=$desc'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}


public function getMasterListFloor($username,$show,$desc) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));
if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from floor order by description asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from floor WHERE description like '$desc%%%%%%%' order by description asc  ");
}
echo "<center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Floor");
$this->coconutTableHeader("Branch");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['description']);
$this->coconutTableData($row['branch']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editFloor.php?username=$username&description=$row[description]&branch=$row[branch]&floorNo=$row[floorNo]&show=$show&desc='>".$this->coconutImages_return("pencil.jpeg")."</a>");
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteFloor.php?description=$row[description]&branch=$row[branch]&floorNo=$row[floorNo]&username=$username&show=$show&desc=$desc'>".$this->coconutImages_return("delete.jpeg")."</a>");
$this->coconutTableRowStop();
  }
$this->coconutTableStop();

}





public function getMasterListPatientRecord($username,$show,$desc) {

echo "

<style type='text/css'>
#rowz:hover {
background-color:yellow;
}
</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientRecord order by completeName asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientRecord where completeName like '$desc%%%%%' order by completeName asc ");
}

echo "<table width='230%' rules=all border=1>";
echo "<tr>";

$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableHeader("#");
$this->coconutTableHeader("Patient No");
$this->coconutTableHeader("Last Name");
$this->coconutTableHeader("First Name");
$this->coconutTableHeader("Middle Name");
$this->coconutTableHeader("Complete Name");
$this->coconutTableHeader("BirthDate");
$this->coconutTableHeader("Age");
$this->coconutTableHeader("Gender");
$this->coconutTableHeader("Senior");
$this->coconutTableHeader("Address");
$this->coconutTableHeader("Contact#");
$this->coconutTableHeader("PhilHealth");
$this->coconutTableHeader("Civil Status");
$this->coconutTableHeader("Visits");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
$x=1;
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='rowz'>";
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editPatientRecord.php?patientNo=$row[patientNo]&username=$username&lastName=$row[lastName]&firstName=$row[firstName]&middleName=$row[middleName]&completeName=$row[completeName]&Birthdate=$row[Birthdate]&Age=$row[Age]&Gender=$row[Gender]&Senior=$row[Senior]&Address=$row[Address]&contactNo=$row[contactNo]&PHIC=$row[PHIC]&civilStatus=$row[civilStatus]&username=$username&show=$show&desc=$desc'>".$this->coconutImages_return("pencil.jpeg")."</a>");
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/verifyDeletePatientRecord.php?patientNo=$row[patientNo]&lastName=$row[lastName]&firstName=$row[firstName]&middleName=$row[middleName]&username=$username&show=$show&desc=$desc'>".$this->coconutImages_return("delete.jpeg")."</a>");
$this->coconutTableData($x++);
$this->coconutTableData($row['patientNo']);
$this->coconutTableData($row['lastName']);
$this->coconutTableData($row['firstName']);
$this->coconutTableData($row['middleName']);
$this->coconutTableData($row['completeName']);
$this->coconutTableData($row['Birthdate']);
$this->coconutTableData($row['Age']);
$this->coconutTableData($row['Gender']);
$this->coconutTableData($row['Senior']);
$this->coconutTableData($row['Address']);
$this->coconutTableData($row['contactNo']);
$this->coconutTableData($row['PHIC']);
$this->coconutTableData($row['civilStatus']);
$this->coconutTableData("<font color=red>".$this->regRecord($row['patientNo'],$username)."</font>");
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editPatientRecord.php?patientNo=$row[patientNo]&username=$username&lastName=$row[lastName]&firstName=$row[firstName]&middleName=$row[middleName]&completeName=$row[completeName]&Birthdate=$row[Birthdate]&Age=$row[Age]&Gender=$row[Gender]&Senior=$row[Senior]&Address=$row[Address]&contactNo=$row[contactNo]&PHIC=$row[PHIC]&civilStatus=$row[civilStatus]&username=$username&show=$show&desc=$desc'>".$this->coconutImages_return("pencil.jpeg")."</a>");
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/verifyDeletePatientRecord.php?patientNo=$row[patientNo]&lastName=$row[lastName]&firstName=$row[firstName]&middleName=$row[middleName]&username=$username&show=$show&desc=$desc'>".$this->coconutImages_return("delete.jpeg")."</a>");
echo "</tr>";
  }

$this->coconutTableStop();

}



public function regRecord($patientNo,$username) {

echo "

<style type='text/css'>
a { text-decoration:none; color:red; }
</style>
";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(patientNo) as totalReg from registrationDetails WHERE patientNo = '$patientNo'  ");

while($row = mysqli_fetch_array($result))
  {
return "<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/registrationDetails.php?patientNo=$patientNo&username=$username'>".$row['totalReg']."</a>";
  }


}



public function getMasterListRegistrationDetails($patientNo,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.*,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,upper(pr.middleName) as middleName from registrationDetails rd,patientRecord pr WHERE pr.patientNo = rd.patientNo and rd.patientNo = '$patientNo'  ");

echo "<br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Reg No#");
$this->coconutTableHeader("Name");
$this->coconutTableHeader("Registration Date");
$this->coconutTableHeader("Branch");
$this->coconutTableHeader("Registered By");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
$this->coconutTableData($row['registrationNo']);
$this->coconutTableData($row['lastName']," ".$row['firstName']." ".$row['middleName']);
$this->coconutTableData($row['dateRegistered']);
$this->coconutTableData($row['branch']);
$this->coconutTableData("");
echo "</tr>";
  }

$this->coconutTableStop();

}



public $viewCreditLimit_limit;
public $viewCreditLimit_current;
public $viewCreditLimit_payment;
public $viewCreditLimit_allowable;


public function viewCreditLimit($registrationNo,$type,$username) {


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($type == "PATIENT") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCreditLimit WHERE registrationNo = '$registrationNo' and limitTo = 'PATIENT' and limitVia = 'cashUnpaid' order by limitTo");	
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCreditLimit WHERE registrationNo = '$registrationNo' and limitTo != 'PATIENT' order by limitTo	 asc  ");
}


if($type == "PATIENT") {
echo "<br><center><br>";
echo "<table border=1 rules=all cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit To</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit Via</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Balance</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Payment</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Current Bal.</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit By</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'></th>";
echo "<th bgcolor='#3b5998'></th>";
echo "</tr>";
}else {
echo "<br><center><br>";
echo "<table border=1 rules=all cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit To</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit Via</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Covered</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Limit By</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'></th>";
echo "<th bgcolor='#3b5998'></th>";
echo "</tr>";
}
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";

$current = $this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia']) - $this->getCurrentPaid($registrationNo,$row['limitTo'],$row['limitVia']);


if($type != "PATIENT") {
$this->viewCreditLimit_limit += $row['amountLimit'];
$this->viewCreditLimit_current += $this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia']);
$this->viewCreditLimit_payment += $this->getCurrentPaid($registrationNo,$row['limitTo'],$row['limitVia']);
}else {
echo "";
}

if($current > 0) {
$this->viewCreditLimit_allowable += $current; //add if current > 0
}else { //leave if current < 0 to pra maiwasan ang pag subtract ng amount once nagkaroon ng negative numbers s allowable
}


echo "<td>&nbsp;".$row['limitTo']."&nbsp;</td>";
echo "<td>&nbsp;".$row['limitVia']."&nbsp;</td>";


if($type=="PATIENT") { //show payment at current Balance header....
echo "<td>&nbsp;".number_format(($this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia'])),2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($this->getCurrentPaid($registrationNo,$row['limitTo'],$row['limitVia']),2)."&nbsp;</td>";


if($current > $row['amountLimit']) {
echo "<td>&nbsp;<font color=red>".number_format($current,2)."</font> - (<font color=blue>".number_format($current - $row['amountLimit'],2)."</font>)&nbsp;</tD>";
}else if($current < 0) {
echo "<td>&nbsp;<font color=blue>".number_format($current,2)."</font>&nbsp;</tD>";
}else {
echo "<td>&nbsp;<b>".number_format($current,2)."</b>&nbsp;</tD>";
}

}else { //hide payment at current balance


if($this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia']) > $row['amountLimit']) {
echo "<td>&nbsp;<font color=red>".number_format(($this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia'])),2)."</font> - (<font color=blue>".number_format($this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia']) - $row['amountLimit'],2)."</font>)&nbsp;</td>";
}else {
echo "<td>&nbsp;".number_format(($this->getCurrentCredit($registrationNo,$row['limitTo'],$row['limitVia'])),2)."&nbsp;</td>";
}

}
echo "<td>&nbsp;".number_format($row['amountLimit'],2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['username']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/creditLimit/editCreditLimit.php?limitTo=$row[limitTo]&limitVia=$row[limitVia]&amountLimit=$row[amountLimit]&username=$username&limitNo=$row[limitNo]&registrationNo=$row[registrationNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/creditLimit/verifyDeleteCreditLimit.php?limitNo=$row[limitNo]&registrationNo=$row[registrationNo]&limitTo=$row[limitTo]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }

echo "<tr>";

if($type =='PATIENT') {
echo "";
}else {
echo "<td><center><b>TOTAL</b></center></tD>";
echo "<Td>&nbsp;</tD>";
echo "<td>&nbsp;".number_format($this->viewCreditLimit_current,2)."&nbsp;</tD>"; // get current covered [PATIENT]
echo "<td>&nbsp;".number_format($this->viewCreditLimit_limit,2)."&nbsp;</tD>"; // get limit [ndi PATIENT]
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
}

echo "</tr>";

echo "</table>";

}



public $viewCreditLimit_setter_limitNo;
public $viewCreditLimit_setter_registrationNo;
public $viewCreditLimit_setter_limitTo;
public $viewCreditLimit_setter_limitVia;
public $viewCreditLimit_setter_amountLimit;

public function viewCreditLimit_setter_limitNo() {
return $this->viewCreditLimit_setter_limitNo;
}
public function viewCreditLimit_setter_registrationNo() {
return $this->viewCreditLimit_setter_registrationNo;
}
public function viewCreditLimit_setter_limitTo() {
return $this->viewCreditLimit_setter_limitTo;
}
public function viewCreditLimit_setter_limitVia() {
return $this->viewCreditLimit_setter_limitVia;
}
public function viewCreditLimit_setter_amountLimit() {
return $this->viewCreditLimit_setter_amountLimit;
}

public function viewCreditLimit_setter($registrationNo,$limitTo,$limitVia,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCreditLimit WHERE registrationNo = '$registrationNo' and limitTo = '$limitTo' and limitVia = '$limitVia' order by limitTo asc  ");

while($row = mysqli_fetch_array($result))
  {
$this->viewCreditLimit_setter_limitNo = $row['limitNo'];
$this->viewCreditLimit_setter_registrationNo = $row['registrationNo'];
$this->viewCreditLimit_setter_limitTo = $row['limitTo'];
$this->viewCreditLimit_setter_limitVia = $row['limitVia'];
$this->viewCreditLimit_setter_amountLimit = $row['amountLimit'];
  }


}





public $hmoAmount;

public function getHmoSOA($type,$company,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,$username,$branch) {

echo "
<style type='text/css'>
.data{
font-size:11.5px;
}

a{ text-decoration:none; color:black; size=10px; }


#hmoz:hover{ background-color:yellow; color:black; }

</style>

";

$fromDate = $fromMonth."_".$fromDay."_".$fromYear;
$toDate = $toMonth."_".$toDay."_".$toYear;

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($branch == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.branch,rd.registrationNo,upper(pr.lastname) as lastname,upper(pr.firstname) as firstname,pc.description,pc.company,pc.quantity,pc.dateCharge,pc.title,pc.service from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.Company = '$company' and rd.type='$type' and (pc.dateCharge between '$fromDate' and '$toDate') and pc.company != 0 order by pr.lastname,branch asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastname) as lastname,upper(pr.firstname) as firstname,pc.description,pc.company,pc.quantity,pc.dateCharge,pc.title,pc.service from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.Company = '$company' and rd.type='$type' and (pc.dateCharge between '$fromDate' and '$toDate') and pc.company != 0 and pc.branch='$branch' order by pr.lastname asc  ");
}

echo "<center>";
echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;Name&nbsp;</th>";
echo "<th>&nbsp;Description&nbsp;</th>";
echo "<th>&nbsp;QTY&nbsp;</th>";
echo "<th>&nbsp;Amount&nbsp;</th>";
echo "<th>&nbsp;Date&nbsp;</th>";
if($branch == "All") {
echo "<th>&nbsp;Branch&nbsp;</th>";
}else {
echo "";
}

echo "</tr>";
$this->hmoAmount=0;
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='hmoz'>";
$this->hmoAmount+=$row['company'];
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?username=$username&registrationNo=$row[registrationNo]' target='_blank'>".$row['lastname']." ".$row['firstname']."</a>&nbsp;</td>";

if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;".$row['description']."<br>&nbsp;<font size=2 color=red>(".$row['service'].")</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
}
echo "<td>&nbsp;".$row['quantity']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['company'],2)."&nbsp;</td>";

if($branch == "All") {
echo "<td>&nbsp;".$row['dateCharge']."&nbsp;</td>";
echo "<td>&nbsp;".$row['branch']."&nbsp;</td>";
}else {
echo "<td>&nbsp;".$row['dateCharge']."&nbsp;</td>";
}

echo "</tr>";
  }

if($branch == "All") {
echo "<tr>";
echo "<td><Center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font color=red><b>".number_format($this->hmoAmount,2)."</b><font>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
}else {
echo "<tr>";
echo "<td><Center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font color=red><b>".number_format($this->hmoAmount,2)."</b><font>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
}
echo "</table>";
echo "<br>";



}






public function getMasterListInventory_requesting($inventoryType,$username,$branch,$description,$requestingDepartment) {


echo "
<style type='text/css'>
.data{
font-size:14px;
}

a { text-decoration:none; color:black; }

tr:hover{ background-color:yellow; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));
if($branch == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where (inventoryType = '$inventoryType' or inventoryLocation='$inventoryType') and description like '$description%%%%%%' and branch='$branch' order by description asc  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where (inventoryType = '$inventoryType' or inventoryLocation='$inventoryType') and description like '$description%%%%%%%' and branch='$branch' order by description asc  ");
}
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Inventory Code</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Generic</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Unit Cost</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>QTY</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Expiration</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Added By</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Date Added</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Time Added</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Inventory Location</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Inventory Type</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Branch</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/medicineRequest2.php?description=$row[description]&requestTo_department=CSR&branch=$branch&requestingDepartment=$requestingDepartment&inventoryCode=$row[inventoryCode]&username=$username'>".$row['description']."</a></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['genericName']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['unitcost']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['expiration']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['addedBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateAdded']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeAdded']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryLocation']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryType']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
//echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editInventory.php?inventoryCode=$row[inventoryCode]&description=$row[description]&genericName=$row[genericName]&unitcost=$row[unitcost]&quantity=$row[quantity]&expiration=$row[expiration]&addedBy=$row[addedBy]&dateAdded=$row[dateAdded]&timeAdded=$row[timeAdded]&inventoryLocation=$row[inventoryLocation]&inventoryType=$row[inventoryType]&branch=$row[branch]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";


}


public $request;


//No. of request
public function request() {
return $this->request;
}


public function getRequest($requestTo_department,$requestTo_branch,$requestingDepartment,$requestingBranch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(verificationNo) as request FROM inventoryManager WHERE requestTo_department = '$requestTo_department' and requestTo_branch = '$requestTo_branch' and requestingDepartment='$requestingDepartment' and requestingBranch = '$requestingBranch' and status='requesting'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['request'];
  }

}


public function getRequest_verificationNo($requestTo_department,$requestTo_branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT verificationNo FROM inventoryManager WHERE requestTo_department = '$requestTo_department' and requestTo_branch = '$requestTo_branch'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['verificationNo'];
  }

}



public function getReceivingRequest($requestingDepartment,$requestingBranch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(verificationNo) as verificationNo FROM inventoryManager WHERE requestingDepartment = '$requestingDepartment' and requestingBranch = '$requestingBranch' and status = 'forReceiving'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['verificationNo'];
  }

}



//check kung mei laboratory result n?
public function checkIfLabResultExist($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT itemNo from laboratoryResults where itemNo='$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return mysqli_num_rows($result);
  }

}


//check kung mei radiology result n?
public function checkIfRadResultExist($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT itemNo from radiologyResults where itemNo='$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return mysqli_num_rows($result);
  }

}


//check kung mei S.O.A.P n?
public function checkIfSoapExist($itemNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT itemNo from SOAP where itemNo='$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return mysqli_num_rows($result);
  }

}



public function showRequestList($requestingDepartment,$requestingBranch,$requestTo_department,$requestTo_branch,$username) {

echo "<style type='text/css'>
#data:hover { background-color:yellow; color:black; }
a { text-decoration:none; color:black; }
.data {
font-size:13px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT description,quantity,requestingUser,dateRequested,timeRequested,requestingDepartment,requestingBranch,verificationNo FROM inventoryManager WHERE requestingDepartment like '$requestingDepartment%%%' and requestingBranch like '$requestingBranch%%%' and requestTo_department like '$requestTo_department%%%' and requestTo_branch like '$requestTo_branch%%%' and status='requesting' order by verificationNo asc   ");

echo "<br><center>";
echo "<table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Decription</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Quantity</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Time Requested</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Date Requested</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Requested By</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Request From</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='data'>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/dispenseRequest.php?description=$row[description]&quantity=$row[quantity]&requestingDepartment=$row[requestingDepartment]&requestingBranch=$row[requestingBranch]&requestingUser=$row[requestingUser]&timeRequested=$row[timeRequested]&dateRequested=$row[dateRequested]&username=$username&verificationNo=$row[verificationNo]'><font class='data'>".$row['description']."</font></a>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeRequested']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateRequested']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['requestingUser']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['requestingDepartment']." of ".$row['requestingBranch']."</font>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";
}



public function getReceivingOfRequest($module,$branch,$username) {

echo "<style type='text/css'>

.data {
font-size:13px;
}

#row:hover {
background-color:yellow; color:black;
}

a { text-decoration:none; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventoryManager where requestingDepartment like '%$module%' and requestingBranch like '%$branch%' and status = 'forReceiving' ");

echo "<center>";
echo "<table border= cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Requested QTY</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Issued QTY</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Issued By</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='row'>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/receivingRequestDetails.php?description=$row[description]&requestedQTY=$row[quantity]&issuedQTY=$row[quantityIssued]&requestTo_department=$row[requestTo_department]&requestTo_branch=$row[requestTo_branch]&issuedBy=$row[issuedBy]&requestingUser=$row[requestingUser]&requestingDepartment=$row[requestingDepartment]&requestingBranch=$row[requestingBranch]&timeRequested=$row[timeRequested]&dateRequested=$row[dateRequested]&dateIssued=$row[dateIssued]&timeIssued=$row[timeIssued]&verificationNo=$row[verificationNo]&inventoryCode=$row[inventoryCode]&username=$username'><font class='data'>".$row['description']."</font></a>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantityIssued']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['requestTo_department']." of ".$row['requestTo_branch']." by ".$row['issuedBy']."</font>&nbsp;</td>";
echo "</tr>";
  }

}



//current inventory ng bawat department
public function getCurrentInventory($module,$username,$branch) {


echo "
<style type='text/css'>
.data{
font-size:12px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from inventory where inventoryLocation='$module' and branch='$branch' order by description asc  ");
echo "<font size=2>Current Inventory As of ".date("M d, Y")." in $module of $branch </font><br><br>";
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Inventory Code</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Generic</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Unit Cost</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>QTY</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Expiration</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Added By</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Date Added</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Time Added</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Inventory Location</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Inventory Type</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Branch</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Transition</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Remarks</font>&nbsp;</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['genericName']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['unitcost']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['expiration']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['addedBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateAdded']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeAdded']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryLocation']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['inventoryType']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['transition']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['remarks']."</font>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editInventory.php?inventoryCode=$row[inventoryCode]&description=$row[description]&genericName=$row[genericName]&unitcost=$row[unitcost]&quantity=$row[quantity]&expiration=$row[expiration]&addedBy=$row[addedBy]&dateAdded=$row[dateAdded]&timeAdded=$row[timeAdded]&inventoryLocation=$row[inventoryLocation]&inventoryType=$row[inventoryType]&branch=$row[branch]&username=$username&transition=$row[transition]&remarks=$row[remarks]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteInventory.php?inventoryCode=$row[inventoryCode]&username=$username&description=$row[description]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";


}





public function getInventoryUsages($month,$day,$year,$module,$username,$branch) {


echo "
<style type='text/css'>
.data{
font-size:12px;
}

tr:hover{ background-color:yellow; color:black; }

</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));
$date = date("M_d_Y");
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT *,pr.completeName from inventory i,patientCharges pc,registrationDetails rd,patientRecord pr where i.inventoryLocation='$module' and pc.branch='$branch' and i.inventoryCode = pc.chargesCode and pc.registrationNo = rd.registrationNo and rd.patientNo = pr.patientNo and (pc.title = 'MEDICINE' or pc.title='SUPPLIES') and pc.departmentStatus like 'dispensedBy%%%%%' order by i.description asc  ");
echo "<font size=2>Current Inventory Usages As of ".$month."_".$day."_".$year." in $module of $branch </font><br><br>";
echo "<center><table border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font class='data'>Name</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Generic</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Date</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>QTY</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Charge By</font>&nbsp;</th>";
echo "<th>&nbsp;<font class='data'>Dispensed By</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['completeName']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['genericName']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$deptStatus['1']."</font>&nbsp;</td>";
/*
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editInventory.php?inventoryCode=$row[inventoryCode]&description=$row[description]&genericName=$row[genericName]&unitcost=$row[unitcost]&quantity=$row[quantity]&expiration=$row[expiration]&addedBy=$row[addedBy]&dateAdded=$row[dateAdded]&timeAdded=$row[timeAdded]&inventoryLocation=$row[inventoryLocation]&inventoryType=$row[inventoryType]&branch=$row[branch]&username=$username&transition=$row[transition]&remarks=$row[remarks]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteInventory.php?inventoryCode=$row[inventoryCode]&username=$username&description=$row[description]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
*/
echo "</tr>";
  }
echo "</table>";


}


public $dateReceived;
public $dateReleased;
public $itemNo;
public $labNo;
public $pathologist;
public $medTech;
public $resultBranch;
public $remarks;


public function getDateReceived() {
return $this->dateReceived;
}

public function getDateReleased() {
return $this->dateReleased;
}

public function getItemNo() {
return $this->itemNo;
}

public function getLabNo() {
return $this->labNo;
}

public function getPathologist()  {
return $this->pathologist;
}

public function getMedTech() {
return $this->medTech;
}

public function getResultBranch() {
return $this->resultBranch;
}

public function getResultRemarks() {
return $this->remarks;
}

//get lab,rad result ng px
public function getMyResults($labNo,$username) {


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from laboratoryResults where labNo = '$labNo'  ");

while($row = mysqli_fetch_array($result))
  {
$this->dateReceived = $row['dateReceived'];
$this->dateReleased = $row['dateReleased'];
$this->itemNo = $row['itemNo'];
$this->labNo = $row['labNo'];
$this->pathologist = $row['pathologist'];
$this->medTech = $row['medTech'];
$this->resultBranch = $row['Branch'];
$this->remarks = $row['remarks'];
  }


}


public function getResult_labNo($itemNo){

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from laboratoryResults where itemNo = '$itemNo'  ");

while($row = mysqli_fetch_array($result))
  {
return $row['labNo'];
  }

}


public $labResult_remarks;
public $labResult_dateReceived;
public $labResult_dateReleased;

public $labResult_labNo;
public $labResult_registrationNo;
public $labResult_itemNo;
public $labResult_description;
public $labResult_pathologist;
public $labResult_medTech;
public $labResult_receivedMonth;
public $labResult_receivedDay;
public $labResult_receivedYear;
public $labResult_releasedMonth;
public $labResult_releasedDay;
public $labResult_releasedYear;
public $labResult_branch;

public function getValueForEdit($labNo) {

echo "
<style type='text/css'>

#data:hover { background-color:yellow; color:black; }

a { text-decoration:none; color:red; }

.examName {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 200px;
	padding:4px 4px 4px 5px;
}

.examResult {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 100px;
	padding:4px 4px 4px 5px;
}

.txtArea {
	border: 1px solid #000;
	color: #000;
	height: 120px;
	width: 550px;
	padding:4px 4px 4px 5px;
}

</style>

";

echo "<link rel='stylesheet' type='text/css' href='http://".$this->getMyUrl()."/COCONUT/myCSS/coconutCSS.css' />";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT lrv.*,lr.*,pc.description from laboratoryResultsValue lrv,laboratoryResults lr,patientCharges pc where lrv.labNo = lr.labNo and lr.labNo='$labNo' and pc.itemNo = lr.itemNo  ");
echo "<form method='get' action='editResultRemarks.php'>";
echo "<center><br><div style='border:1px solid #000000; width:650px; height:auto; border-color:black black black black;'>";
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<th></th>";
echo "<th></th>";
echo "<th>Examination Name</th>";
echo "<th>Result</th>";
echo "<th>Flag</th>";
echo "<th>Normal Values</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='data'>";
$this->labResult_remarks = $row['remarks'];
$dateReceived = preg_split ("/\_/", $row['dateReceived']); 
$dateReleased = preg_split ("/\_/", $row['dateReleased']); 
$this->labResult_dateReceived = preg_split ("/\_/", $row['dateReceived']);
$this->labResult_dateReleased = preg_split ("/\_/", $row['dateReleased']);


$this->labResult_labNo = $row['labNo'];
$this->labResult_registrationNo = $row['registrationNo'];
$this->labResult_itemNo = $row['itemNo'];
$this->labResult_description = $row['description'];
$this->labResult_pathologist = $row['pathologist'];
$this->labResult_medTech = $row['medTech'];
$this->labResult_branch = $row['Branch'];

echo "<input type=hidden name='labNo' value='".$row['labNo']."' checked>";
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/Results/deleteSingleValues.php?valuesNo=$row[valuesNo]&labNo=$row[labNo]&registrationNo=$row[registrationNo]&itemNo=$row[itemNo]&description=$row[description]&pathologist=$row[pathologist]&medTech=$row[medTech]&receivedMonth=$dateReceived[0]&receivedDay=$dateReceived[1]&receivedYear=$dateReceived[2]&releasedMonth=$dateReleased[0]&releasedDay=$dateReleased[1]&releasedYear=$dateReleased[2]&branch=$row[Branch]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/Results/singleValues.php?valuesNo=$row[valuesNo]&examName=$row[examName]&examResult=$row[examResult]&flag=$row[examFlag]&examValues=$row[examValue]&labNo=$row[labNo]&registrationNo=$row[registrationNo]&itemNo=$row[itemNo]&description=$row[description]&pathologist=$row[pathologist]&medTech=$row[medTech]&receivedMonth=$dateReceived[0]&receivedDay=$dateReceived[1]&receivedYear=$dateReceived[2]&releasedMonth=$dateReleased[0]&releasedDay=$dateReleased[1]&releasedYear=$dateReleased[2]&branch=$row[Branch]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg' />
</a></center></td>";
echo "<td><input type=text class='examName' value='".$row['examName']."' readonly></td>";
echo "<td><input type=text class='examResult' value='".$row['examResult']."' readonly></td>";
echo "<td><select class='comboBoxShort'>";
echo "<option value='".$row['examFlag']."'>".$row['examFlag']."</option>";
echo "</select></td>";
echo "<td><input type=text class='examName' value='".$row['examValue']."' readonly></td>";
echo "</tr>";  
}
echo "</table>";
echo "<a href='http://".$this->getMyUrl()."/COCONUT/Results/singleValues_new.php?labNo=".$this->labResult_labNo."&registrationNo=".$this->labResult_registrationNo."&itemNo=".$this->labResult_itemNo."&description=".$this->labResult_description."&pathologist=".$this->labResult_pathologist."&medTech=".$this->labResult_medTech."&receivedMonth=".$this->labResult_dateReceived[0]."&receivedDay=".$this->labResult_dateReceived[1]."&receivedYear=".$this->labResult_dateReceived[2]."&releasedMonth=".$this->labResult_dateReleased[0]."&releasedDay=".$this->labResult_dateReleased[1]."&releasedYear=".$this->labResult_dateReleased[2]."&branch=".$this->labResult_branch."'>Add Another Examination Name</a>";

echo "<br><br>";
echo "<font size=2>Comments/Remarks</font><br>";
echo "<textarea class='txtArea' name='remarks'>".$this->labResult_remarks."</textarea>";
echo "<br><br><input type=submit value='Proceed'>";
echo "</div>";
}




public $flagSwitch; //switch pra sa legends ng flag

//ippkta ung list ng laboratory result ng px
public function getExamResults_result($registrationNo,$labNo,$username,$description) {

echo "
<style type='text/css'>
.data{
font-size:12px;
}

#row:hover{ background-color:yellow; color:black; }

a { text-decoration:none; color:black; }

.fieldz {

	border: 1px solid #fff;
	color: #000;
	height: 20px;
	width: 320px;
	padding:4px 4px 4px 5px;
	font-size:9px;

}

.fieldzPatientz {

	border: 1px solid #fff;
	color: #000;
	height: 20px;
	width: 320px;
	padding:4px 4px 4px 5px;
	font-size:12px;

}

.shortFieldz {

	border: 1px solid #fff;
	color: #000;
	height: 20px;
	width: 40px;
	padding:4px 4px 4px 5px;
	font-size:12px;

}

</style>

";

echo "<link rel='stylesheet' type='text/css' href='http://".$this->getMyUrl()."/COCONUT/myCSS/coconutCSS.css' />";
$this->getMyResults($labNo,$username);
$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><div style='border:1px solid #000000; width:500px; height:auto; border-color:black black black black;'>";
echo "<Center><font size=2><b>".$this->getReportInformation("hmoSOA_name").".<br><font size=2>(".$this->getResultBranch()." Branch)</font><br>&nbsp;".$this->getReportInformation("hmoSOA_address")."</b></font>";
$this->getPatientProfile($registrationNo);
echo "";
echo "<center><br>
<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td><font class='labelz'>Lab#</font></td>
<td><input type=text class='shortFieldz' value='$labNo'</td>
<td><font class='labelz'>Item#</font></td>
<td><input type=text class='shortFieldz' value='".$this->getItemNo()."'</td>
<td><font class='labelz'>Registration#</font></td>
<td><input type=text class='shortFieldz' value='".$registrationNo."'</td>
</tr>
</table>
<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td><font class='labelz'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient</font></td>
<td><input type=text class='fieldzPatientz' value='".$this->getPatientRecord_completeName()."'</td>
</tr>
<tr>
<td><font class='labelz'>Date Received</font></td>
<td><input type=text class='fieldz' value='".$this->getDateReceived()."'</td>
</tr>
<tr>
<td><font class='labelz'>Date Released</font></td>
<td><input type=text class='fieldz' value='".$this->getDateReleased()."'</td>
</tr>
</table><br>
<b>$description</b>
<br><table border=1 rules=all cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<th>&nbsp;<font size=2>Exam Name</font>&nbsp;</th>";
echo "<th>&nbsp;<font size=2>Result</font>&nbsp;</th>";
echo "<th>&nbsp;<font size=2>Flag</font>&nbsp;</th>";
echo "<th>&nbsp;<font size=2>Normal Values</font>&nbsp;</th>";

echo "</tr>";
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from laboratoryResultsValue where labNo='$labNo'  ");

while($row = mysqli_fetch_array($result))
  {

//switch pra mLaman kung keLan iLLbas ung Legends ng Flag
if($row['examFlag'] != "") {
$this->flagSwitch="on";
}else {
$this->flagSwitch="off";
}

echo "<tr id='row'>";
echo "<td>&nbsp;<font size=2>".$row['examName']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".$row['examResult']."</font>&nbsp;</td>";
if($row['examFlag'] != "") {
echo "<td>&nbsp;<font size=2><b>(".$row['examFlag'].")</b></font>&nbsp;</td>";
}else {
echo "<td>&nbsp;</td>";
}
echo "<td>&nbsp;<font size=2>".$row['examValue']."</font>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";
echo "<br><br>"; 

if($this->getResultRemarks() != "") {
echo "<font size=1>Comments/Remarks</font>";
echo "<div style='border:1px solid #000000; width:410px; padding:2px 2px 20px 2px; height:auto; border-color:black black black black;'>";
echo "<br><font size=2>".$this->getResultRemarks()."</font>";

echo "</div>";
echo "<br><br>";
}else {
echo "";
}
if($this->flagSwitch == "on") {
echo "<div style='border:1px solid #000000; width:410px; height:25px; border-color:black black black black;'>";
echo "<font size=1><b>c* = Comment</b></font>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1><b>C = Critical</b></font>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1><b>L = Low</b></font>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1><b>H = High</b></font>";
echo "</div>";
}else {
echo "";
}
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<td><u>&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>".$this->getPathologist()."</font>&nbsp;&nbsp;&nbsp;&nbsp;</u><br><font size=2>Pathologist</font></td>";
echo "<td>&nbsp;&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<td><u>&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>".$this->getMedTech()."</font>&nbsp;&nbsp;&nbsp;&nbsp;</u><br><font size=2>Medical Technician</font></td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}



public function getExamResults($title,$registrationNo,$username) {

echo "
<style type='text/css'>
.data{
font-size:12px;
color:white;
}

tr:hover{ background-color:yellow; color:black; }

a { text-decoration:none; color:black; }

</style>

";



$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.description,lr.labNo,lr.pathologist,lr.dateReceived,lr.dateReleased,lr.medTech,lr.Branch,lr.itemNo from laboratoryResults lr,patientCharges pc where pc.registrationNo = '$registrationNo' and pc.itemNo = lr.itemNo and pc.title='$title'  ");

echo "<center><table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "</tr>";

if($username != "") {
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'></font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'></font></th>";
}else {

}
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;</font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;Lab#&nbsp;</font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;Description&nbsp;</font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;Pathologist&nbsp;</font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;Med Tech&nbsp;</font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;Date Received&nbsp;</font></th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>&nbsp;Date Released&nbsp;</font></th>";
echo "</th>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/Results/laboratoryResult.php?registrationNo=$registrationNo&username=$username&labNo=$row[labNo]&pathologist=$row[pathologist]&medTech=$row[medTech]&dateReceived=$row[dateReceived]&dateReleased=$row[dateReleased]&description=$row[description]'>&nbsp;<font color='red' size='3'>View</font>&nbsp;</a></td>";
if($username != "") {
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDeleteResults.php?description=$row[description]&labNo=$row[labNo]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";


echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/Results/editResult.php?labNo=$row[labNo]&description=$row[description]&pathologist=$row[pathologist]&medTech=$row[medTech]&dateReceived=$row[dateReceived]&dateReleased=$row[dateReleased]&branch=$row[Branch]&registrationNo=$registrationNo&username=$username&itemNo=$row[itemNo]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg' />
</a></center></td>";
}else {

}

echo "<td>&nbsp;<font size=2>".$row['labNo']."</font>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/laboratoryResult.php?registrationNo=$registrationNo&username=$username&labNo=$row[labNo]&pathologist=$row[pathologist]&medTech=$row[medTech]&dateReceived=$row[dateReceived]&dateReleased=$row[dateReleased]&description=$row[description]'><font size=2>".$row['description']."</font></a>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".$row['pathologist']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".$row['medTech']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".$row['dateReceived']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".$row['dateReleased']."</font>&nbsp;</td>";
echo "</tr>";
  }

}


public function insert_laboratoryResult($labNo,$itemNo,$registrationNo,$dateReceived,$dateReleased,$pathologist,$medTech,$remarks,$branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO laboratoryResults (labNo,itemNo,registrationNo,dateReceived,dateReleased,pathologist,medTech,remarks,branch)
VALUES
('$labNo','$itemNo','$registrationNo','$dateReceived','$dateReleased','$pathologist','$medTech','$remarks','$branch')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function insert_laboratoryResultValue($labNo,$examName,$examResult,$examFlag,$examValue,$remarks) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO laboratoryResultsValue (labNo,examName,examResult,examFlag,examValue,remarks)
VALUES
('$labNo','$examName','$examResult','$examFlag','$examValue','$remarks')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



public function insert_soap($itemNo,$registrationNo,$subjective,$objective,$assessment,$plan) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO SOAP (itemNo,registrationNo,subjective,objective,assessment,plan)
VALUES
('$itemNo','$registrationNo','$subjective','$objective','$assessment','$plan')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public function addFloor($floor,$branch,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO floor (description,branch)
VALUES
('$floor','$branch')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

echo "<script type='text/javascript' >";
echo "alert('$floor was successfully added in $branch branch');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/floor/addFloor.php?username=$username '";
echo "</script>";

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}

public function radioResult_insert($itemNo,$registrationNo,$radiologist,$medTech,$dateReceived,$dateReleased,$impression,$branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO radiologyResults (itemNo,registrationNo,radiologist,medTech,dateReceived,dateReleased,impression,branch)
VALUES
('$itemNo','$registrationNo','$radiologist','$medTech','$dateReceived','$dateReleased','$impression','$branch')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
/*
echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php '";
echo "</script>";
*/
((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


public $radResult_radioNo;
public $radResult_itemNo;
public $radResult_registrationNo;
public $radResult_radiologist;
public $radResult_medTech;
public $radResult_dateReceived;
public $radResult_dateReleased;
public $radResult_impression;
public $radResult_branch;

public function radResult_radioNo() {
return $this->radResult_radioNo;
}
public function radResult_itemNo() {
return $this->radResult_itemNo;
}
public function radResult_registrationNo() {
return $this->radResult_registrationNo;
}
public function radResult_radiologist() {
return $this->radResult_radiologist;
}
public function radResult_medTech() {
return $this->radResult_medTech;
}
public function radResult_dateReceived() {
return $this->radResult_dateReceived;
}
public function radResult_dateReleased() {
return $this->radResult_dateReleased;
}
public function radResult_impression() {
return $this->radResult_impression;
}
public function radResult_branch() {
return $this->radResult_branch;
}

//kkuhain ung radio result
public function getRadioResult($itemNo,$registrationNo){

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from radiologyResults where itemNo = '$itemNo' and registrationNo='$registrationNo'  ");

while($row = mysqli_fetch_array($result))
  {
$this->radResult_radioNo = $row['radioNo'];
$this->radResult_itemNo = $row['itemNo'];
$this->radResult_registrationNo = $row['registrationNo'];
$this->radResult_radiologist = $row['radiologist'];
$this->radResult_medTech = $row['medTech'];
$this->radResult_dateReceived = $row['dateReceived'];
$this->radResult_dateReleased = $row['dateReleased'];
$this->radResult_impression = $row['impression'];
$this->radResult_branch = $row['branch'];
 
  }

}



public function showRadioResult_listed($registrationNo,$username) {

echo "
<style type='text/css'>
.data{
font-size:12px;
color:white;
}

tr:hover{ background-color:yellow; color:black; }

a { text-decoration:none; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rr.*,pc.*,rd.* from radiologyResults rr,patientCharges pc,registrationDetails rd where rd.registrationNo = pc.registrationNo and pc.itemNo = rr.itemNo and pc.registrationNo='$registrationNo'  ");

echo "<center><table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";

if($username != "") {
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'></font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'></font>&nbsp;</th>";
}else {

}
echo "<th bgcolor='#3b5998'>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Radio#</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Radiologist</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Med Tech</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Date Received</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Date Released</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/resultReport.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>&nbsp;<font size=3 color=red>View</font>&nbsp;</a></td>";
if($username != "") {
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDeleteRadioResults.php?description=$row[description]&radioNo=$row[radioNo]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";

echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/editRadioResult.php?registrationNo=$row[registrationNo]&itemNo=$row[itemNo]&description=$row[description]&username=$username'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg' />
</a></center></td>";
}else {

}


 echo "<td>&nbsp;<font size=2>".$row['radioNo']."</font>&nbsp;</td>";
 echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/resultReport.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'><font size=2>".$row['description']."</font></a>&nbsp;</td>";
 echo "<td>&nbsp;<font size=2>".$row['radiologist']."</font>&nbsp;</td>";
 echo "<td>&nbsp;<font size=2>".$row['medTech']."</font>&nbsp;</td>";
 echo "<td>&nbsp;<font size=2>".$row['dateReceived']."</font>&nbsp;</td>";
 echo "<td>&nbsp;<font size=2>".$row['dateReleased']."</font>&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}

public $totalPat;

public function totalPat() {
return $this->totalPat;
}

public function getDoctorPatient($doctor,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$branch,$type) {

echo "<style type='text/css'>
#data:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
color:white;
}
a { text-decoration:none; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

$fromTime = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTime = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.itemNo,rd.registrationNo,pc.service,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName from registrationDetails rd,patientCharges pc,patientRecord pr where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.type='$type' and pc.description = '$doctor' and (pc.timeCharge between '$fromTime' and '$toTime' ) and pc.dateCharge like '$month%$day%$year' and pc.departmentStatus not like 'doneBy%%%%%' order by lastName asc   ");

echo "<center><font size=2>$doctor</font><div style='border:1px solid #000000; width:500px; height:auto; border-color:black black black black;'>";
echo "<br>";
echo "<table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'><font class='data'>Patient</font></th>";
echo "<th bgcolor='#3b5998'><font class='data'>Service</font></th>";
echo "<th bgcolor='#3b5998'><font class='data'></font></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='data'>";
$this->totalPat++;
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?username=$username&registrationNo=$row[registrationNo]' target='_blank'><font size=2>".$row['lastName'].", ".$row['firstName']."</font></a>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".$row['service']."</font>&nbsp;</td>";
echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/Doctor/donePatient.php?itemNo=$row[itemNo]&doctor=$doctor&month=$month&day=$day&year=$year&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&branch=$branch'>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/check.jpeg'>&nbsp;</a></td>";
echo "</tr>";
  }
echo "</table>";
echo "<font size=2>Patient: </font><font size=2 color=red>".$this->totalPat."</font>";
echo "<br><br>";
echo "</div>";
}


public function getDoctorPatient_ipd($doctorName,$type,$username) {

echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
color:black;
}
.rowzData {
font-size:15px;
}
a {
text-decoration:none;
color:black;
}
</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.room,pc.service from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.type='$type' and pc.description = '$doctorName' and rd.dateUnregistered = '' order by pr.lastName,pc.service asc ");

echo "<font size=2>$doctorName</font>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Room");
$this->coconutTableHeader("Service");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<tR id='rowz'>";
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?username=$username&registrationNo=$row[registrationNo]' target='_blank'><font class='rowzData'>".$row['lastName'].", ".$row['firstName']."</font></a>");
$this->coconutTableData("<font class='rowzData'>".$row['room']."</font>");
$this->coconutTableData("<font class='rowzData'>".$row['service']."</font>");
echo "</tr>";
  }

$this->coconutTableStop();

}

public $doctorDischargedReport_amount;
public $doctorDischargedReport_pf;

public function doctorDischargedReport($m,$d,$y,$m1,$d1,$y1,$doctorName,$type,$username) {

echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
color:black;
}
.rowzData {
font-size:15px;
}
a {
text-decoration:none;
color:black;
}
</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.room,pc.service,rd.dateUnregistered,pc.sellingPrice from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.type='$type' and pc.description = '$doctorName' and (rd.dateUnregistered between '$fromDate' and '$toDate') order by pr.lastName,pc.service asc ");

echo "<Center>";
echo "<font size=2>$doctorName</font><br>";
echo "<font size=2>($m $d, $y - $m1 $d1, $y1)</font>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Room");
$this->coconutTableHeader("Service");
$this->coconutTableHeader("Total Amount/PF");
$this->coconutTableHeader("Discharged");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
$this->doctorDischargedReport_amount += $price[0];
$this->doctorDischargedReport_pf += $price[1];
echo "<tR id='rowz'>";
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?username=$username&registrationNo=$row[registrationNo]' target='_blank'><font class='rowzData'>".$row['lastName'].", ".$row['firstName']."</font></a>");
$this->coconutTableData("<font class='rowzData'>".$row['room']."</font>");
$this->coconutTableData("<font class='rowzData'>".$row['service']."</font>");
$this->coconutTableData("<font class='rowzData'>".$row['sellingPrice']."</font>");
$this->coconutTableData("<font class='rowzData'>".$row['dateUnregistered']."</font>");
echo "</tr>";
  }
echo "<tr>";
echo "<td><Center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</tD>";
echo "<Td>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>".number_format($this->doctorDischargedReport_amount,2)."</font> <font color=red>/</font> <font size=2>".number_format($this->doctorDischargedReport_pf,2)."</font>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
$this->coconutTableStop();

}



public $soap_soapNo;
public $soap_subjective;
public $soap_objective;
public $soap_assessment;
public $soap_plan;
public $soap_date;
public $soap_description;
public $soap_service;


public function soap_soapNo() {
return $this->soap_soapNo;
}

public function soap_subjective() {
return $this->soap_subjective;
}

public function soap_objective() {
return $this->soap_objective;
}

public function soap_assessment() {
return $this->soap_assessment;
}

public function soap_plan() {
return $this->soap_plan;
}

public function soap_date() {
return $this->soap_date;
}

public function soap_description() {
return $this->soap_description;
}

public function soap_service() {
return $this->soap_service;
}

public function getSOAP($itemNo,$registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT s.*,pc.* from SOAP s,patientCharges pc where s.itemNo = pc.itemNo and s.itemNo='$itemNo' and s.registrationNo = '$registrationNo'   ");

while($row = mysqli_fetch_array($result))
  {
$this->soap_description = $row['description'];
$this->soap_service = $row['service'];
$this->soap_date = $row['dateCharge'];
$this->soap_soapNo = $row['soapNo'];
$this->soap_subjective = $row['subjective'];
$this->soap_objective = $row['objective'];
$this->soap_assessment = $row['assessment'];
$this->soap_plan = $row['plan'];
 
  }

}



public function showSOAP_listed($registrationNo,$username) {

echo "
<style type='text/css'>
.data{
font-size:12px;
color:white;
}

tr:hover{ background-color:yellow; color:black; }

a { text-decoration:none; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT s.*,pc.*,rd.* from SOAP s,patientCharges pc,registrationDetails rd where rd.registrationNo = pc.registrationNo and pc.itemNo = s.itemNo and pc.registrationNo='$registrationNo'  ");

echo "<center><table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
if($username != "") {
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'></font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'></font>&nbsp;</th>";
}else {

}
echo "<th bgcolor='#3b5998'>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>S.O.A.P#</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Description</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Doctor</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='data'>Date</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]'>&nbsp;<font size='3' color='red'>View</font>&nbsp;</a></td>";
if($username != "") {
echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDeleteSOAP.php?description=$row[description]&soapNo=$row[soapNo]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></center></td>";


echo "<td><center><a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?registrationNo=$row[registrationNo]&itemNo=$row[itemNo]'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg' />
</a></center></td>";
}else {

}


 echo "<td>&nbsp;<font size=2>".$row['soapNo']."</font>&nbsp;</td>";
 echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]'><font size=2>".$row['service']."</font></a>&nbsp;</td>";
 echo "<td>&nbsp;<font size=2>".$row['description']."</font>&nbsp;</td>";
 echo "<td>&nbsp;<font size=2>".$row['dateCharge']."</font>&nbsp;</td>";

echo "</tr>";
  }
echo "</table>";

}


public $pf_amount;
public $pf_pf;
public $docPatient;

public function getDoctorPatientReport($username,$doctor,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds) {

echo "<style type='text/css'>


.dataz{
font-size:14px;
color:white;
}

#tableRow:hover { background-color:yellow; color:black; }

a { text-decoration:none; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,pc.service,pc.sellingPrice from patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.description ='$doctor' and pc.departmentStatus like 'doneBy_$doctor' and pc.dateCharge like '$month%$day%$year' and (pc.departmentStatus_time between '$fromTime_hour:$fromTime_minutes:$fromTime_seconds' and '$toTime_hour:$toTime_minutes:$toTime_seconds') order by lastName asc    ");

echo "<center><font size=2>Dr.$doctor</font><table border=1 cellpadding=0 cellspacing=0  rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>No.</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Reg#</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Patient</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Service</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Amount</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>PF</font>&nbsp;</th>";
echo "</tr>";
$this->docPatient = 1;
while($row = mysqli_fetch_array($result))
  {
$amount = preg_split ("/\//", $row['sellingPrice']); 

echo "<tr id='tableRow'>";
echo "<td>&nbsp;".$this->docPatient++."&nbsp;</td>";
echo "<td>&nbsp;".$row['registrationNo']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?registrationNo=$row[registrationNo]&username=$username' target='_blank'>".$row['lastName'].", ".$row['firstName']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['service']."&nbsp;</td>";
echo "<td>&nbsp;".$amount[0]."&nbsp;</td>";
echo "<td>&nbsp;".$amount[1]."&nbsp;</td>";

$this->pf_amount+=$amount[0];
$this->pf_pf+=$amount[1];
echo "</tr>";
 
  }
echo "</tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<b>TOTAL</b></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font size=2><b>".number_format($this->pf_amount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2><b>".number_format($this->pf_pf,2)."</b></font>&nbsp;</td>";
echo "<tr>";
echo "</table>";

}


public $pfReport_amount;
public $pfReport_pf;


public function getDoctorPFReport($type,$username,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds) {

echo "<style type='text/css'>


.dataz{
font-size:14px;
color:white;
}

#tableRow:hover { background-color:yellow; color:black; }

a { text-decoration:none; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.description,rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,pc.service,pc.sellingPrice from patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.departmentStatus like 'doneBy_%%%%' and pc.dateCharge like '$month%$day%$year' and (pc.departmentStatus_time between '$fromTime_hour:$fromTime_minutes:$fromTime_seconds' and '$toTime_hour:$toTime_minutes:$toTime_seconds') and rd.type='$type' order by lastName asc    ");

echo "<center><font size=2></font><table border=1 cellpadding=0 cellspacing=0  rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>No.</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Reg#</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Patient</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Doctor</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Service</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>Amount</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='dataz'>PF</font>&nbsp;</th>";
echo "</tr>";
$this->docPatient = 1;
while($row = mysqli_fetch_array($result))
  {
$amount = preg_split ("/\//", $row['sellingPrice']); 

echo "<tr id='tableRow'>";
echo "<td>&nbsp;".$this->docPatient++."&nbsp;</td>";
echo "<td>&nbsp;".$row['registrationNo']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?registrationNo=$row[registrationNo]&username=$username' target='_blank'>".$row['lastName'].", ".$row['firstName']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['description']."&nbsp;</td>";
echo "<td>&nbsp;".$row['service']."&nbsp;</td>";
echo "<td>&nbsp;".$amount[0]."&nbsp;</td>";
echo "<td>&nbsp;".$amount[1]."&nbsp;</td>";

$this->pfReport_amount+=$amount[0];
$this->pfReport_pf+=$amount[1];
echo "</tr>";
 
  }
echo "</tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font size=2><b>".number_format($this->pfReport_amount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2><b>".number_format($this->pfReport_pf,2)."</b></font>&nbsp;</td>";
echo "<tr>";
echo "</table>";

}


public $docPF_docPF_branch;
//kkunin ung pf ni doc sa bawat branch
public function getDoctorPFbyBranch($type,$doctor,$branch,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear){

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

$fromDate = $fromMonth."_".$fromDay."_".$fromYear;
$toDate = $toMonth."_".$toDay."_".$toYear;

((bool)mysqli_query( $con, "USE " . $this->database));


if($type == "OPD") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.sellingPrice from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = pc.registrationNo and pc.description = '$doctor' and pc.cashPaid is not null and (pc.dateCharge between '$fromDate' and '$toDate') and pc.branch = '$branch' and rd.type='$type'  ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.sellingPrice from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = pc.registrationNo and pc.description = '$doctor' and rd.dateUnregistered != '' and (rd.dateUnregistered between '$fromDate' and '$toDate') and pc.branch = '$branch' and rd.type='$type'  ");
}

$this->docPF_docPF_branch=0;
while($row = mysqli_fetch_array($result))
  {
$pf_branch = preg_split ("/\//", $row['sellingPrice']); 
return $this->docPF_docPF_branch+=$pf_branch[1];
  }

}


public $docTotalPF_branches;

public function docTotalPF_branches() {
return $this->docTotalPF_branches;
}

//ITO UNG MGGING ROW SA REPORT N ANG LAMAN IS UNG TOTAL PF NG BWAT DOCTOR
public function reportRowBranch_PF($type,$doctor,$m,$d,$y,$m1,$d1,$y1) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

$this->docTotalPF_branches=0;
while($row = mysqli_fetch_array($result))
  {
if($this->getDoctorPFbyBranch($type,$doctor,$row['branch'],$m,$d,$y,$m1,$d1,$y1) > 0) {
echo "<td>&nbsp;".number_format($this->getDoctorPFbyBranch($type,$doctor,$row['branch'],$m,$d,$y,$m1,$d1,$y1),2)."&nbsp;</td>";
}else {
echo "<td>&nbsp;</tD>";
}
$this->docTotalPF_branches+=$this->getDoctorPFbyBranch($type,$doctor,$row['branch'],$m,$d,$y,$m1,$d1,$y1);
  }
echo "<Td><center><b>".number_format($this->docTotalPF_branches(),2)."</b></center></td>";
}

//ILLBAS UNG LIST NG DOCTOR AS TABLE ROW
public function listDoctorAsRow($type,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear){

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from Doctors order by Name asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<tr id='docPF'>";
echo "<td>&nbsp;".$row['Name']."&nbsp;</td>";
$this->reportRowBranch_PF($type,$row['Name'],$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear);
echo "</tr>";
  }


}




public function getPatientbyBranch($switch,$title,$type,$branch,$examination,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear){

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

$fromDate = $fromMonth."_".$fromDay."_".$fromYear;
$toDate = $toMonth."_".$toDay."_".$toYear;

((bool)mysqli_query( $con, "USE " . $this->database));

if($switch == 1) { // per patient
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(pc.registrationNo) as totalPatient from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = pc.registrationNo and (pc.dateCharge between '$fromDate' and '$toDate') and pc.branch = '$branch' and rd.type='$type' and (pc.status='PAID' or pc.status='APPROVED') and pc.description = '$examination' and pc.title='$title' group by pc.registrationNo,pc.branch ");
}else { // per examination
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT count(pc.registrationNo) as totalPatient from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = pc.registrationNo and (pc.dateCharge between '$fromDate' and '$toDate') and pc.branch = '$branch' and rd.type='$type' and (pc.status='PAID' or pc.status='APPROVED') and pc.description = '$examination' and pc.title='$title' ");
}

while($row = mysqli_fetch_array($result))
  {
return $row['totalPatient'];
  }

}



public $censusPatient_patient;
public function reportRowBranch_patientCensus($switch,$title,$type,$examination,$m,$d,$y,$m1,$d1,$y1) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

$this->censusPatient_patient=0;
while($row = mysqli_fetch_array($result))
  {
echo "<td><center>&nbsp;".$this->getPatientByBranch($switch,$title,$type,$row['branch'],$examination,$m,$d,$y,$m1,$d1,$y1)."&nbsp;</center></td>";
$this->censusPatient_patient+=$this->getPatientByBranch($switch,$title,$type,$row['branch'],$examination,$m,$d,$y,$m1,$d1,$y1);
}
if($this->censusPatient_patient > 0) {
echo "<td><Center><b>".$this->censusPatient_patient."</b></center></tD>";
}else {
echo "<td>&nbsp;</td>";
}
}


public function listExaminationAsRow($switch,$title,$type,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear){

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT Description from availableCharges WHERE Category = '$title' order by Description asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<tr id='docPF'>";
echo "<td>&nbsp;".$row['Description']."&nbsp;</td>";
$this->reportRowBranch_patientCensus($switch,$title,$type,$row['Description'],$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear);
echo "</tr>";
  }
}


public function getTotalListHMO($hmo,$branch,$m,$d,$y,$m1,$d1,$y1,$type) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.company) as total from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = pc.registrationNo and rd.Company = '$hmo' and rd.type='$type' and pc.company > 0 and (pc.dateCharge between '$fromDate' and '$toDate') and pc.branch = '$branch'  ");


while($row = mysqli_fetch_array($result))
  {
return $row['total'];
}

}


public $listHMO_total;
public function reportRowBranch_listHMO($hmo,$m,$d,$y,$m1,$d1,$y1,$type) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT branch from branch order by branch asc  ");

$this->listHMO_total=0;
while($row = mysqli_fetch_array($result))
  {
if($this->getTotalListHMO($hmo,$row['branch'],$m,$d,$y,$m1,$d1,$y1,$type) > 0) {
echo "<td><center>&nbsp;".number_format($this->getTotalListHMO($hmo,$row['branch'],$m,$d,$y,$m1,$d1,$y1,$type),2)."&nbsp;</center></td>";
}else {
echo "<td><center>&nbsp;&nbsp;</center></td>";
}
$this->listHMO_total+=$this->getTotalListHMO($hmo,$row['branch'],$m,$d,$y,$m1,$d1,$y1,$type);
}

if($this->listHMO_total > 0) {
echo "<td>&nbsp;<b>".number_format($this->listHMO_total,2)."</b>&nbsp;</td>";
}else {
echo "<td>&nbsp;</td>";
}
}


public function listHMO($fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,$type) {

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT companyName from Company WHERE companyName != '' order by companyName asc  ");

while($row = mysqli_fetch_array($result))
  {
echo "<tr id='docPF'>";
echo "<td>&nbsp;".$row['companyName']."&nbsp;</td>";
$this->reportRowBranch_listHMO($row['companyName'],$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,$type);
echo "</tr>";
  }

}


//handle the total in soa in every header
public $soa_discount;
public $soa_sellingPrice;
public $soa_total;
public $soa_cash;
public $soa_pfCash;
public $soa_company;
public $soa_paid;
public $soa_cashUnpaid;
public $soa_phic;



public function soa_discount() {
return $this->soa_discount;
}
public function soa_sellingPrice() {
return $this->soa_sellingPrice;
}
public function soa_total() {
return $this->soa_total;
}
public function soa_cash() {
return $this->soa_cash;
}
public function soa_pfCash() {
return $this->soa_pfCash;
}
public function soa_company() {
return $this->soa_company;
}
public function soa_paid() {
return $this->soa_paid;
}
public function soa_cashUnpaid() {
return $this->soa_cashUnpaid;
}
public function soa_phic() {
return $this->soa_phic;
}

public function chargesForSOA($registrationNo,$show,$data1,$data2) {

echo "<style type='text/css'>
.heading {
font-size:13px;
}

#charges:hover { background-color:yellow; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and pc.registrationNo = rd.registrationNo order by description asc  ");
}else if($show == "Date") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and (dateCharge between '$data1' and '$data2') order by pc.description asc  ");
}else if($show == "Category") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and title='$data1' order by description asc  ");
}else if($show == "phic") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and phic > 0 order by description asc  ");
}else if($show == "company") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and pc.company > 0 order by pc.description asc  ");
}else if($show == "cashPaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and cashPaid > 0 order by description asc  ");
}else if($show == "cashUnpaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and cashUnpaid > 0 order by description asc  ");
}else if($show == "selected") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and itemNo='$data1' order by description asc  ");
}else {
echo "";
}
echo "<Table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th width='30%'>&nbsp;<font class='heading'><b>Particulars</b></font>&nbsp;</th>";
echo  "<th width='20%'>&nbsp;<font class='heading'><b>QTY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PRICE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DATE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DISC</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>TOTAL</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PAID</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>COMPANY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PhilHealth</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>UNPAID</b></font>&nbsp;</th>";
echo "</tr>";




while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
echo "<tr id='charges'>";
$this->soa_discount+=$row['discount'];
$this->soa_cashUnpaid+=$row['cashUnpaid'];
$this->soa_company+=$row['company'];
$this->soa_total+=$row['total'];
$this->soa_paid+=$row['cashPaid'];
$this->soa_phic+=$row['phic'];

echo "<td>&nbsp;<font class='heading'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['quantity']."</font>&nbsp;</td>";
if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<font class='heading'>".$price[0]."</font>&nbsp;</td>";
$this->soa_pfCash+=$price[0];
}else {
$this->soa_sellingPrice+=$row['sellingPrice'];
echo "<td>&nbsp;<font class='heading'>".$row['sellingPrice']."</font>&nbsp;</td>";
}
echo "<Td>&nbsp;<font class='heading'>".$row['dateCharge']."</font>&nbsp;</tD>";
if($row['discount'] > 0) {
echo "<td>&nbsp;<font class='heading'>".$row['discount']."</font>&nbsp;</td>";
}else {
echo "<Td>&nbsp;</tD>";
}
echo "<td>&nbsp;<font class='heading'>".$row['total']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashPaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['company']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['phic']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "</tr>";
  }





echo "<tr>";
echo "<Td><center><font class='heading'><b>TOTAL</b></font></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format(($this->soa_sellingPrice + $this->soa_pfCash),2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_discount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_total,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_paid,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_company,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_phic,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_cashUnpaid,2)."</b></font>&nbsp;</td>";
echo "</table>";
echo "<br>__________________________<br><font size=2>Cashier / Billing</font><br>";
}

public function chargesForSOA_ipd($registrationNo,$show,$data1,$data2) {

echo "<style type='text/css'>
.heading {
font-size:13px;
}

#charges:hover { background-color:yellow; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and pc.registrationNo = rd.registrationNo order by description asc  ");
}else if($show == "Date") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and (dateCharge between '$data1' and '$data2') order by pc.description asc  ");
}else if($show == "Category") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and title='$data1' order by description asc  ");
}else if($show == "phic") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and phic > 0 order by description asc  ");
}else if($show == "company") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and pc.company > 0 order by pc.description asc  ");
}else if($show == "cashPaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and cashPaid > 0 order by description asc  ");
}else if($show == "cashUnpaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and cashUnpaid > 0 order by description asc  ");
}else if($show == "selected") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,rd.* from patientCharges pc,registrationDetails rd WHERE rd.registrationNo = '$registrationNo' and rd.registrationNo = pc.registrationNo and itemNo='$data1' order by description asc  ");
}else {
echo "";
}
echo "<Table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th width='30%'>&nbsp;<font class='heading'><b>Particulars</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>QTY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PRICE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DATE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DISC</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>TOTAL</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>CASH</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>COMPANY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PhilHealth</b></font>&nbsp;</th>";
echo "</tr>";




while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
echo "<tr id='charges'>";
$this->soa_discount+=$row['discount'];
$this->soa_cashUnpaid+=$row['cashUnpaid'];
$this->soa_company+=$row['company'];
$this->soa_total+=$row['total'];
$this->soa_paid+=$row['cashPaid'];
$this->soa_phic+=$row['phic'];

echo "<td>&nbsp;<font class='heading'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['quantity']."</font>&nbsp;</td>";
if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<font class='heading'>".$price[0]."</font>&nbsp;</td>";
$this->soa_pfCash+=$price[0];
}else {
$this->soa_sellingPrice+=$row['sellingPrice'];
echo "<td>&nbsp;<font class='heading'>".$row['sellingPrice']."</font>&nbsp;</td>";
}
echo "<Td>&nbsp;<font class='heading'>".$row['dateCharge']."</font>&nbsp;</tD>";
if($row['discount'] > 0) {
echo "<td>&nbsp;<font class='heading'>".$row['discount']."</font>&nbsp;</td>";
}else {
echo "<Td>&nbsp;</tD>";
}
echo "<td>&nbsp;<font class='heading'>".$row['total']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['company']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['phic']."</font>&nbsp;</td>";
echo "</tr>";
  }





echo "<tr>";
echo "<Td><center><font class='heading'><b>TOTAL</b></font></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format(($this->soa_sellingPrice + $this->soa_pfCash),2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_discount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_total,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_cashUnpaid,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_company,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_phic,2)."</b></font>&nbsp;</td>";
echo "</table>";
echo "<br>";

$this->viewPayment_soa($registrationNo,$this->soa_cashUnpaid);


}

//pra sa selected items for SOA
public function chargesForSOA_selected($registrationNo,$show,$data1,$data2) {

echo "<style type='text/css'>
.heading {
font-size:13px;
}

#charges:hover { background-color:yellow; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' order by description asc  ");
}else if($show == "Date") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and (dateCharge between '$data1' and '$data2') order by description asc  ");
}else if($show == "Category") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and title='$data1' order by description asc  ");
}else if($show == "phic") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and phic > 0 order by description asc  ");
}else if($show == "company") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and company > 0 order by description asc  ");
}else if($show == "cashPaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and cashPaid > 0 order by description asc  ");
}else if($show == "cashUnpaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and cashUnpaid > 0 order by description asc  ");
}else {
echo "";
}
echo "<Table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th width='30%'>&nbsp;<font class='heading'><b></b></font>&nbsp;</th>";
echo "<th>&nbsp;<font class='heading'><b>Particulars</b></font>&nbsp;</th>";
echo  "<th width='20%'>&nbsp;<font class='heading'><b>QTY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PRICE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DATE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DISC</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>TOTAL</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PAID</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>COMPANY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PhilHealth</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>UNPAID</b></font>&nbsp;</th>";
echo "</tr>";

echo "<form method='get' action='http://".$this->getMyUrl()."/COCONUT/patientProfile/SOAoption/soaSelected.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='username' value=''>";
echo "<input type=hidden name='show' value='selected'>";

while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
echo "<tr id='charges'>";
$this->soa_discount+=$row['discount'];
$this->soa_cashUnpaid+=$row['cashUnpaid'];
$this->soa_company+=$row['company'];
$this->soa_total+=$row['total'];
$this->soa_paid+=$row['cashPaid'];
$this->soa_phic+=$row['phic'];

echo "<td>&nbsp;<input type=checkbox name='itemNo[]' value='".$row['itemNo']."'>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['quantity']."</font>&nbsp;</td>";
if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<font class='heading'>".$price[0]."</font>&nbsp;</td>";
$this->soa_pfCash+=$price[0];
}else {
$this->soa_sellingPrice+=$row['sellingPrice'];
echo "<td>&nbsp;<font class='heading'>".$row['sellingPrice']."</font>&nbsp;</td>";
}
echo "<Td>&nbsp;<font class='heading'>".$row['dateCharge']."</font>&nbsp;</tD>";
if($row['discount'] > 0) {
echo "<td>&nbsp;<font class='heading'>".$row['discount']."</font>&nbsp;</td>";
}else {
echo "<Td>&nbsp;</tD>";
}
echo "<td>&nbsp;<font class='heading'>".$row['total']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashPaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['company']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['phic']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "</tr>";
  }

echo "<input type=submit value='Proceed' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'>";
echo "</form>";
echo "<tr>";
echo "<td>&nbsp;</tD>";
echo "<Td><center><font class='heading'><b>TOTAL</b></font></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format(($this->soa_sellingPrice + $this->soa_pfCash),2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_discount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_total,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_paid,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_company,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_phic,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_cashUnpaid,2)."</b></font>&nbsp;</td>";
echo "</table>";
echo "<br>__________________________<br><font size=2>Cashier / Billing</font><br>";
}



public function chargesForSOA_selected_ipd($registrationNo,$show,$data1,$data2) {

echo "<style type='text/css'>
.heading {
font-size:13px;
}

#charges:hover { background-color:yellow; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' order by description asc  ");
}else if($show == "Date") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and (dateCharge between '$data1' and '$data2') order by description asc  ");
}else if($show == "Category") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and title='$data1' order by description asc  ");
}else if($show == "phic") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and phic > 0 order by description asc  ");
}else if($show == "company") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and company > 0 order by description asc  ");
}else if($show == "cashPaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and cashPaid > 0 order by description asc  ");
}else if($show == "cashUnpaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and cashUnpaid > 0 order by description asc  ");
}else {
echo "";
}
echo "<Table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th>&nbsp;<font class='heading'><b></b></font>&nbsp;</th>";
echo "<th width='30%'>&nbsp;<font class='heading'><b>Particulars</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>QTY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PRICE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DATE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DISC</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>CASH</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>COMPANY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PhilHealth</b></font>&nbsp;</th>";
echo "</tr>";

echo "<form method='get' action='http://".$this->getMyUrl()."/COCONUT/patientProfile/SOAoption/soaSelected_ipd.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='username' value=''>";
echo "<input type=hidden name='show' value='selected'>";

while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
echo "<tr id='charges'>";
$this->soa_discount+=$row['discount'];
$this->soa_cashUnpaid+=$row['cashUnpaid'];
$this->soa_company+=$row['company'];
$this->soa_total+=$row['total'];
$this->soa_paid+=$row['cashPaid'];
$this->soa_phic+=$row['phic'];

echo "<td>&nbsp;<input type=checkbox name='itemNo[]' value='".$row['itemNo']."'>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['quantity']."</font>&nbsp;</td>";
if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<font class='heading'>".$price[0]."</font>&nbsp;</td>";
$this->soa_pfCash+=$price[0];
}else {
$this->soa_sellingPrice+=$row['sellingPrice'];
echo "<td>&nbsp;<font class='heading'>".$row['sellingPrice']."</font>&nbsp;</td>";
}
echo "<Td>&nbsp;<font class='heading'>".$row['dateCharge']."</font>&nbsp;</tD>";
if($row['discount'] > 0) {
echo "<td>&nbsp;<font class='heading'>".$row['discount']."</font>&nbsp;</td>";
}else {
echo "<Td>&nbsp;</tD>";
}
echo "<td>&nbsp;<font class='heading'>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['company']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['phic']."</font>&nbsp;</td>";
echo "</tr>";
  }

echo "<input type=submit value='Proceed' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'>";
echo "</form>";
echo "<tr>";
echo "<td>&nbsp;</tD>";
echo "<Td><center><font class='heading'><b>TOTAL</b></font></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format(($this->soa_sellingPrice + $this->soa_pfCash),2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_discount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_cashUnpaid,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_company,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_phic,2)."</b></font>&nbsp;</td>";

echo "</table>";
echo "<br>__________________________<br><font size=2>Cashier / Billing</font><br>";
}



//show selected item from "chargesSOA_selected"
public function chargesForSOA_showSelected($registrationNo,$itemNo) {

echo "<style type='text/css'>
.heading {
font-size:13px;
}

#charges:hover { background-color:yellow; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));


$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and itemNo='$itemNo' order by description asc  ");


/*
echo "<Table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th width='30%'>&nbsp;<font class='heading'><b>Particulars</b></font>&nbsp;</th>";
echo  "<th width='20%'>&nbsp;<font class='heading'><b>QTY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PRICE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DATE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DISC</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>TOTAL</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PAID</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>COMPANY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PhilHealth</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>UNPAID</b></font>&nbsp;</th>";
echo "</tr>";
*/



while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
echo "<tr id='charges'>";
$this->soa_discount+=$row['discount'];
$this->soa_cashUnpaid+=$row['cashUnpaid'];
$this->soa_company+=$row['company'];
$this->soa_total+=$row['total'];
$this->soa_paid+=$row['cashPaid'];
$this->soa_phic+=$row['phic'];

echo "<td>&nbsp;<font class='heading'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['quantity']."</font>&nbsp;</td>";
if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<font class='heading'>".$price[0]."</font>&nbsp;</td>";
$this->soa_pfCash+=$price[0];
}else {
$this->soa_sellingPrice+=$row['sellingPrice'];
echo "<td>&nbsp;<font class='heading'>".$row['sellingPrice']."</font>&nbsp;</td>";
}
echo "<Td>&nbsp;<font class='heading'>".$row['dateCharge']."</font>&nbsp;</tD>";
if($row['discount'] > 0) {
echo "<td>&nbsp;<font class='heading'>".$row['discount']."</font>&nbsp;</td>";
}else {
echo "<Td>&nbsp;</tD>";
}
echo "<td>&nbsp;<font class='heading'>".$row['total']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashPaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['company']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['phic']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['cashUnpaid']."</font>&nbsp;</td>";
echo "</tr>";
  }




/*
echo "<tr>";
echo "<Td><center><font class='heading'><b>TOTAL</b></font></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format(($this->soa_sellingPrice + $this->soa_pfCash),2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_discount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_total,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_paid,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_company,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_phic,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_cashUnpaid,2)."</b></font>&nbsp;</td>";
echo "</table>";
echo "<br>__________________________<br><font size=2>Cashier / Billing</font><br>";
*/


}


public function chargesForSOA_showSelected_ipd($registrationNo,$itemNo) {

echo "<style type='text/css'>
.heading {
font-size:13px;
}

#charges:hover { background-color:yellow; color:black; }

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));


$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientCharges WHERE registrationNo = '$registrationNo' and itemNo='$itemNo' order by description asc  ");


/*
echo "<Table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th width='30%'>&nbsp;<font class='heading'><b>Particulars</b></font>&nbsp;</th>";
echo  "<th width='20%'>&nbsp;<font class='heading'><b>QTY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PRICE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DATE</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>DISC</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>TOTAL</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PAID</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>COMPANY</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>PhilHealth</b></font>&nbsp;</th>";
echo  "<th>&nbsp;<font class='heading'><b>UNPAID</b></font>&nbsp;</th>";
echo "</tr>";
*/



while($row = mysqli_fetch_array($result))
  {
$price = preg_split ("/\//", $row['sellingPrice']); 
echo "<tr id='charges'>";
$this->soa_discount+=$row['discount'];
$this->soa_cashUnpaid+=$row['cashUnpaid'];
$this->soa_company+=$row['company'];
$this->soa_total+=$row['total'];
$this->soa_paid+=$row['cashPaid'];
$this->soa_phic+=$row['phic'];

echo "<td>&nbsp;<font class='heading'>".$row['description']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".$row['quantity']."</font>&nbsp;</td>";
if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<font class='heading'>".$price[0]."</font>&nbsp;</td>";
$this->soa_pfCash+=$price[0];
}else {
$this->soa_sellingPrice+=$row['sellingPrice'];
echo "<td>&nbsp;<font class='heading'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}
echo "<Td>&nbsp;<font class='heading'>".$row['dateCharge']."</font>&nbsp;</tD>";
if($row['discount'] > 0) {
echo "<td>&nbsp;<font class='heading'>".number_format($row['discount'],2)."</font>&nbsp;</td>";
}else {
echo "<Td>&nbsp;</tD>";
}
echo "<td>&nbsp;<font class='heading'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".number_format($row['cashUnpaid'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".number_format($row['company'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".number_format($row['phic'],2)."</font>&nbsp;</td>";
echo "</tr>";
  }




/*
echo "<tr>";
echo "<Td><center><font class='heading'><b>TOTAL</b></font></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format(($this->soa_sellingPrice + $this->soa_pfCash),2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_discount,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_total,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_paid,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_company,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_phic,2)."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'><b>".number_format($this->soa_cashUnpaid,2)."</b></font>&nbsp;</td>";
echo "</table>";
echo "<br>__________________________<br><font size=2>Cashier / Billing</font><br>";
*/


}



public $phicPF_details_totalPF;
public $phicPF_details_cashUnpaid;
public $phicPF_details_phic;


public function phicPF_details_totalPF() {
return $this->phicPF_details_totalPF;
}

public function phicPF_details_cashUnpaid() {
return $this->phicPF_details_cashUnpaid;
}

public function phicPF_details_phic() {
return $this->phicPF_details_phic;
}

public function phicPF_details($itemNo) {

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.total) as totalPF,sum(pc.cashUnpaid) as cashUnpaid,sum(pc.phic) as phic from patientCharges pc WHERE pc.itemNo = '$itemNo'  "); 

while($row = mysqli_fetch_array($result))
  {
$this->phicPF_details_totalPF = $row['totalPF'];
$this->phicPF_details_cashUnpaid = $row['cashUnpaid'];
$this->phicPF_details_phic = $row['phic'];
  }

}


public $phic_DrugsMeds_totalCharges;
public $phic_DrugsMed_totalPHIC;

public function phic_DrugsMeds_totalCharges() {
return $this->phic_DrugsMeds_totalCharges;
}

public function phic_DrugsMeds_totalPHIC() {
return $this->phic_DrugsMeds_totalPHIC;
}

public function phic_DrugsMeds($switch,$identificationNo) {

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($switch == 1) {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.total) as total,sum(pc.phic) as totalPHIC from patientCharges pc WHERE pc.title = 'MEDICINE' and pc.registrationNo = '$identificationNo' "); 

}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.total) as total,sum(pc.phic) as totalPHIC from patientCharges pc WHERE pc.title = 'MEDICINE' and pc.itemNo = '$identificationNo' "); 
}
while($row = mysqli_fetch_array($result))
  {
$this->phic_DrugsMeds_totalCharges = $row['total'];
$this->phic_DrugsMeds_totalPHIC = $row['totalPHIC'];
  }

}

public $phic_OTHERS_totalCharges;
public $phic_OTHERS_totalPHIC;


public function phic_OTHERS_totalCharges() {
return $this->phic_OTHERS_totalCharges;
}

public function phic_OTHERS_totalPHIC() {
return $this->phic_OTHERS_totalPHIC;
}

public function phic_OTHERS($registrationNo) {

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.total) as total,sum(pc.phic) as totalPHIC from patientCharges pc WHERE (pc.title != 'MEDICINE' or pc.title != 'ROOM ACCOMODATION' or pc.title != 'PROFESSIONAL FEE') and pc.registrationNo = '$registrationNo' "); 

while($row = mysqli_fetch_array($result))
  {
$this->phic_OTHERS_totalCharges = $row['total'];
$this->phic_OTHERS_totalPHIC = $row['totalPHIC'];
  }

}


public $phicBack_3_totalCharges;
public $phicBack_3_totalPHIC;

public function phicBack_3_totalCharges() {
return $this->phicBack_3_totalCharges;
}

public function phicBack_3_totalPHIC() {
return $this->phicBack_3_totalPHIC;
}

public function phicBack_part3_ByTitle($itemNo,$title) {

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.total) as total,sum(pc.phic) as totalPHIC from patientCharges pc WHERE pc.title='$title' and pc.itemNo = '$itemNo' and pc.phic > 0 order by pc.description asc "); 

while($row = mysqli_fetch_array($result))
  {
$this->phicBack_3_totalCharges = $row['total'];
$this->phicBack_3_totalPHIC = $row['totalPHIC'];
  }

}





public $phicPF_month;
public $phicPF_day;
public $phicPF_year;
//pra sa doctors pf sa cf2
public function phicProfessionalFee($registrationNo) {

echo "<style type='text/css'>
#docPF:hover { background-color:yellow; color:black; }

.docName{
	border: 1px solid #000;
	color: #000;
	height: 25px;
	width: 195px;
	border-color:white white black white;
	font-size:12px;
	text-align:center;

}

.docService{
	border: 1px solid #000;
	color: #000;
	height: 25px;
	width: 195px;
	border-color:white white black white;
	font-size:12px;
	text-align:center;

}


.noBorder{
	border: 1px solid #000;
	color: #000;
	height: 25px;
	width: 195px;
	border-color:white white white white;
	font-size:12px;
	text-align:center;

}

.accNo {
	border: 1px solid #000;
	color: #000;
	height: 18px;
	width: 14px;
	border-color:white black black black;
	text-align:center;
	font-size:15px;
}

.accNo1{
	border: 1px solid #000;
	color: #000;
	height: 18px;
	width: 14px;
	border-color:white black black white;
	text-align:center;
	font-size:15px;
}


.square{
	border: 1px solid #000;
	color: #000;
	height: 58px;
	width: 90px;
	border-color:white white white white;
	text-align:center;
	font-size:12px;
}

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,d.* from patientCharges pc,Doctors d WHERE pc.registrationNo='$registrationNo' and pc.title='PROFESSIONAL FEE' and pc.phic > 0 and pc.chargesCode = d.doctorCode order by pc.description asc  ");

while($row = mysqli_fetch_array($result))
  {

$dateCharge = preg_split ("/\_/", $row['dateCharge']); 
$accNo = preg_split ("/\-/", $row['PhilHealth_AccreditationNo']); 


echo "<tr id='docPF'>";
$this->phicPF_details($row['itemNo']);
echo "<td><input class='docName' type=text value='".$row['description']."'><Br>&nbsp;<input type=text maxlength=1 class='accNo' value='".substr($accNo[0],-4,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[0],-3,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[0],-2,1)."'><input type=text class='accNo1' maxlength=1 value='".substr($accNo[0],-1,1)."'>-
<input type=text maxlength=1 class='accNo' value='".substr($accNo[1],-7,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[1],-6,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[1],-5,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[1],-4,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[1],-3,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[1],-2,1)."'><input type=text maxlength=1 class='accNo1' value='".substr($accNo[1],-1,1)."'>-
<input type=text maxlength=1 class='accNo' value='".substr($accNo[2],-1,1)."'>
</td>";

if($dateCharge[0] == "Jan") {
$this->phicPF_month = "01";
}else if($dateCharge[0] == "Feb") {
$this->phicPF_month = "02";
}else if($dateCharge[0] == "Mar") {
$this->phicPF_month = "03";
}else if($dateCharge[0] == "Apr") {
$this->phicPF_month = "04";
}else if($dateCharge[0] == "May") {
$this->phicPF_month = "05";
}else if($dateCharge[0] == "Jun") {
$this->phicPF_month = "06";
}else if($dateCharge[0] == "Jul") {
$this->phicPF_month = "07";
}else if($dateCharge[0] == "Aug") {
$this->phicPF_month = "08";
}else if($dateCharge[0] == "Sep") {
$this->phicPF_month = "09";
}else if($dateCharge[0] == "Oct") {
$this->phicPF_month = "10";
}else if($dateCharge[0] == "Nov") {
$this->phicPF_month = "11";
}else if($dateCharge[0] == "Dec") {
$this->phicPF_month = "12";
}else {
echo "";
}
echo "<td><input type='text' class='docService' value='".$row['service']."'><Br><input type=text class='noBorder' value='".$this->phicPF_month."-".$dateCharge[1]."-".$dateCharge[2]."'></td>";

echo "<td><input type=text class='square' value='P ".number_format($this->phicPF_details_totalPF(),2)."'></td>";
echo "<td><input type=text class='square' value='P ".number_format($this->phicPF_details_phic(),2)."'></td>";
echo "<td><input type=text class='square' value='P ".number_format($this->phicPF_details_cashUnpaid(),2)."'></td>";
echo "<td><input type=text class='square' value=''></td>";
echo "<td><input type=text class='square' value=''></td>";
echo "</tr>";

}
  }

public $phicBack_meds_qty;
public $phicBack_meds_actualCharges;
public $phicBack_meds_phicBenefits;

public function phicBack_meds_qty() {
return $this->phicBack_meds_qty;
}
public function phicBack_meds_actualCharges() {
return $this->phicBack_meds_actualCharges;
}
public function phicBack_meds_phicBenefits() {
return $this->phicBack_meds_phicBenefits;
}



public function phicBack_meds_group($registrationNo,$chargesCode) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pc.quantity) as qty,sum(pc.total) as total,sum(pc.phic) as totalPHIC from patientCharges pc WHERE pc.registrationNo='$registrationNo' and pc.chargesCode = '$chargesCode' and pc.phic > 0  "); 

while($row = mysqli_fetch_array($result))
  {
$this->phicBack_meds_qty = $row['qty'];
$this->phicBack_meds_actualCharges = $row['total'];
$this->phicBack_meds_phicBenefits = $row['totalPHIC'];
  }


}


public $phicBack_meds_totalActualCharges;
public $phicBack_meds_totalPHIC;


public function phicBack_meds_totalActualCharges() {
return $this->phicBack_meds_totalActualCharges;
}

public function phicBack_meds_totalPHIC() {
return $this->phicBack_meds_totalPHIC;
}

public function phicBack_meds($registrationNo) {

echo "<style type='text/css'>
#phic:hover { background-color:yellow; color:black; }



.desc{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 310px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}

.preparation{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 167px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}


.qty{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 67px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}

.phic{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 95px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.*,i.genericName,i.preparation from patientCharges pc,inventory i WHERE pc.registrationNo = '$registrationNo' and pc.title = 'MEDICINE' and pc.chargesCode = i.inventoryCode and pc.phic > 0 group by pc.chargesCode order by i.genericName asc  "); 

echo "<table align='center' width='860' border=1 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td width='35%'><center><font size=2>Generic/Brand Name</font></center></td>";
echo "<td width='20%'><center><font size=2>Preparation</font><br><font size=1>(dose/cap/syrup/injectible<br>/tab with ml/mg/gm content)</font></center></td>";
echo "<Td width='5%'><center><font size=2>Qty</font></center></tD>";
echo "<td width='10%'><center><font size=2>Unit Price</font></center></td>";
echo "<td width='10%'><Center><font size=2>Actual<br>Charges</font></center></td>";
echo "<td width='10%'><center><font size=2>PhilHealth<br>Benefit</font></center></td>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {

$this->phic_DrugsMeds("2",$row['itemNo']);
$this->phicBack_meds_group($row['registrationNo'],$row['chargesCode']);
echo "<tr>";
$this->phicBack_meds_totalActualCharges += $this->phicBack_meds_actualCharges();
$this->phicBack_meds_totalPHIC += $this->phicBack_meds_phicBenefits();

echo "<Td><input type=text class='desc' value='".$row['genericName']."/".$row['description']."'></td>";
echo "<Td><input type=text class='preparation' value='".$row['preparation']."'></td>";
echo "<Td><input type=text class='qty' value='".$this->phicBack_meds_qty()."'></td>";
echo "<Td><input type=text class='phic' value='P ".number_format($row['sellingPrice'],2)."'></td>";
echo "<Td><input type=text class='phic' value='P ".number_format($this->phicBack_meds_actualCharges(),2)."'></td>";
echo "<Td><input type=text class='phic' value='P ".number_format($this->phicBack_meds_phicBenefits(),2)."'></td>";
echo "</tr>"; 
 }
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><center><font size=2><b>TOTAL</b></font></center></td>";
echo "<td><input type=text class='phic' value='".number_format($this->phicBack_meds_totalActualCharges(),2)."'></td>";
echo "<td><input type=text class='phic' value='".number_format($this->phicBack_meds_totalPHIC(),2)."'></td>";
echo "</tr>";
echo "</table>";

}

public $phicBack_actualCharges;
public $phicBack_phicBenefits;

public function phicBack_actualCharges() {
return $this->phicBack_actualCharges;
}
public function phicBack_phicBenefits() {
return $this->phicBack_phicBenefits;
}

public function phicBack_part3($title,$registrationNo) {

echo "<style type='text/css'>
#part3:hover { background-color:yellow; color:black; }

.descRadio{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 381px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}

.qtyRadio{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 80px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}

.phicRadio{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 125px;
	border-color:white white white white;
	font-size:15px;
	text-align:center;
}

</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.* from patientCharges pc WHERE pc.title = '$title' and pc.registrationNo = '$registrationNo' and pc.phic > 0 order by description asc "); 


while($row = mysqli_fetch_array($result))
  {
$this->phicBack_part3_ByTitle($row['itemNo'],$title); // ito ung callee pra mkuha ung actual charges at PHIC benefits
echo "<tr>";
$this->phicBack_actualCharges+=$this->phicBack_3_totalCharges();
$this->phicBack_phicBenefits+=$this->phicBack_3_totalPHIC();
echo "<Td width='381'><input type=text class='descRadio' value='".$row['description']."'></tD>";
echo "<Td><input type=text class='qtyRadio' value='".$row['quantity']."'></tD>";
echo "<Td><input type=text class='phicRadio' value='".number_format($row['sellingPrice'],2)."'></tD>";
echo "<Td><input type=text class='phicRadio' value='".number_format($this->phicBack_3_totalCharges(),2)."'></tD>";
echo "<Td><input type=text class='phicRadio' value='".number_format($this->phicBack_3_totalPHIC(),2)."'></tD>";
echo "</tr>";
  }
echo "<tr>";
echo "<Td width='381'><input type=text class='descRadio' value=''></tD>";
echo "<Td><input type=text class='qtyRadio' value=''></tD>";
echo "<Td><input type=text class='phicRadio' value=''></tD>";
echo "<Td><input type=text class='phicRadio' value=''></tD>";
echo "<Td><input type=text class='phicRadio' value=''></tD>";
echo "</tr>";
}




public function getPatientICD_code($registrationNo) {

echo "

<style type='text/css'>
.icd{
font-size:14px;
}
</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientICD WHERE registrationNo = '$registrationNo' order by icdCode asc  "); 
echo " <td width='499' class='style7'><font size=3>13. Complete ICD-10 Code/s:</font>&nbsp;";
$x=1;
while($row = mysqli_fetch_array($result))
  {
echo "<font class='icd'><u>(".$x++.")".$row['icdCode']."&nbsp;</u></font>";
  }
echo "</td>";

}

//pra sa CF2 diagnosis LLgyan ng number as delimiter
public function getPatientICD_diagnosis($registrationNo) {



$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientICD WHERE registrationNo='$registrationNo' order by icdCode asc  "); 
$x=1;
while($row = mysqli_fetch_array($result))
  {
echo "(".$x++.")".$row['diagnosis']."&nbsp;";
  }

}



public function viewICDcode($registrationNo,$username) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}

.head {
font-size:13px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));



$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from patientICD where registrationNo='$registrationNo' order by icdCode asc  ");

echo "<center><table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='head' color='white'>ICD Code</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='head' color='white'>Diagnosis</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'></th>";
echo "<th bgcolor='#3b5998'></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font class='data'>".$row['icdCode']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['diagnosis']."</font>&nbsp;</td>";


echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/ICDcode/editICD.php?icdCode=$row[icdCode]&diagnosis=$row[diagnosis]&icdNo=$row[icdNo]&registrationNo=$registrationNo&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";


echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/ICDcode/verifyDeleteICD.php?icdCode=$row[icdCode]&diagnosis=$row[diagnosis]&icdNo=$row[icdNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>"; 
echo "</tr>";
}
echo "</tr>";

}







public function paymentAssigning($registrationNo,$username,$show,$desc) {


echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
#row:hover { background-color:yellow;color:black;}

.data {
font-size:12px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' order by description asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and description like '$desc%%%%%%' order by description asc ");
}

echo "<form method='get' action='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/assignPayment.php'>";
echo "<input type='hidden' name='registrationNo' value='$registrationNo'>";
echo "<input type='hidden' name='username' value='$username'>";

while($row = mysqli_fetch_array($result))
  {
$this->getMyResults($this->getResult_labNo($row['itemNo']),$username);
$price = preg_split ("/\//", $row['sellingPrice']); 
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
echo "<tr id='row'>";

if($desc == "cash") { // CHECK ALL CASH
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_cash' checked='checked'></center></td>";
echo "<td><center><input name='assign[]' type=checkbox value='".$row['itemNo']."_hmo'></center></td>";
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_phic'></center></td>";
}else if($desc == "hmo") { //CHECK ALL HMO
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_cash'></center></td>";
echo "<td><center><input name='assign[]' type=checkbox value='".$row['itemNo']."_hmo' checked='checked'></center></td>";
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_phic'></center></td>";
}else if($desc == "phic") { //CHECK ALL PHIC
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_cash'></center></td>";
echo "<td><center><input name='assign[]' type=checkbox value='".$row['itemNo']."_hmo' ></center></td>";
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_phic' checked='checked'></center></td>";
}else {
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_cash'></center></td>";
echo "<td><center><input name='assign[]' type=checkbox value='".$row['itemNo']."_hmo'></center></td>";
echo "<td><Center><input name='assign[]' type=checkbox value='".$row['itemNo']."_phic'></center></td>";
}
if($deptStatus[0] == "dispensedBy") {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']." &nbsp;(<font size=1 color=red>Dispensed</font>)</a></font>&nbsp;</td>";
}else if($this->checkIfLabResultExist($row['itemNo']) > 0 && $row['title'] == "LABORATORY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/laboratoryResult.php?labNo=".$this->getLabNo()."&username=$username&registrationNo=$registrationNo&pathologist=".$this->getPathologist()."&medTech=".$this->getMedTech()."&dateReceived=".$this->getDateReceived()."&dateReleased=".$this->getDateReleased()."&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfRadResultExist($row['itemNo']) > 0 && $row['title'] == "RADIOLOGY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/resultReport.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfSoapExist($row['itemNo']) > 0 && $row['title'] == "PROFESSIONAL FEE" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]'>(<font color=red size=1>S.O.A.P</font>)</font></a>&nbsp;</td>";
}else  {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a></font>&nbsp;</td>";
}


if($row['title']=="PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['discount']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";

if($row['inventoryFrom'] != "none") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font><br><font class='data'>".$row['inventoryFrom']."</font>&nbsp;</td>";
}else if($row['inventoryFrom'] == "") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}else if($row['title'] == "LABORATORY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/addResults.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "RADIOLOGY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/addRadioResult.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soap.php?registrationNo=$registrationNo&itemNo=$row[itemNo]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}

if($row['status']=="PAID" ) {
echo "<td>&nbsp;<font class='data' color=blue>".$row['status']."</font>&nbsp;</td>";
}
else if($row['status']=="BALANCE" || $row['status']=="APPROVED") {
echo "<td>&nbsp;<font class='data' color=red>".$row['status']."</font>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
}
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<center><font class='data' color=red>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data' color=blue>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data' color=darkgreen>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";
if($this->checkBalanceItem($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'>".($row['cashPaid'] + $this->getBalancePaid($row['itemNo']))."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['cashPaid']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "</tr>";
  }
echo "<br><input type=submit value='Assign Payments' style='border:1px solid #ff0000; font-size:13px; background-color:transparent;'><Br><br>";
echo "</form>";

}



public function paymentTransfer($registrationNo,$username,$show,$desc) {


echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
#row:hover { background-color:yellow;color:black;}

.data {
font-size:12px;
}
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($show == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' order by description asc ");
}else if($show == "cash2company" || $show == "cash2phic") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and cashUnpaid > 0 order by description asc ");
}else if($show == "company2cash" || $show == "company2phic") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and company > 0 order by description asc ");
}else if($show == "phic2cash" || $show == "phic2company") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and phic > 0 order by description asc ");
}

else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCharges where registrationNo = '$registrationNo' and description like '$desc%%%%%%' order by description asc ");
}

echo "<form method='get' action='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/transferPayment.php'>";
echo "<input type='hidden' name='registrationNo' value='$registrationNo'>";
echo "<input type='hidden' name='username' value='$username'>";
echo "<input type='hidden' name='show' value='$show'>";
echo "<input type='hidden' name='desc' value='$desc'>";

while($row = mysqli_fetch_array($result))
  {
$this->getMyResults($this->getResult_labNo($row['itemNo']),$username);
$price = preg_split ("/\//", $row['sellingPrice']); 
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
echo "<tr id='row'>";

echo "<td><Center><input name='transfer[]' type=checkbox value='".$row['itemNo']."' checked></center></td>";

if($deptStatus[0] == "dispensedBy") {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']." &nbsp;(<font size=1 color=red>Dispensed</font>)</a></font>&nbsp;</td>";
}else if($this->checkIfLabResultExist($row['itemNo']) > 0 && $row['title'] == "LABORATORY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/laboratoryResult.php?labNo=".$this->getLabNo()."&username=$username&registrationNo=$registrationNo&pathologist=".$this->getPathologist()."&medTech=".$this->getMedTech()."&dateReceived=".$this->getDateReceived()."&dateReleased=".$this->getDateReleased()."&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfRadResultExist($row['itemNo']) > 0 && $row['title'] == "RADIOLOGY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/resultReport.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfSoapExist($row['itemNo']) > 0 && $row['title'] == "PROFESSIONAL FEE" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]'>(<font color=red size=1>S.O.A.P</font>)</font></a>&nbsp;</td>";
}else  {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a></font>&nbsp;</td>";
}


if($row['title']=="PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['discount']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";

if($row['inventoryFrom'] != "none") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font><br><font class='data'>".$row['inventoryFrom']."</font>&nbsp;</td>";
}else if($row['inventoryFrom'] == "") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}else if($row['title'] == "LABORATORY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/addResults.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "RADIOLOGY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/Radiology/addRadioResult.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soap.php?registrationNo=$registrationNo&itemNo=$row[itemNo]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}

if($row['status']=="PAID" ) {
echo "<td>&nbsp;<font class='data' color=blue>".$row['status']."</font>&nbsp;</td>";
}
else if($row['status']=="BALANCE" || $row['status']=="APPROVED") {
echo "<td>&nbsp;<font class='data' color=red>".$row['status']."</font>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
}
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<center><font class='data' color=red>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data' color=blue>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data' color=darkgreen>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";
if($this->checkBalanceItem($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'>".($row['cashPaid'] + $this->getBalancePaid($row['itemNo']))."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['cashPaid']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "</tr>";
  }
echo "<br><input type=submit value='Transfer Payments' style='border:1px solid #ff0000; font-size:13px; background-color:transparent;'><Br><br>";
echo "</form>";

}



public $room_roomNo;
public $room_Description;
public $room_type;
public $room_rate;


public function room_roomNo() {
return $this->room_roomNo;
}
public function room_Description() {
return $this->room_Description;
}
public function room_type() {
return $this->room_type;
}
public function room_rate() {
return $this->room_rate;
}

public function getRoom($description) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM room WHERE Description = '$description' ");

while($row = mysqli_fetch_array($result))
  {

$this->room_roomNo = $row['roomNo'];
$this->room_Description = $row['Description'];
$this->room_type = $row['type'];
$this->room_rate = $row['rate'];

  }

}



public $viewPayment_total;

public function viewPayment($registrationNo,$username) {

echo "

<style type='text/css'>
#payment:hover {
background-color:yellow;
color:black;
}
</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientPayment WHERE registrationNo = '$registrationNo' order by datePaid asc ");
echo "<br><center><br>	";
echo "<table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Payment For</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Amount Paid</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Time Paid</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Date Paid</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white>Paid By</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'></th>";
echo "<th bgcolor='#3b5998'></th>";
echo "</tr>";


while($row = mysqli_fetch_array($result))
  {

echo "<tr id='payment'>";
$this->viewPayment_total+=$row['amountPaid'];
echo "<td>&nbsp;".$row['paymentFor']."&nbsp;</td>";
echo "<td>&nbsp;".number_format($row['amountPaid'],2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['timePaid']."&nbsp;</td>";
echo "<td>&nbsp;".$row['datePaid']."&nbsp;</td>";
echo "<td>&nbsp;".$row['paidBy']."&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/editPayment.php?paymentFor=$row[paymentFor]&amountPaid=$row[amountPaid]&timePaid=$row[timePaid]&datePaid=$row[datePaid]&username=$username&registrationNo=$registrationNo&paymentNo=$row[paymentNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/verifyDeletePayment.php?paymentFor=$row[paymentFor]&amountPaid=$row[amountPaid]&registrationNo=$registrationNo&paymentNo=$row[paymentNo]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
echo "</tr>";

  }

echo "<tr>";
echo "<Td><center><b>TOTAL</b></center></tD>";
echo "<Td>&nbsp;".number_format($this->viewPayment_total,2)."&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "</tr>";
echo "</table>";

}


public $viewPayment_setter_paymentNo;
public $viewPayment_setter_registrationNo;
public $viewPayment_setter_amountPaid;
public $viewPayment_setter_datePaid;
public $viewPayment_setter_timePaid;
public $viewPayment_setter_paidBy;
public $viewPayment_setter_paymentFor;

public function viewPayment_setter_paymentNo() {
return $this->viewPayment_setter_paymentNo;
}
public function viewPayment_setter_registrationNo() {
return $this->viewPayment_setter_registrationNo;
}
public function viewPayment_setter_amountPaid() {
return $this->viewPayment_setter_amountPaid;
}
public function viewPayment_setter_datePaid() {
return $this->viewPayment_setter_datePaid;
}
public function viewPayment_setter_timePaid() {
return $this->viewPayment_setter_timePaid;
}
public function viewPayment_setter_paidBy() {
return $this->viewPayment_setter_paidBy;
}
public function viewPayment_setter_paymentFor() {
return $this->viewPayment_setter_paymentFor;
}

public function viewPayment_setter($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientPayment WHERE registrationNo = '$registrationNo' ");

while($row = mysqli_fetch_array($result))
  {
$this->viewPayment_setter_paymentNo = $row['paymentNo'];
$this->viewPayment_setter_registrationNo = $row['registrationNo'];
$this->viewPayment_setter_amountPaid = $row['amountPaid'];
$this->viewPayment_setter_datePaid = $row['datePaid'];
$this->viewPayment_setter_timePaid = $row['timePaid'];
$this->viewPayment_setter_paidBy = $row['paidBy'];  
$this->viewPayment_setter_paymentFor = $row['paymentFor'];
}

}

public $viewPayment_soa_amountPaid;

public function viewPayment_soa($registrationNo,$total) {

 echo "

<style type='text/css'>
.heading {
font-size:13px;
}
</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientPayment WHERE registrationNo = '$registrationNo' ");

echo "<font size=1>Payment History</font><Br><table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<Tr>";
echo "<Th>&nbsp;<font class='heading'>Date</font>&nbsp;</th>";
echo "<Th>&nbsp;<font class='heading'>Paid</font>&nbsp;</th>";
echo "<Th>&nbsp;<font class='heading'>Total</font>&nbsp;</th>";
echo "<Th>&nbsp;<font class='heading'>Balance	</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<Tr>";
$this->viewPayment_soa_amountPaid+=$row['amountPaid'];
echo "<td>&nbsp;<font class='heading'>".$row['datePaid']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='heading'>".number_format($row['amountPaid'],2)."</font>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
}
echo "<tr>";
echo "<Td>&nbsp;<b>TOTAL</b>&nbsp;</td>";
echo "<Td>&nbsp;<font class='heading'><b>".number_format($this->viewPayment_soa_amountPaid,2)."</b></font>&nbsp;</td>";
echo "<Td>&nbsp;<font class='heading'><b>".number_format($total,2)."</b></font>&nbsp;</td>";
echo "<Td>&nbsp;<font class='heading'><b>".number_format(($total - $this->viewPayment_soa_amountPaid),2)."</b></font>&nbsp;</td>";
echo "</tr>";
echo "</table>";
echo "<br>__________________________<br><font size=2>Cashier / Billing</font><br>";
}



//get total credit ng patient
public function getCurrentCredit($registrationNo,$title,$via) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($title == "PATIENT") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(cashUnpaid) as total FROM patientCharges WHERE registrationNo = '$registrationNo' ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum($via) as total FROM patientCharges WHERE registrationNo = '$registrationNo' and title = '$title' ");
}
while($row = mysqli_fetch_array($result))
  {

return $row['total'];

  }

}



//get total paid ng patient
public function getCurrentPaid($registrationNo,$paymentFor,$via) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($via == "cashUnpaid") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(amountPaid) as amountPaid FROM patientPayment WHERE registrationNo = '$registrationNo' and paymentFor = '$paymentFor' ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum($via) as amountPaid FROM patientCharges WHERE registrationNo = '$registrationNo' and title = '$paymentFor' ");
}


while($row = mysqli_fetch_array($result))
  {

return $row['amountPaid'];

  }

}


//mei credit limit ba ang patient as "PATIENT"???
public function checkCreditLimit($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCreditLimit WHERE registrationNo = '$registrationNo' and limitTo = 'PATIENT' and limitVia = 'cashUnpaid'  ");

while($row = mysqli_fetch_array($result))
  {
return mysqli_num_rows($result);
  }

}


//mei credit limit ba ang patient as "NOT PATIENT"???
public function checkCreditLimit_others($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientCreditLimit WHERE registrationNo = '$registrationNo' and limitTo != 'PATIENT' and limitVia = 'cashUnpaid'  ");

while($row = mysqli_fetch_array($result))
  {
return mysqli_num_rows($result);
  }

}


public $getPatientInTheRoom_name;
public $getPatientInTheRoom_registrationNo;

public function getPatientInTheRoom_name() {
return $this->getPatientInTheRoom_name;
}
public function getPatientInTheRoom_registrationNo() {
return $this->getPatientInTheRoom_registrationNo;
}


//setter pra mkuha ung details ng patient sa isang room
public function getPatientInTheRoom($room) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.registrationNo FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and rd.room = '$room' and rd.dateUnregistered = ''  ");
while($row=mysqli_fetch_array($result)) {
return $row['registrationNo']."_".$row['lastName'].", ".$row['firstName'];
}

}



public function showFloorAsUpperMenu($branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT floor FROM room WHERE branch = '$branch' group by floor order by floor  ");
while($row=mysqli_fetch_array($result)) {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/NURSING/nursingStation1.php?username=&module=&branch=$branch&floor=$row[floor]' target='nsX'>$row[floor]</a></li>";

//$this->coconutUpperMenu_headingMenu("http://".$this->getMyUrl()."/COCONUT/NURSING/nursingStation.php?username=&module=&branch=$branch&floor=".$row['floor'],$row['floor']);
}

}


public function showFloorAsUpperMenu_billing($branch,$username) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT floor FROM room WHERE branch = '$branch' group by floor order by floor  ");
while($row=mysqli_fetch_array($result)) {
echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/billing/billingStation.php?username=$username&module=&branch=$branch&floor=$row[floor]' target='departmentX'>$row[floor]</a></li>";

//$this->coconutUpperMenu_headingMenu("http://".$this->getMyUrl()."/COCONUT/NURSING/nursingStation.php?username=&module=&branch=$branch&floor=".$row['floor'],$row['floor']);
}

}


public function showFloorAsUpperMenu_admin($username,$module) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT floor,branch FROM room group by floor order by branch  ");
while($row=mysqli_fetch_array($result)) {

echo "<li><a href='http://".$this->getMyUrl()."/COCONUT/billing/billingStation.php?username=$username&module=$module&branch=$row[branch]&floor=$row[floor]' target='departmentX'>$row[branch] - $row[floor]</a></li>";

//$this->coconutUpperMenu_headingMenu("http://".$this->getMyUrl()."/COCONUT/NURSING/nursingStation.php?username=&module=&branch=$branch&floor=".$row['floor'],$row['floor']);
}

}



public function showFloor() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT floor FROM room group by floor order by floor  ");
while($row=mysqli_fetch_array($result)) {
echo "<option value='".$row['floor']."'>".$row['floor']."</option>";
}

}


public $showAllRoom_room;
public $showAllRoom_occupied;
public $showAllRoom_vacant;
public $showAllRoom_credit;


//iLbas Lhat ng room sa branch
public function showAllRoom($branch,$username,$module,$desc) {

echo "

<style type='text/css'>
.head {
color:white;
}

.roomData {
font-size:13px;
}

#selected:hover {
background-color:yellow;
color:black;
}

.exceeded {
border-color:red;
color:red;
}

.unExceed {text-decoration:none; color:black; }
.Exceed {text-decoration:none; color:red; }
</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

if($module == "BILLING") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM room WHERE branch = '$branch' order by Description asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM room WHERE branch = '$branch' and floor='$desc' order by Description asc ");
}
echo "<br><center><font size=2>Admitted Patient in $desc of $branch</font><div style='border:1px solid #000000; width:600px; height:auto; border-color:black black black black;'>";
echo "<center><br><table width='75%' border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='head'>Room</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='head'>Patient</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font class='head'>Credit</font>&nbsp;</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
 $patientData = preg_split ("/\_/",$this->getPatientInTheRoom($row['Description'])); //source of data

 $credit = $this->getCurrentCredit($patientData[0],"PATIENT","") - ($this->getCurrentPaid($patientData[0],"PATIENT","cashUnpaid")); //total Credit [cashUnpaid] as PATIENT
 
 $this->viewCreditLimit_setter($patientData[0],"PATIENT","cashUnpaid","");  //credit Limit ng Patient..
 $limit = $this->viewCreditLimit_setter_amountLimit(); //amountLimit ng patient from "viewCreditLimit_setter()"

echo "<tr id='selected' >";

/*******start counter****/
$this->showAllRoom_room++; //count total rooms

if($patientData[0] != "") { //check kung may patient
$this->showAllRoom_occupied+=1; // kung meron +1
}else {
$this->showAllRoom_vacant+=1; // kung wLa +1
}

$this->showAllRoom_credit+=$credit;

/*********end counter************/


if($this->checkCreditLimit($patientData[0]) == 0) { //check kung mei credit Limit n nka set sa patient...kpg meron execute code below kung wLa execute notifier

echo "<Td>&nbsp;<font class='roomData'>".$row['Description']."</font>&nbsp;</td>";
if($patientData[0] != "") {
echo "<Td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/redirect.php?username=$username&registrationNo=".$this->viewCreditLimit_setter_registrationNo()."' target='_blank' class='unExceed'><font class='roomData'>".$patientData[1]."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;</td>";
}
if($patientData[0] != "") {
echo "<Td>&nbsp;<font class='roomData'>".number_format($credit,2 )."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;</td>";
}

}else { //execute notifier kpg meron credit limit n nka set sa patient as "PATIENT"

if($credit > $limit) { //gwen red kpg Lagpas n sa limit

echo "<Td class='exceeded'>&nbsp;<font class='roomData'>".$row['Description']."</font>&nbsp;</td>";
if($patientData[0] != "") {
echo "<Td class='exceeded'>&nbsp;<a href='http://".$this->getMyUrl()."/Department/redirect.php?username=$username&registrationNo=".$this->viewCreditLimit_setter_registrationNo()."' target='_blank' class='Exceed'><font class='roomData'>".$patientData[1]."</font></a>&nbsp;</td>";
}else {
echo "<td class='exceeded'>&nbsp;</td>";
}

if($patientData[0] != "") {
echo "<Td class='exceeded'>&nbsp;<font class='roomData'>".number_format($credit,2 )."</font>&nbsp;</td>";
}else {
echo "<td class='exceeded'>&nbsp;</td>";
}

}else { //gwen black kpg ndi n Lgpas sa limit

echo "<Td>&nbsp;<font class='roomData'>".$row['Description']."</font>&nbsp;</td>";
if($patientData[0] != "") {
echo "<Td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/redirect.php?username=$username&registrationNo=".$this->viewCreditLimit_setter_registrationNo()."' target='_blank' class='unExceed'><font class='roomData'>".$patientData[1]."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;</td>";
}
if($patientData[0] != "") {
echo "<Td>&nbsp;<font class='roomData'>".number_format($credit,2 )."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;</td>";
}

}

}

echo "</tr>";
  }

echo "<tr>";
echo "<td>&nbsp;<font size=2><b>".$this->showAllRoom_room." Rooms</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2>Occupied&nbsp;<b>".$this->showAllRoom_occupied."</b>&nbsp;|&nbsp;Vacant&nbsp;<b>".$this->showAllRoom_vacant."</b></font>&nbsp;</td>";
echo "<td>&nbsp;<font size=2><b>".number_format($this->showAllRoom_credit,2)."</b></font>&nbsp;</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "</div>";
}


public $dischargedReport_admin_payment;
public $dischargedReport_admin_paid;
public $dischargedReport_admin_balance;

//dischargedReport pra sa admin
public function dischargedReport_admin($m,$d,$y,$m1,$d1,$y1,$username,$branch) {


echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
color:black;
}
</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $m."_".$d."_".$y;
$toDate = $m1."_".$d1."_".$y1;

if($branch == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "select upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,sum(pc.cashUnpaid) as totalAmount from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.type='IPD' and (rd.dateUnregistered between '$fromDate' and '$toDate') order by pr.lastName ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "select upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,sum(pc.cashUnpaid) as totalAmount from patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.type='IPD' and rd.branch = '$branch' and (rd.dateUnregistered between '$fromDate' and '$toDate') order by pr.lastName ");
}
echo "<center>";
echo "<font size=6>Discharged Patient</font><br>";
echo "<font size=3>$branch Branch</font><br>";
echo "<font size=2>($m $d, $y - $m1 $d1, $y1)</font>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Total Bill");
$this->coconutTableHeader("Paid");
$this->coconutTableHeader("Balance");
$this->coconutTableHeader("Admitted");
$this->coconutTableHeader("Discharged");
$this->coconutTableRowStop();
$x=1;
while($row=mysqli_fetch_array($result)) {
echo "<tr id='rowz'>";
$this->dischargedReport_admin_payment+=$row['totalAmount'];
$this->dischargedReport_admin_paid+=$this->getCurrentPaid($row['registrationNo'],"PATIENT","cashUnpaid");
$balance = $row['totalAmount'] - $this->getCurrentPaid($row['registrationNo'],"PATIENT","cashUnpaid");
$this->dischargedReport_admin_balance+=$balance;

$this->coconutTableData("".$x++);
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData(number_format($row['totalAmount'],2));
$this->coconutTableData(number_format($this->getCurrentPaid($row['registrationNo'],"PATIENT","cashUnpaid"),2));
$this->coconutTableData(number_format($balance,2));
$this->coconutTableData($row['dateRegistered']);
$this->coconutTableData($row['dateUnregistered']);
echo "</tr>";
}
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<font size=2><b>TOTAL</b></font>&nbsp;</td>";
echo "<td>&nbsp;".number_format($this->dischargedReport_admin_payment,2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($this->dischargedReport_admin_paid,2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format($this->dischargedReport_admin_balance,2)."&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
$this->coconutTableStop();

}	


public $showCart_discount;
public $showCart_total;

//iLLbas Lhat ng chinarge
public function showCart($registrationNo,$batchNo,$username) {


echo "
<style type='text/css'>
.data {
font-size:13px;
}

#rowz:hover {
background-color:yellow;
}

</style>


";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT pc.* FROM patientCharges pc where pc.registrationNo='$registrationNo' and pc.batchNo='$batchNo' order by pc.description asc  ");

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("Price");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("Discount");
$this->coconutTableHeader("Total");
$this->coconutTableRowStop();
while($row=mysqli_fetch_array($result)) {
echo "<tr id='rowz'>";
$this->showCart_discount += $row['discount'];
$this->showCart_total += $row['total'];
echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/ECART/deleteCart.php?registrationNo=$registrationNo&batchNo=$batchNo&itemNo=$row[itemNo]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a></td>";
$this->coconutTableData($row['description']);

if($row['title'] == "PROFESSIONAL FEE") {
$price = preg_split ("/\//", $row['sellingPrice']); 
$this->coconutTableData(number_format($price[0],2));
}else {
$this->coconutTableData(number_format($row['sellingPrice'],2));
}
$this->coconutTableData($row['quantity']);
$this->coconutTableData(number_format($row['discount'],2));
$this->coconutTableData(number_format($row['total'],2));
echo "</tr>";
}
echo "<tr>";
$this->coconutTableData("");
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData(number_format($this->showCart_discount,2));
$this->coconutTableData(number_format($this->showCart_total,2));
echo "</tr>";
$this->coconutTableStop();

}



public function hmoSOA_HB($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(company) as total FROM patientCharges where registrationNo = '$registrationNo' and title != 'PROFESSIONAL FEE' ");

while($row = mysqli_fetch_array($result))
  {
return $row['total'];
  }

}

public function hmoSOA_PF($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(company) as total FROM patientCharges where registrationNo = '$registrationNo' and title = 'PROFESSIONAL FEE' ");

while($row = mysqli_fetch_array($result))
  {
return $row['total'];
  }

}

public $hmoSOA_ipd_hb;
public $hmoSOA_ipd_pf;

public function hmoSOA_ipd($company,$fromDate_month,$fromDate_day,$fromDate_year,$toDate_month,$toDate_day,$toDate_year,$branch) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $fromDate_month."_".$fromDate_day."_".$fromDate_year;
$toDate = $toDate_month."_".$toDate_day."_".$toDate_year;

if($branch == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,pc.* FROM patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.Company='$company' and rd.type='IPD' and (rd.dateUnregistered between '$fromDate' and '$toDate')  group by rd.registrationNo order by lastName asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,pc.* FROM patientRecord pr,registrationDetails rd,patientCharges pc where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and rd.branch='$branch' and rd.Company='$company' and rd.type='IPD' and (rd.dateUnregistered between '$fromDate' and '$toDate') group by rd.registrationNo order by lastName asc ");
}

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Confinement Period");
$this->coconutTableHeader("Hospital Bill");
$this->coconutTableHeader("Professional Fee");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->hmoSOA_ipd_hb += $this->hmoSOA_HB($row['registrationNo']);
$this->hmoSOA_ipd_pf += $this->hmoSOA_PF($row['registrationNo']);
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData($row['dateRegistered']." - ".$row['dateUnregistered']);
$this->coconutTableData(number_format($this->hmoSOA_HB($row['registrationNo']),2));
$this->coconutTableData(number_format($this->hmoSOA_PF($row['registrationNo']),2));
$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableData("<b>Grand Total</b>");
$this->coconutTableData("");
$this->coconutTableData(number_format($this->hmoSOA_ipd_hb,2));
$this->coconutTableData(number_format($this->hmoSOA_ipd_pf,2));
$this->coconutTableRowStop();

$this->coconutTableStop();

}



public $collectionIPD_paid;

public function collectionIPD($fromMonth,$fromDay,$fromYear,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$branch) {

echo "<style type='text/css'>
#rowz:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $fromMonth."_".$fromDay."_".$fromYear;

$fromTime = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTime = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,pp.* from patientRecord pr,registrationDetails rd,patientPayment pp WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pp.registrationNo and rd.branch='$branch' and pp.datePaid='$fromDate' and (pp.timePaid between '$fromTime' and '$toTime')  "); 

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Room");
$this->coconutTableHeader("Balance");
$this->coconutTableHeader("Paid");
$this->coconutTableHeader("Received By");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<Tr id='rowz'>";
$current = $this->getCurrentCredit($row['registrationNo'],"PATIENT","cashUnpaid") - $this->getCurrentPaid($row['registrationNo'],"PATIENT","cashUnpaid");
$this->collectionIPD_paid += $row['amountPaid'];
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData($row['room']);
$this->coconutTableData(number_format($current,2));
$this->coconutTableData(number_format($row['amountPaid'],2));
$this->coconutTableData($row['paidBy']);
echo "</tr>";
  }
echo "<tr>";
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData(number_format($this->collectionIPD_paid,2));
$this->coconutTableData("");
echo "</tr>";
echo "</tr>";
$this->coconutTableStop();

}


public function collectionIPD_admin($fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear) {

echo "<style type='text/css'>
#rowz:hover { background-color:yellow; color:black; }
</style>";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $fromMonth."_".$fromDay."_".$fromYear;
$toDate = $toMonth."_".$toDay."_".$toYear;

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,pp.* from patientRecord pr,registrationDetails rd,patientPayment pp WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pp.registrationNo and (pp.datePaid between '$fromDate' and '$toDate') order by rd.branch asc  "); 

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Branch");
$this->coconutTableHeader("Balance");
$this->coconutTableHeader("Paid");
$this->coconutTableHeader("Received By");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<Tr id='rowz'>";
$current = $this->getCurrentCredit($row['registrationNo'],"PATIENT","cashUnpaid") - $this->getCurrentPaid($row['registrationNo'],"PATIENT","cashUnpaid");
$this->collectionIPD_paid += $row['amountPaid'];
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData($row['branch']);
$this->coconutTableData(number_format($current,2));
$this->coconutTableData(number_format($row['amountPaid'],2));
$this->coconutTableData($row['paidBy']);
echo "</tr>";
  }
echo "<tr>";
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData(number_format($this->collectionIPD_paid,2));
$this->coconutTableData("");
echo "</tr>";
echo "</tr>";
$this->coconutTableStop();

}




public $doctorPF_ipd_price;
public $doctorPF_ipd_pf;

public function doctorPF_ipd($fromDate_month,$fromDate_day,$fromDate_year,$toDate_month,$toDate_day,$toDate_year) {

echo "
<style type='text/css'>

#rowz:hover {
background-color:yellow;
}

</style>
";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromDate = $fromDate_month."_".$fromDate_day."_".$fromDate_year;
$toDate = $toDate_month."_".$toDate_day."_".$toDate_year;

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.*,pc.* FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and (rd.dateUnregistered between '$fromDate' and '$toDate') and pc.title = 'PROFESSIONAL FEE' order by pr.lastName asc ");

echo "<br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Name");
$this->coconutTableHeader("Branch");
$this->coconutTableHeader("Confinement Period");
$this->coconutTableHeader("Doctor");
$this->coconutTableHeader("Service");
$this->coconutTableHeader("Price / PF");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='rowz'>";
$price = preg_split ("/\//", $row['sellingPrice']); 
$this->doctorPF_ipd_price += $price[0];
$this->doctorPF_ipd_pf += $price[1];
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData($row['branch']);
$this->coconutTableData($row['dateRegistered']." - ".$row['dateUnregistered']);
$this->coconutTableData($row['description']);
$this->coconutTableData($row['service']);
$this->coconutTableData($row['sellingPrice']);
echo "</tr>";
  }
echo "<tr>";
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData($this->doctorPF_ipd_price."<font color=red>/</font>".$this->doctorPF_ipd_pf);
echo "</tr>";
$this->coconutTableStop();

}



public $censusRegistered_patient;

public function censusRegistered($month,$day,$year,$month1,$day1,$year1,$type,$branch) {

echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
}
</style>
";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$fromRegistered = $month."_".$day."_".$year;
$toRegistered = $month1."_".$day1."_".$year1;

if($branch == "All") {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,upper(pr.middleName) as middleName,rd.* FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and (dateRegistered between '$fromRegistered' and '$toRegistered' ) and rd.type='$type' order by lastName asc ");
}else {
$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,upper(pr.middleName) as middleName,rd.* FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and (dateRegistered between '$fromRegistered' and '$toRegistered') and branch='$branch' and rd.type='$type' order by lastName asc ");

}


echo "<br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Name");
$this->coconutTableHeader("Date Registered");
$this->coconutTableHeader("Time Registered");
$this->coconutTableHeader("Branch Registered");
$this->coconutTableHeader("Registered By");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<Tr id='rowz'>";
$this->censusRegistered_patient += 1;
$this->coconutTableData($row['lastName']." ".$row['firstName']." ".$row['middleName']);
$this->coconutTableData($row['dateRegistered']);
$this->coconutTableData($row['timeRegistered']);
$this->coconutTableData($row['branch']);
$this->coconutTableData($row['registeredBy']);
echo "</tr>";
  }
$this->coconutTableData("<b>TOTAL PATIENT</b>");
$this->coconutTableData("<b>".$this->censusRegistered_patient."</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableStop();

}


public $specialRoom_patient;

public function getPatientSpecialRoom($type,$branch) {

echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
}

a { text-decoration:none; color:black; }

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,rd.registrationNo FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and rd.type='$type' and rd.branch='$branch' order by lastName asc ");

echo "<br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Registration#");
$this->coconutTableHeader("Name");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
echo "<tr id='rowz'>";
$this->specialRoom_patient += 1;
echo "<td>&nbsp;".$row['registrationNo']."&nbsp;</td>";
echo "<tD>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?registrationNo=$row[registrationNo]' target='_blank'>".$row['lastName'].", ".$row['firstName']."</a>&nbsp;<tD>";
echo "</tr>";
  }
echo "<Tr>";
echo "<Td>&nbsp;<b>Total</b>&nbsp;</tD>";
echo "<td>&nbsp;".$this->specialRoom_patient."&nbsp;</tD>";
echo "</tr>";
echo "</table>";
}


public function checkCode($patientNo,$registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT patientNo,registrationNo FROM registrationDetails where patientNo='$patientNo' and registrationNo='$registrationNo' ");

if(mysqli_num_rows($result) == 1) {
session_start();
$_SESSION['registrationNo'] = $registrationNo;
header("Location:/COCONUT/Homepage/patientProfile_handler_homepage.php");
}else {
echo "
<script type='text/javascript'>
alert('No Matches to your Patient Code');
history.back();
</script>

";
}

}



public function transmitalDiagnosis($registrationNo) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT diagnosis FROM patientICD where registrationNo = '$registrationNo' ");
$x=1;
echo "<td>";
while($row = mysqli_fetch_array($result)){
echo "<font size=2>(".$x++.")".$row['diagnosis']."</font><br>";
  }
echo "</tD>";

}


public $phicTransmital_totalClaimed;

public function phicTransmital($month,$day,$year,$type) {


echo "
<style type='text/css'>

.data {
font-size:12px;
}

</style>

";

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$datez = $month."_".$day."_".$year;

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT rd.registrationNo,pr.lastName,pr.firstName,pr.middleName,rd.dateRegistered,rd.dateUnregistered,sum(pc.phic) as phic FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pr.phicType = '$type' and rd.dateUnregistered = '$datez' order by lastName asc ");

$x=1;

while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
$this->phicTransmital_totalClaimed += $row['phic'];
echo "<td border=0 >&nbsp;<font class='data'>".$x++."</font>&nbsp;</td>";
echo "<td width='18%'>&nbsp;<font class='data'>xxx</font> </td>";
echo "<td width='18%'><input type=text value='".$row['lastName'].", ".$row['firstName']."' style='border:0px; font-size:13px; width:auto; '> </td>";
echo "<td width='18%'><input type=text value='".$row['lastName'].", ".$row['firstName']."' style='border:0px; font-size:13px; width:auto; '> </td>";
echo "<td width='18%'><input type=text value='".$row['dateRegistered']." - ".$row['dateUnregistered']."' style='border:0px; font-size:13px; width:auto; '> </td>";
$this->transmitalDiagnosis($row['registrationNo']);
echo "<td width='18%'><input type=text value='".number_format($row['phic'],2)."' style='border:0px; font-size:15px; text-align:center; width:120px; '> </td>";
echo "</tr>";
  }
echo "<tr>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font size=2><b>TOTAL</b></font></tD>";
echo "<td>&nbsp;<font size=2>".number_format($this->phicTransmital_totalClaimed,2)."</font></tD>";
echo "</tR>";

}


public function addNewNote($registrationNo,$noteType,$noteBy,$noteMessage,$date,$time) {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }
((bool)mysqli_query( $con, "USE " . $this->database));

$sql="INSERT INTO patientNotes (registrationNo,noteType,noteBy,noteMessage,date,time)
VALUES
('".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $registrationNo) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $noteType) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $noteBy) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $noteMessage) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $date) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."','".((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $time) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""))."')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }


echo "<script type='text/javascript' >";
echo "alert('Your comment was Successfully Added');";
//echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";



((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}


//notes kapag nka login para ma-edit at ma-delete ng user
public function showNotes($registrationNo,$noteType) {

echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
}
a{
color:black;
text-decoration:none;
}
</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientNotes where registrationNo = '$registrationNo' order by date asc ");

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Note By");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Time");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();


while($row = mysqli_fetch_array($result))
  {
echo "<Tr id='rowz'>";
$this->coconutTableData($row['noteBy']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/viewDetailedNote.php?noteNo=$row[noteNo]&noteType=$row[noteType]&noteBy=$row[noteBy]&registrationNo=$row[registrationNo]&noteMessage=$row[noteMessage]'>".$row['date']."</a>");
$this->coconutTableData($row['time']);
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/editNote.php?noteNo=$row[noteNo]&registrationNo=$row[registrationNo]&noteMessage=$row[noteMessage]&noteType=$row[noteType]&noteBy=$row[noteBy]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/verifyDeleteNotes.php?noteNo=$row[noteNo]&noteBy=$row[noteBy]&noteType=$row[noteType]&date=$row[date]&registrationNo=$row[registrationNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
$this->coconutTableRowStop();
  }

$this->coconutTableStop();

}


//para sa online viewing ng patient .. wla itong edit at delete
public function showNotesGuest($registrationNo,$noteType) {

echo "
<style type='text/css'>
#rowz:hover {
background-color:yellow;
}
a{
color:black;
text-decoration:none;
}
</style>

";


$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM patientNotes where registrationNo = '$registrationNo' order by date asc ");

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Note By");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Time");
$this->coconutTableRowStop();


while($row = mysqli_fetch_array($result))
  {
echo "<Tr id='rowz'>";
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/viewDetailedNote.php?noteNo=$row[noteNo]&noteType=$row[noteType]&noteBy=$row[noteBy]&registrationNo=$row[registrationNo]&noteMessage=$row[noteMessage]'><font size='3' color=red>View</font></a>");
$this->coconutTableData($row['noteBy']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/viewDetailedNote.php?noteNo=$row[noteNo]&noteType=$row[noteType]&noteBy=$row[noteBy]&registrationNo=$row[registrationNo]&noteMessage=$row[noteMessage]'>".$row['date']."</a>");
$this->coconutTableData($row['time']);
//echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/editNote.php?noteNo=$row[noteNo]&registrationNo=$row[registrationNo]&noteMessage=$row[noteMessage]&noteType=$row[noteType]&noteBy=$row[noteBy]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
//echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientNotes/verifyDeleteNotes.php?noteNo=$row[noteNo]&noteBy=$row[noteBy]&noteType=$row[noteType]&date=$row[date]&registrationNo=$row[registrationNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";
$this->coconutTableRowStop();
  }

$this->coconutTableStop();

}



public function getGuestComment() {

$con = ($GLOBALS["___mysqli_ston"] = mysqli_connect($this->myHost, $this->username, $this->password));
if (!$con)
  {
  die('Could not connect: ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
  }

((bool)mysqli_query( $con, "USE " . $this->database));

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT noteMessage,date FROM patientNotes where noteType = 'guest' order by noteNo desc ");

while($row = mysqli_fetch_array($result))
  {
$this->coconutBoxStart_red("auto","auto");
echo "<font size=1 color=red>".$row['date']."</font><br><font size=2>".$row['noteMessage']."</font>";
$this->coconutBoxStop();
  }

((is_null($___mysqli_res = mysqli_close($con))) ? false : $___mysqli_res);

}



}


?>
