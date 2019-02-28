<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocationDB
 *
 * @author Aleksandar
 */
include_once 'Location.php';
include_once 'UserDB.php';

use GraphAware\Neo4j\Client\ClientBuilder;
class LocationDB {
    
   public static $password = "macka996";
    
    public static function create(Location $p)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:Place) return MAX(n.number)";
        $result = $client->run($query);
        
        if(!ctype_digit($result))
            $p->id=0;
        $p->id=$result+1;
        
        $query = "CREATE (t:Place {number:" . $p->id . ", town:" + $p->path . ", state:'" . $p->about . "}) return t";
        $result = $client->run($query);
        
        if($result)
            return true;
        return false;
    }
    
    public static function read($id)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Place) where (t.number=". $id .") return t";
        $result = $client->run($query);

        if($result)
        {
            $record = $result->getRecord();
            $p = new Location($record->value('t')->value('number'), $record->value('t')->value('town'), $record->value('t')->value('state'));
            return $p;
        }
        
        return false;
    }
    
    public static function readForTwitt(Twitt $t)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Twitt)-[:PICTURE_FROM_TWITT]->(p:Picture)-[:TAGGED_PICTURE_TOWN_STATE]->(s:Plate) where (t.number=". $t->id .") return s";
        $result = $client->run($query);

        if($result)
        {
            $picArray = array();
            foreach($result->getRecords() as $p)
                $picArray[] = new Picture($record->value["number"], $record->value["path"], $record->value["about"]);
            return $picArray;
        }
        
        return false;
    }
    
    public static function update(Picture $p)
    {
        PictureDB::delete($p->id);
        PictureDB::create($p);
    }
    
    public static function delete($id)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Place) where (t.number=" . $id .") delete t";
        $result = $client->run($query);
        
        if($result)
            return true;
        return false;
    }
    
    public static function deleteForTwitt(Twitt $t)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Twitt)-[:PICTURE_FROM_TWITT]->(p:Picture)-[:TAGGED_PICTURE_TOWN_STATE]->(s:Plate) where (t.number=". $t->id .") delete s";
        $result = $client->run($query);
        
        if($result)
            return true;
        return false;
    }
    
    public static function returnAllPlaces()
    {
     $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Place) return t";
        $result = $client->run($query);
        $places=array();
        if($result)
        {
            $records = $result->getRecords();
            foreach($records as $record)
            {
                 $p = new Location($record->value('t')->value('number'), $record->value('t')->value('town'), $record->value('t')->value('state'));
                 $places[]=$p;
            }
           
            return $places;
        }
        
        return false;
    }
}
