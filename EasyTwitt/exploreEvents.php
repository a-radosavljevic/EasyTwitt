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
session_start();
$smarty = new MySmarty();

include_once 'headerLogged.php';
$locations= LocationDB::returnAllPlaces();
$smarty->assign("locations", $locations);

 $user=$_SESSION["activeUser"];
 
 if(isset($_GET["sbmTown"]))
 {
     $loc=$_GET["selLok"];
     $l= LocationDB::read($loc);
     $events= EventDB::ReturnAllEventsOnLocation($l);
 }
 else
     if(isset ($_GET["sbmEventName"]))
     {
         $name=$_GET["eventName"];
         $events= EventDB::ReturnEventsByName($name);
     }
     else
         if(isset ($_GET["sbmDate"]))
         {
             $date=$_GET["eventDate"];
             
             $arr= explode("-", $date);
             $y=$arr[0];
             $m=$arr[1];
             $d=$arr[2];
             
             $events= EventDB::ReturnEventsOnDate($d, $m, $y);
         }
     else
 {
      $events= EventDB::ReturnAllEvents($user);
 }


 
 $smarty->assign("user",$user->username);
$smarty->assign("events", $events);
$smarty->display('events.tpl');

include_once 'footer.php';