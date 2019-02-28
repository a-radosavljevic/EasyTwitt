<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;
include_once "User.php";
include_once "sortDate.php";

class Message {
    //put your code here
    public $hour;
	public $minute;
	public	$second;
	public $day;
	public $month;
	public $year;
	public $text;
	public $datetime;
	
	public function __construct($h, $min, $s, $d, $m, $y, $t)
	{
		$this->hour=$h;
		$this->minute=$min;
		$this->second=$s;
		$this->day=$d;
		$this->month=$m;
		$this->year=$y;
		$this->text=$t;
		$this->datetime=new DateTime($y."-".$m."-".$d." ".$h.":".$min.":".$s);
		
	}
}
