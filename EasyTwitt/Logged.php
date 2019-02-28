<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logged
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;


class Logged {
    //put your code here
    
    public $hour;
	public $minute;
	public $second;

	public $year;
	public $month;
	public $day;

	public function __construct($h,$min,$s,$y,$m,$d)
	{
		$this->hour=$h;
		$this->minute=$min;
		$this->second=$s;

	    $this->year=$y;
	 	$this->month=$m;
		$this->day=$d;
	}
}
