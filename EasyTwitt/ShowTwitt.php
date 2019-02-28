<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'User.php';
include_once 'UserDB.php';
include_once 'TwittDB.php';
include_once 'CommentDB.php';
include_once 'MySmarty.php';
include_once 'CommentDB.php';
session_start();

$user=null;

if(isset($_SESSION["activeUser"]))
{
    $user=$_SESSION["activeUser"]; 
}


$admin=false;

if(isset($_SESSION["admin"]))
    $admin=true;

$smarty = new MySmarty();


$tw= TwittDB::read($_GET["id"]);
$userr=$tw->user;
$me=false;

if($admin)
{
    $smarty->display ('adminHeader.tpl');
    $me=false;
}
    
else{
    if($user->username==$userr->username)
    $me=true;
   include_once 'headerLogged.php'; 
}
//$smarty->assign("pictures", $pictures);
if(isset($_GET["btnLike"]))
{
    TwittDB::UserLikedTwitt($user, $tw);
    $tw= TwittDB::read($_GET["id"]);
}
if(isset($_GET["btnComment"]))
{
    $text=$_GET["txtComment"];
    $dt= new DateTime("now", new DateTimeZone("Europe/Belgrade"));
		$h= $dt->format("H");
		$mi=$dt->format("i");
		$s=$dt->format("s");
		$y=$dt->format("Y");
		$mo=$dt->format("m");
		$d=$dt->format("d");
    $com=new Comment($h, $mi, $s, $d, $mo, $y, $text );
    CommentDB::CreateComment($com, $user, $tw);
    
		
        $date=$dt->format("Y-m-d H:i:s");
        $n=new Notification($date, $user->username, "commented", $tw);
        NotificationDB::CreateNotification($n, $tw->user);
        //var_dump($n);
    $tw= TwittDB::read($_GET["id"]);
}
 else
     if (isset ($_POST["btnDelete"]))
         {
         TwittDB::delete($tw);
         header("location:MyTwitts.php");
     }
     else
         if (isset ($_POST["btnReport"]))
         {
             TwittDB::ReportTwitt($tw);
             
         }
$smarty->assign("admin", $admin);
$smarty->assign("me", $me);
$smarty->assign("twitt", $tw);
$smarty->assign("userr", $user);
$smarty->display('twitt.tpl');



include_once 'footer.php';