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
include_once 'Picture.php';
include_once 'PictureDB.php';
include_once 'LocationDB.php';
include_once 'Location.php';
include_once 'Commercial.php';
include_once 'CommercialDB.php';
session_start();

$smarty = new MySmarty();

$u=null;

if(isset($_SESSION["activeUser"]))
    $u=$_SESSION["activeUser"];
if(isset($_POST["btnPost"]))
{
  //  var_dump($_POST);
    $loc= LocationDB::read($_POST["selLok"]);
    $newText=$_POST["twittText"];
    $twitt=null;
    $commercial=null;

    $dt= new DateTime("now", new DateTimeZone("Europe/Belgrade"));
	
		$y=$dt->format("Y");
		$mo=$dt->format("m");
		$d=$dt->format("d");
                if(isset($_POST["chkCommercial"]))
                {
                    $commercial= new Commercial($newText, "", $d, $mo+1, $y);
                }
                else
                {
                     $twitt=new Twitt(0, $u, null, $newText, null, null, $d, $mo, $y,0, 0);
                }
               
                
   if (isset($_FILES['fajl_input']) 
            && $_FILES['fajl_input']['size'] > 0 && $_FILES['fajl_input']['size'] < 10000000) {
  
       $n=$_FILES['fajl_input']['name'];
   
       $putanja= "tpl/Media/".$n;
       $caption=$_POST["picCaption"];
    $fajl_za_dodavanje= new Picture(0,  $putanja,$caption, $loc  );
    $naziv=$fajl_za_dodavanje;
    $naziv=$_FILES['fajl_input'];
           rename($_FILES['fajl_input']['tmp_name'], $fajl_za_dodavanje->path);
 
          if(isset($_POST["chkCommercial"]))
                {
                    $commercial->filePath=$fajl_za_dodavanje->path;
                }
                else
                {
                     $twitt->addPhoto($fajl_za_dodavanje);
                }
       
           
}
//var_dump($twitt);
 if(isset($_POST["chkCommercial"]))
                {
   //  var_dump($commercial);
                    CommercialDB::CreateCommercialUser($commercial, $u, $loc);
                }
                else
                {
                    TwittDB::create($twitt);
                }
                header("location:MyTwitts.php");

}
header("location:actionLog.php");