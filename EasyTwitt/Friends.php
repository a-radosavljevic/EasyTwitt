<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'User.php';
include_once 'UserDB.php';
include_once 'LocationDB.php';

include_once 'MySmarty.php';
session_start();
$smarty = new MySmarty();

include_once 'headerLogged.php';
$locations= LocationDB::returnAllPlaces();
$smarty->assign("locations", $locations);
if(isset($_GET["user"]))
{
    $user= UserDB::ReadUserByUsername($_GET["user"]);
}
 else {
    $user=$_SESSION["activeUser"];
}

//$user= UserDB::ReadUserByUsername($u);
$friends=array();
if(isset($_GET["sbmUsername"]))
{
    $fr=UserDB::GetUsersByUsername($user, $_GET["userUsername"]);
    if($fr!=null)
        $friends[]=$fr;
    
}
 else 
     if (isset($_GET["sbmFindPeople"])){
     $friends= UserDB::returnAllUsers($user);
     //var_dump($friends);
 }
 else 
     if(isset ($_GET["sbmMyFriends"]))
     {
         $friends= UserDB::returnAllFriends($user);
     }
     else
         if(isset($_GET["sbmTown"]))
             {
                $friends=UserDB::GetUsersByLocation($user, $_GET["selLok"]);
            
             }
     else 
         if(isset($_GET["sbmNameSurname"])){
             $name="";
             $surname="";
             $ns= $_GET["userNameSurname"];
             $arr = explode(' ',trim($ns));
             if(count($arr)>=2)
             {
                 $name=$arr[0];
                 $surname=$arr[1];
             }
        
              $friends=UserDB::GetUsersByName($user, $name, $surname);
         }
 else {
     $friends= UserDB::returnAllFriends($user);
 }


$smarty->assign("user",$user->username);
$smarty->assign("friends", $friends);
$smarty->display('friends.tpl');

include_once 'footer.php';
