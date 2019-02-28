<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'User.php';
include_once 'UserDB.php';
include_once 'PictureDB.php';
include_once 'MySmarty.php';
session_start();

$user=$_SESSION["activeUser"];
$pictures= PictureDB::getUsersTwittPhotos($user);

$smarty = new MySmarty();
include_once 'headerLogged.php';
$smarty->assign("pictures", $pictures);
$smarty->display('pictures.tpl');



include_once 'footer.php';