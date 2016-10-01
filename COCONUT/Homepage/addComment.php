<?php
include("../../myDatabase.php");
$comment = $_POST['comment'];
$ro = new database();

if($comment != "") {
$ro->addNewNote("","guest","guest",$comment,date("M d, Y"),$ro->getSynapseTime());
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/Homepage/homepage.php");
}else {
header("http://".$ro->getMyUrl()."/COCONUT/Homepage/homepage.php");
}
?>
