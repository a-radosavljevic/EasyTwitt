<?php

include_once 'User.php';
include_once 'UserDB.php';
include_once 'TwittDB.php';
include_once 'MySmarty.php';
include_once 'LocationDB.php';
include_once 'Commercial.php';
include_once 'CommercialDB.php';
include_once 'redisCommercialComments.php';
include_once 'RedisDB.php';
session_start();

$smarty = new MySmarty();

$u=null;

if (isset($_POST["btnLogin"])) {
    
    if($_POST["Username"]=='admin' AND $_POST["Password"]=='admin')
    {
        header("location:Admin.php?yes=1");
        exit();
    }
    $u = UserDB::ReadUserUsername($_POST["Username"], $_POST["Password"]);
    $_SESSION["activeUser"]=$u;
	RedisDB::saveUser($u);
}
else if(isset($_POST["btnRegister"]))
{
    $u = new User($_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"], $_POST["username"], $_POST["city"], $_POST["state"]);
    UserDB::CreateUser($u);
    $_SESSION["activeUser"]=$u;
	RedisDB::saveUser($u);
}
else { }
if(isset($_SESSION["activeUser"]))
{
    $u=$_SESSION["activeUser"];
}
if(isset($_POST["btnLike"]))
{
   
    $t= TwittDB::read($_POST["hdnTwittId"]);
    TwittDB::UserLikedTwitt($u, $t);
    
}

if ($u) {
        include_once 'headerLogged.php';
        
        $locations= LocationDB::returnAllPlaces();
        $smarty->assign("locations", $locations);
        $smarty->assign("name", $u->name);
        $smarty->assign("surname", $u->surname);
        $smarty->assign("email", $u->email);
        $smarty->assign("username", $u->username);
        
        $smarty->assign("city", $u->location->town);
        $smarty->assign("state", $u->location->state);

        //$arr= UserDB::ShowRelevantTwitts($u);
		$arr = RedisDB::readUser($u->email);
        $smarty->assign("twitts",$arr);
       // var_dump($arr);
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
    }
    else
    {
        echo "<script type='text/javascript'>alert('Pogrešni podaci !');</script>";
    }
