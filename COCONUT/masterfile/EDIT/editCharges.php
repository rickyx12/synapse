<?php
include("../../../myDatabase.php");
$chargesCode = $_GET['chargesCode'];
$description = $_GET['description'];
$service = $_GET['service'];
$category = $_GET['category'];
$opd = $_GET['opd'];
$ward = $_GET['ward'];
$soloward = $_GET['soloward'];
$semiprivate = $_GET['semiprivate'];
$private = $_GET['private'];

$ro = new database();
$module = $_GET['module'];
$username = $_GET['username'];
?>

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
</script>
<font size=4><?php echo $module; ?></font>
<?php
echo "
<style type='text/css'>
.txtBox {
	border: 1px solid #CCC;
	color: #999;
	height: 20px;
	width: 300px;
}

.prices {
	border: 1px solid #CCC;
	color: #000;
	height: 20px;
	width: 70px;

}
</style>

";
/*
echo "<table id='headz' border=0 bgcolor='#3b5998' width='100%'>
<td>&nbsp;&nbsp;<font size=5 color=white><b>Maintenance > $module</b></font></td></table>";
*/

echo "
<form method='get' action='editCharges1.php'>
<Br>
<div style='border:1px solid #000000; width:400px; height:270px; border-color:black black black black;'><br>
&nbsp;<font size=2>Description:</font>&nbsp;<input type=text name='description' value='$description' class='txtBox'><Br>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>Service:</font>&nbsp;
<select name='services' style='border:1px solid #000000; width:200px; height:20px;  ' >";
echo "<option value='$service'>$service</option>";
$ro->categoryService($module);
echo "</select>
<br><br>
---------------------------- PRICE's -------------------------------------<Br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1>OPD:</font>&nbsp;<input type=text name='opdprice' value=' $opd' class='prices'>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1>WARD:</font>&nbsp;<input type=text name='wardprice' value=' $ward' class='prices'><br>
<input type=hidden name='category' value='$module'>
<input type=hidden name='username' value='$username'>
&nbsp;&nbsp;&nbsp;<font size=1>SOLO WARD:</font>&nbsp;<input type=text name='solowardprice' value=' $soloward' class='prices'><br>

&nbsp;<font size=1>SEMI PRIVATE:</font>&nbsp;<input type=text name='semiprivateprice' value=' $semiprivate' class='prices'><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1>PRIVATE:</font>&nbsp;<input type=text name='privateprice' value=' $private' class='prices'>
<input type=hidden name='chargesCode'  value='$chargesCode' >
<Br><Br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value='EDIT CHARGES >>' style='border:1px solid #000000; background-color:#3b5998; color:white;'>
</form>

</div>
";


?>
