<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

include_once "User.php";
include_once "UserDB.php";
include_once "Event.php";
include_once "EventDB.php";
include_once "Location.php";
include_once "LocationDB.php";
include_once "TwittDB.php";
include_once 'NotificationDB.php';

//$u->ReadUser();
$user2= UserDB::ReadUser('u2@u2.u2', 'u2');
$user3=UserDB::ReadUser('u3@u3.u3', 'u3');
$user1= UserDB::ReadUser("u1@u1.u1", "u1");
$loc=LocationDB::read(0);


$event= new Event("Hello February", 00, 00, 1, 2, 2019, "Start of the february festival!!!!", 0);
$tw= TwittDB::read(0);
$tt= new Twitt(0, $user3, null, "Hi helloo ",null, null, 11, 1, 2019, 0, 0 );
//TwittDB::create($tt);
//UserDB::AcceptFriendRequest($user2, $user1);
//$arr= UserDB::ShowRelevantTwitts($user2);
//EventDB::CreateEvent($event, $user2, $loc);
//EventDB::UserIsGoingToEvent($user3, 101);

//EventDB::UpdateAnEvent(101, $event);
//$res=EventDB::UsersEvents($user3);
//EventDB::ReportEvent(101, $user3);
//EventDB::DeleteEventById(29);
//$Host=EventDB::UsersGoingToAnEvent(101);
//var_dump($Host);
//var_dump($res);
//EventDB::CreateEvent($event, $user2, $loc);
$noti= NotificationDB::ReadUsersNotifications($user1);
var_dump($noti);
        ?>
    </body>
</html>