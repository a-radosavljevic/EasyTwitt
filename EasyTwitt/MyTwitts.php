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
include_once 'LocationDB.php';
include_once 'CommercialDB.php';
include_once 'RedisCommercialComments.php';

session_start();

$smarty = new MySmarty();

$u=null;

if(isset($_SESSION["activeUser"]))
    $u=$_SESSION["activeUser"];

include_once 'headerLogged.php';
        
        $locations= LocationDB::returnAllPlaces();
        $smarty->assign("locations", $locations);
        $smarty->assign("name", $u->name);
        $smarty->assign("surname", $u->surname);
        $smarty->assign("email", $u->email);
        $smarty->assign("username", $u->username);
        
        $smarty->assign("city", $u->location->town);
        $smarty->assign("state", $u->location->state);

        $arr= TwittDB::GetUserTwitts($u);
       //var_dump($arr);
        $smarty->assign("twitts",$arr);
      
        $smarty->assign("num", count($arr)-1);
        
        $fof= UserDB::returnFriendsOfFriends($u);
        $smarty->assign("fof", $fof);
       
        $smarty->assign("userr", $u);
        $commercials= CommercialDB::ReadAllCommercials();
        $smarty->assign("commercials", $commercials);
        $me=true;
        $smarty->assign("me", $me);
        $smarty->display('index.tpl');

        include_once 'footer.php';
