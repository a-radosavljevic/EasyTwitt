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

$locations= LocationDB::returnAllPlaces();

$user=$_SESSION["activeUser"];
if(isset($_POST["btnCreate"]))
{
    //var_dump($_POST);
    $info=$_POST["txtInfo"];
    $name=$_POST["txtName"];
    $hour=$_POST["selHour"];
    $min=$_POST["selMinute"];
    $loc= LocationDB::read($_POST["selLok"]);
     $date=$_POST["eventDate"];
     $arr= explode("-", $date);
     $y=$arr[0];
     $m=$arr[1];
     $d=$arr[2];
     $event=new Event($name,$hour,$min,$d, $m, $y, $info, 0);
     EventDB::CreateEvent($event, $user, $loc);
     
     header("location:EventsAction.php");
}

include_once 'headerLogged.php';

$smarty->assign("locations", $locations);

$smarty->display('newEvent.tpl');

include_once 'footer.php';