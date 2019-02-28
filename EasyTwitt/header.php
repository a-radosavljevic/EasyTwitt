<?php

include_once 'MySmarty.php';

$smarty = new MySmarty();

$logged = false;
$smarty->assign("logged", $logged);

$smarty->display('header.tpl');

?>