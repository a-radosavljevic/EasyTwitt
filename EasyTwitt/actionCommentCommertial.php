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

include_once 'redisCommercialComments.php';
include_once 'CommercialDB.php';


$smarty = new MySmarty();

$u=null;

if (isset($_POST["btnSubmit"])) {
    
    $id = $_POST["hdnCommercialId"];
	$text = $_POST["txtComm"];
	
	$comm = CommercialDB::ReadCommercialById($id);
	
	
	redisCommercialComments::leaveComment($id, $comm, $text);
}

        include_once 'actionLog.php';