<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'User.php';
include_once 'UserDB.php';

include_once 'MySmarty.php';
include_once 'LocationDB.php';
include_once 'Commercial.php';
include_once 'CommercialDB.php';

session_start();

$smarty = new MySmarty();

$u=null;

if(isset($_SESSION["activeUser"]))
    $u=$_SESSION["activeUser"];

if(isset($_POST["btnDelete"]))
{
   // var_dump($_POST);
    $id=$_POST["commId"];
    CommercialDB::DeleteCommercial($id);
}

$commercials= CommercialDB::ReadUsersCommercials($u);
//var_dump($commercials);
include_once 'headerLogged.php';

$smarty->assign("commercials", $commercials);
$smarty->display("commercials.tpl");

include_once 'footer.php';
