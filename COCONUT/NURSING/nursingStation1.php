<?php
include("../../myDatabase.php");
$branch = $_GET['branch'];
$floor = $_GET['floor'];
$ro = new database();
$ro->coconutAjax("2000","http://".$ro->getMyUrl()."/COCONUT/NURSING/nsRoom.php?branch=$branch&floor=$floor");
?>
