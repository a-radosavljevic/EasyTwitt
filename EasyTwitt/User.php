<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Aleksandar
 */
include_once 'Location.php';

require_once 'vendor/autoload.php';

require_once 'vendor\graphaware\neo4j-php-client\src\ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;


class User {
    //put your code here
        public $email;
	public $password;
	public $name;
	public $surname;
	public $username;
        
        public $location;

	public function __construct($e, $p, $n, $s, $u, $town, $state)
	{
		$this->email=$e;
		$this->password=$p;
		$this->name=$n;
		$this->surname=$s;
		$this->username=$u;
                
                $this->location=new Location(-1, $town, $state);
	}
}
