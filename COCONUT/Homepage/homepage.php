<?php
include("../../myDatabase.php");
session_start();
$ro = new database();
unset($_SESSION['registrationNo']);
//echo "<style type='text/css'>@import url('http://localhost/COCONUT/myCSS/newCSS.css');</style>";

?>


<div id="main" style="border:1px solid #000; height:auto; width:620px; border-color:white black white black; 
        margin-left:10.2em;
        margin-right:17.2em;
        padding-left:1em;
        padding-right:1em;

">

<div style="border:1px solid #000; height:auto; width:600px; border-color:black black black black; ">
<br><center><font size=3 color=red><?php echo $ro->getReportInformation("hmoSOA_name"); ?></font>
<br>
<font size=2><?php echo $ro->getReportInformation("hmoSOA_address"); ?></font>
<br><br>
</div>
<br>
<font size=2>Synapse intend to support the basic operation of the healthcare provider. <b>IPD</b>, <b>OPD</b>, <b>PhilHealth</b>, <b>HMO</b>, <b>Doctor's PF</b> and the <b>Inventory</b>.it also has an ability to generate a report like <b>Census</b>, <b>Current Inventory</b>, <b>Usages</b>, <b>Remittance</b>, <b>HMO SOA</b>, <b>Doctor's PF</b> and <b>Collection Report</b>.Synapse also intend to be the medium between the <b>Patient</b> and the <b>Hospital</b> by allowing the Patient to view Their <b>Current Bill</b>, <b>SOA</b>, <b>Examination Result's</b> etc. via Online.
</font>
<br><br>
<?php echo $ro->coconutImages("synapseIdeas.jpg"); ?>

<br><br>
<form method="post" action="addComment.php">
<Center><font size=2 color=red>Leave Your Comment Here</font></center>
<center><textarea style=" border:1px solid #000; width:490px; height:90px; " name="comment"> </textarea><center>
<?php $ro->coconutButton("Send Comment"); ?>
</form>

<?php $ro->getGuestComment(); //ippkta Lhat ng comment from d guest ?>

</div>

<div id="list1" class="link-list" style="border:0px solid #000; height:auto; border-color:white black white white; 
        width:10.2em;
        position:fixed;
        top:0;
        font-size:80%;
        padding-left:1%;
        padding-right:1%;
        margin-left:0;
        margin-right:15;
	left:0;
 ">
<br>
<font size=3>Patient's Portal</font><hr>
<font size=1>You can <b>View</b> and <B>Download</b> a copy of your Running Bill, Examiination Results by Entering your</font> <font size=1 color=red>Patient Code</font>
<br>
<Br><br>
<font size=1 color=red>*Demo Only</font><Br>
<font size=1>Patient Code</font>&nbsp;&nbsp;<br>
<form method="post" action="checker.php">
<input type=text name="code" autocomplete="off" style="border:1px solid #000; width:138px;" value="153_351"><Br>
<input type="submit" value="Proceed" style="background-color:white; border:1px solid #000; font-size:12px; height:20px;">
</form>
<br><br>
<font size=1 color=red>*Patient Code is the code that was given to you by the nurse's or the billing staff.
<br><br>
 *if you dont know you're code or you have a question. Pls Ask to nurse's or the billing for further assistance</font>
</div>


<div id="list2" class="link-list" style="border:0px solid #000; height:528px; border-color:white white white black;         width:10.2em;
        position:fixed;
        top:0;
        font-size:80%;
        padding-left:1%;
        padding-right:1%;
        margin-left:0;
        margin-right:15;
	right:0; ">

<?php 
//528px
echo "<center><Br><br>";
echo "<img src='http://".$ro->getMyUrl()."/COCONUT/myImages/linux.jpeg'>";
echo "<font size=2 color=red>Linux</font> <br><font size=2> Synapse use the Linux platform for it's server</font>";
echo "<Br>";
echo "<img src='http://".$ro->getMyUrl()."/COCONUT/myImages/mysql.jpeg'>";
echo "<font size=2 color=red>MySQL</font> <br><font size=2> Synapse use the MySQL for it's Database</font>";
echo "<br><br>";
echo "<img src='http://".$ro->getMyUrl()."/COCONUT/myImages/php.jpeg'>";
echo "<font size=2 color=red>PHP</font> <br><font size=2> Synapse use the PHP to make it works in the browser</font>";
echo "<br><Br><Br>";
echo '


';
 ?>
</div>



