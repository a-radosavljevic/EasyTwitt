<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'MySmarty.php';
include_once 'CommercialDB.php';

$smarty = new MySmarty();

session_start();
$show=false;
if(isset($_GET["yes"]))
{
    $_SESSION["admin"]="admin";
}
if(isset ($_POST["btnDelete"]))
{
    TwittDB::delete($_POST["hdnIdTwitt"]);
}


if(isset($_POST["btnLogout"]))
{
    unset($_SESSION["admin"]);
    header("location:index.php");
}

$smarty->display('adminHeader.tpl');
$smarty->assign("show", $show);

$commercials= CommercialDB::ReadAdminCommercial();

$smarty->assign("commercials", $commercials);

$smarty->display('start.tpl');

include_once 'footer.php';