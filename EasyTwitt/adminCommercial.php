<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'MySmarty.php';//("MySmarty.php");

include_once 'LocationDB.php';

$smarty = new MySmarty();

session_start();

$smarty->display('adminHeader.tpl');
$smarty->assign("show", $show);
$smarty->display('newCommercial.tpl');

include_once 'footer.php';
