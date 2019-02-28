<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'User.php';
include_once 'UserDB.php';
include_once 'TwittDB.php';
include_once 'MySmarty.php';
include_once 'NotificationDB.php';


session_start();

$smarty = new MySmarty();

$u=null;
if(isset($_SESSION["activeUser"]))
{
    $u=$_SESSION["activeUser"];
    
}
if(isset($_POST["btnDelete"]))
{
    $n=$_POST["hdnIdN"];
    NotificationDB::DeleteNotification($n);
}

$notifications= NotificationDB::ReadUsersNotifications($u);
$frqs= UserDB::returnAllFriendRequests($u);
include_once 'headerLogged.php';

$smarty->assign("notifications", $notifications);
$smarty->assign("frs", $frqs);
$smarty->display('Notifications.tpl');

include_once 'footer.php';