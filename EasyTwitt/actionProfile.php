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
session_start();

$smarty = new MySmarty();

$u=null;

if (isset($_GET["user"])) {
    
    $u = UserDB::ReadUserByUsername($_GET["user"]);
}
if(isset($_SESSION["activeUser"]))
    $au=$_SESSION["activeUser"];

if(isset($_POST ["btnLike"]))
{
    
    $tw= TwittDB::read($_POST["hdnTwittId"]);
   
    TwittDB::UserLikedTwitt($au, $tw);
    //$u=$_POST["hdnUser"];
    //header("location:actionProfile?user=".$u);
}
else
    if(isset ($_POST["btnAddFriend"]))
    {
        UserDB::FriendRequest($au, $u);
    }
    else
        if(isset ($_POST["btnAccept"]))
        {
            UserDB::AcceptFriendRequest($au, $u);
        }

if ($u) {
        include_once 'headerLogged.php';
        

        $smarty->assign("name", $u->name);
        $smarty->assign("surname", $u->surname);
        $smarty->assign("email", $u->email);
        $smarty->assign("username", $u->username);
        
        $smarty->assign("city", $u->location->town);
        $smarty->assign("state", $u->location->state);

        $arr= TwittDB::getUserTwitts($u);
       
        
        $smarty->assign("twitts",$arr);
      
        $smarty->assign("num", count($arr)-1);
        
        $mf= UserDB::getMutualFriends($au, $u);
        
        $smarty->assign("mf", $mf);
        
        $friendsCount = count($mf);
        $accept=false;
        $smarty->assign("friendsCount", $friendsCount);
        
        if(UserDB::AreWeFriends($au, $u))
        {
            $smarty->assign("areFriends", TRUE);
            $smarty->assign("isRequestSent", FALSE);
        }
        else if(UserDB::isRequestSent($au, $u))
        {
           
            $smarty->assign("areFriends", FALSE);
            $smarty->assign("isRequestSent", TRUE);
            
        }
        else if(UserDB::isRequestSent($u, $au))
        {
            $accept=true;
             $smarty->assign("areFriends", FALSE);
            $smarty->assign("isRequestSent", FALSE);
        }
        else
        {
            $smarty->assign("areFriends", FALSE);
            $smarty->assign("isRequestSent", FALSE);
        }
        
        $smarty->assign("accept", $accept);
       $smarty->assign("userr", $au);
        $smarty->display('profile.tpl');

        include_once 'footer.php';
    }
    /*else
    {
        echo "<script type='text/javascript'>alert('Pogrešni podaci !');</script>";
    }*/
