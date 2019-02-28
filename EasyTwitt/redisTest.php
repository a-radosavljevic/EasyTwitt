<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'predis/autoload.php';
//require 'Predis/Autoloader.php';

predis\Autoloader::register();
//PredisAutoloader::register();

include_once 'User.php';

try {
    $redis = new Predis\Client();
    //$redis->connect('127.0.0.1', 6379);
} catch (Exception $ex) {
    print_r($ex->getMessage());
}

//$redis->set('sifra', 'vrednost');
//
//$value = $redis->get('sifra');
//
//print_r($value);

$u = new User("imejl","pasvord","ime","prezime","us","grad","drava");
$redis->set("user:".$u->email, GuzzleHttp\json_encode($u));

//print_r(json_decode($redis->get("user:".$u->email)));

print_r($u);

?>