<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'UserDB.php';
include_once 'LocationDB.php';
include_once 'Event.php';
include_once 'EventDB.php';
include_once 'MySmarty.php';
include_once 'redisEventMessages.php';

session_start();
$smarty = new MySmarty();
$user=$_SESSION["activeUser"];
if(isset($_GET["deleteEvent"]))
{
    EventDB::DeleteEventById($_GET["id"]);
     header("location:actionLog.php");
           exit();
}
else
    if(isset($_POST["subGoing"]))
{
    $ev=$_POST["hdnEvent"];
    EventDB::UserIsGoingToEvent($user, $ev);
    header("location:eventAction.php?event=".$ev);
           exit();
}
 else if(isset ($_GET["event"])) {
    
$event= EventDB::ReadEventByInternalId($_GET["event"]);

$host= EventDB::EventsHost($event->id);



$me=false;
if($host->username==$user->username)
    $me=true;
$yes= EventDB::AreYouGoing($user, $event->id);
$friendsGoing= EventDB::FriendsGoingToEvent($user, $event->id);

$dt=new DateTime();
			$y=$dt->format('Y');
			$m=$dt->format('m');
			$d=$dt->format('d');
			
if($event->year == $y && $event->day == $d && $event->month == $m)
	$isToday=TRUE;
else
	$isToday=FALSE;

include_once 'headerLogged.php';

$smarty->assign("isToday", $isToday);

$smarty->assign("friends", $friendsGoing);
$smarty->assign("event", $event);
$smarty->assign("host", $host);
$smarty->assign("yes", $yes);
$smarty->assign("me", $me);
$smarty->display('eventProfile.tpl');

include_once 'footer.php';
}