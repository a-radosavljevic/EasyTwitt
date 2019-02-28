<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'MySmarty.php';//("MySmarty.php");

include_once 'UserDB.php';
include_once 'MessageDB.php';
session_start();

$smarty = new MySmarty();

$u = $_SESSION["activeUser"];

$poruke=MessageDB::ReadConversations($u);

$da = false;
$display = false;
$name = false;
$porukice = false;
$other = false;

if(isset($_POST["btnShowChat"]))
{
    $other = UserDB::ReadUserByUsername($_POST["other"]);
    
    $name = $other->name . " " . $other->surname;
    
    
    $display = $other->location->town . ", " . $other->location->state;
    
    $da = true;
    
}

if(isset($_POST["btnSendMessage"]))
{
    $other = UserDB::ReadUserByUsername($_POST["otherSend"]);
    
    $name = $other->name . " " . $other->surname;

    
    
    $da=true;
    
    if($_POST["txt"]=="" || $_POST["txt"]==NULL )
    {
        echo "<script type='text/javascript'>alert('Niste uneli tekst poruke!');</script>";
    }
    else
    {
        $text=$_POST["txt"];
        
        MessageDB::CreateMessage($text, $u, $other);
        
    }
}

if($da)
{
    $porukice = MessageDB::ShowMessages($u, $other);
}

include_once 'headerLogged.php';

$smarty->assign("name", $name);
$smarty->assign("display", $display);
$smarty->assign("da", $da);
$smarty->assign("poruke", $poruke);
$smarty->assign("porukice", $porukice);
$smarty->assign("other", $other);
$smarty->assign("u", $u);

$smarty->display('messages.tpl');

include_once 'footer.php';

?>