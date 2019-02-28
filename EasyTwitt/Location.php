<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class Location {
    //put your code here
    public $id;
    public $town;
    public $state;
    
    public function __construct($id, $town, $state) {
        $this->id=$id;
        $this->town=$town;
        $this->state=$state;
    }
}
