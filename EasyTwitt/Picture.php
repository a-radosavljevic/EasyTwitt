<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Picture
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class Picture {
    
    public $id;
    public $path;
    public $about;
    public $location;
    
    public function __construct($id, $path, $about, $loc) {
        $this->id=$id;
        $this->path=$path;
        $this->about=$about;
        $this->location=$loc;
    }
    
    public function setPath(string $s)
    {
        $this->path=$s;
    }
    
    public function setAbout(string $s)
    {
        $this->about=$s;
    }
}
