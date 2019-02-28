<?php
    
include_once 'MySmarty.php';//("MySmarty.php");

include_once 'LocationDB.php';

include_once 'CommercialDB.php';

include_once 'RedisDB.php';

$smarty = new MySmarty();

session_start();

$show=false;

if(isset($_POST["btnLogout"]))
{
	$u = $_SESSION["activeUser"];
	RedisDB::deleteUser($u->email);
    unset($_SESSION["activeUser"]);
}
if(!isset($_SESSION["activeUser"]) AND !isset($_SESSION["admin"]))
{
    $show=true;
}

$locations= LocationDB::returnAllPlaces();

if(!isset($_SESSION["activeUser"]))
{
    include_once 'header.php';
}
else
{
    include_once 'headerLogged.php';
}

$commercials= CommercialDB::ReadAdminCommercial();

$smarty->assign("commercials", $commercials);
$smarty->assign("show", $show);
$smarty->assign("locations", $locations);
$smarty->display('start.tpl');

include_once 'footer.php';
?>