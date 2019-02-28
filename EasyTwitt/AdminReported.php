<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'MySmarty.php';
include_once 'CommercialDB.php';
include_once 'LocationDB.php';

$smarty = new MySmarty();

session_start();

if(isset($_POST["btnCreate"]))
{
     $loc= LocationDB::read($_POST["selLok"]);
    $newText=$_POST["commText"];
   
    $commercial=null;

    $dt= new DateTime("now", new DateTimeZone("Europe/Belgrade")); //Commercial Expires in a month
	
		$y=$dt->format("Y");
		$mo=$dt->format("m")+1;
		$d=$dt->format("d");
               
                    $commercial= new Commercial($newText, "", $d, $mo, $y);
               
               
                
   if (isset($_FILES['fajl_input']) 
            && $_FILES['fajl_input']['size'] > 0 && $_FILES['fajl_input']['size'] < 10000000) {
  
       $n=$_FILES['fajl_input']['name'];
   
       $putanja= "tpl/Media/".$n;
       $caption="";
    $fajl_za_dodavanje= new Picture(0,  $putanja,$caption, $loc  );
    $naziv=$fajl_za_dodavanje;
    $naziv=$_FILES['fajl_input'];
           rename($_FILES['fajl_input']['tmp_name'], $fajl_za_dodavanje->path);
 
        
                    $commercial->filePath=$fajl_za_dodavanje->path;
                    
                    //var_dump($commercial);
                   CommercialDB::CreateCommercial($commercial, $loc);
                   header("location:Admin.php");
               
       
}
}

$smarty->display('adminHeader.tpl');

$reported=TwittDB::ReturnReportedTwitts();

$smarty->assign("twitts", $reported);
$locations= LocationDB::returnAllPlaces();
$smarty->assign("locations", $locations);

$smarty->display('admin.tpl');

include_once 'footer.php';