<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link REL="SHORTCUT ICON" HREF="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php mysql_connect("localhost","root",""); mysql_select_db("kmsci"); $headingsql=mysql_query("SELECT heading FROM heading"); while($headingfetch=mysql_fetch_array($headingsql)){ echo $headingfetch['heading']; } ?></title>
<style type="text/css">
<!--
.style1 {
	font-size: 25px;
	font-weight: bold;
}
.style6 {
	font-family: Verdana;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 10px;
}
.style10 {
	font-family: Verdana;
	font-weight: bold;
	color: #FFFFFF;
	font-size: 12px; }
.style13 {
	font-family: Arial;
	font-weight: bold;
	font-size: 24px;
	color: #FF9900;
}
.style14 {
	font-family: Arial;
	font-size: 14px;
}
.style16 {
	font-family: Verdana;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
</head>

<body bgcolor="#FFFFDF">
<?php
echo "<div align='center'>
  <table width='950' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td height='83' colspan='2' bgcolor='#F7F7F7'><div align='center' class='style1'>CLINIC SYSTEMS, INC. </div></td>
    </tr>
    <tr>
      <td width='191' rowspan='2'>";
$con = mysql_connect("localhost","root","");
if (!$con){
die('Could not connect: ' . mysql_error());
}

mysql_select_db("kmsci", $con);

$ipaddresssql=mysql_query("SELECT * FROM ipaddress");
while($ipaddressfetch=mysql_fetch_array($ipaddresssql)){

echo "<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#FFFFFF' bgcolor='#A6BE74'>
        <tr>
          <td height='8' background='mnu_topshadow.gif'></td>
        </tr>

        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://localhost/Rehab/admissionUpdate.php' title='EMERGENCY ROOM'><div align='center' class='style6'>ADMISSION</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/ERlogin.php' title='E. R.'><div align='center' class='style6'>E. R.</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/NURSINGSERVICElogin.php' title='NURSING SERVICE'><div align='center' class='style6'>NURSING SERVICE</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/DIETlogin.php' title='DIETARY'><div align='center' class='style6'>DIETARY</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/REHABlogin.php' title='REHAB'><div align='center' class='style6'>REHAB</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/PHARMACYlogin.php' title='PHARMACY'><div align='center' class='style6'>PHARMACY</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/XRAYlogin.php' title='RADIOLOGY'><div align='center' class='style6'>RADIOLOGY</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/LABORATORYlogin.php' title='LABORATORY'><div align='center' class='style6'>LABORATORY</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/CSRPHARMACYlogin.php' title='CSR PHARMACY'><div align='center' class='style6'>CSR PHARMACY</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/cgi-bin/nstransor.cgi' title='OR/DR'><div align='center' class='style6'>OR/DR</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/BILLINGlogin.php' title='BILLING'><div align='center' class='style6'>BILLING</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/CASHIERlogin.php' title='CASHIER'><div align='center' class='style6'>CASHIER</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/MEDICARElogin.php' title='LABORATORY'><div align='center' class='style6'>MEDICARE</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/mmshisearch1.php' title='MEDICAL SERVICES'><div align='center' class='style6'>MEDICAL SERVICES</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/HMOlogin.php' title='HMO'><div align='center' class='style6'>HMO</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/DOCTORSlogin.php' title='DOCTORS LOG'><div align='center' class='style6'>DOCTORS LOG</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/ADMINlogin.php' title='ADMIN'><div align='center' class='style6'>ADMIN</div></a></td>
        </tr>
        <tr>
          <td height='30' onMouseOver=this.style.backgroundColor='#514F1C' onMouseOut=this.style.backgroundColor='#A6BE74'><a href='http://".$ipaddressfetch['ipaddress']."/cgi-bin/cpuauth.cgi' title='CPU'><div align='center' class='style6'>CPU</div></a></td>
        </tr>
        <tr>
          <td height='8' background='mnu_bottomshadow.gif'></td>
        </tr>
      </table>";
}

mysql_close($con);
	  echo "</td>
      <td width='759' height='549' bgcolor='#F7F7F7'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='2%' height='50'>&nbsp;</td>
          <td width='96%' bgcolor='#EEEEEE'><div align='left' class='style13'>Mission</div></td>
          <td width='2%'>&nbsp;</td>
        </tr>
        <tr>
          <td height='190'>&nbsp;</td>
          <td valign='top' bgcolor='#EEEEEE'><div align='justify' class='style14'>Alabang Medical Clinic, a Second Level Health Care  facility, located at   Montillano Alabang was  built to provide quality, value driven health   care to a  patient-centered, family-focused environment. We assure every   patient  that comes to us access to quality health care regardless of   ability to  pay. We are committed to service excellence and continuous   performance  improvement. As a community health care services provider,   we remain  attentive to the health and well-being of those we serve. </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height='50'>&nbsp;</td>
          <td bgcolor='#EEEEEE'><div align='left' class='style13'>Vission</div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height='190'>&nbsp;</td>
          <td valign='top' bgcolor='#EEEEEE'><div align='justify' class='style14'>Alabang Medical Clinic strives to maintain a highly  competitive health   care provider to residents of its service areas  while advocating the   never-ending quest for a healthier world, through  our culture of   caring. </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height='30'>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height='30' bgcolor='#000000'><div align='center' class='style16'>CEREBRUM&nbsp;&copy;&nbsp;2011 </div></td>
    </tr>
  </table>
</div>";
?>
</body>
</html>
