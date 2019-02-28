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

$smarty = new MySmarty();


if (isset($_POST["btnSubmit"])) {
    
    $id = $_POST["hdnEvent"];
	$text = $_POST["txtComm"];
	
	$event = EventDB::ReadEventByInternalId($id);
	
	redisEventMessages::sendMessage($event, $text);
	
	//include_once 'eventAction.php?id=' . $id;
	header("location: eventAction.php?event=" . $id);
}