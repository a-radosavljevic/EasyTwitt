<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class Comment 
{
	public $hour;
	public $minute;
	public $second;
	public $day;
	public $month;
	public $year;
	public $text;

	public function __construct($h, $m, $s, $d, $month, $y , $t)
	{
		$this->hour=$h;
		$this->minute=$m;
		$this->second=$s;
		$this->day=$d;
		$this->month=$month;
		$this->year=$y;
		$this->text=$t;
	}

}