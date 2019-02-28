<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PictureDB
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class PictureDB {
    public static $password = "macka996";
    
    public static function create(Picture $pic, Twitt $t)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
      /*  $query = "MATCH (n:Picture) return MAX(n.number) as m";
        $result = $client->run($query);
   
        $record=$result->getRecord();
        $broj=$record->value('m');
        //if(!ctype_digit($result))
         //   $t->id=0;
        $p->id=$broj+1;*/
        
          $query = "match (tt:Twitt {number:".$t->id."}), (l:Place {number:".$pic->location->id."}) CREATE (tt)-[:PICTURE_FROM_TWITT]->(t:Picture {about:'$pic->about', number:".$t->id.", path:'$pic->path'})-[:TAKEN]->(l) ";
       
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
        $query = "match (t:Picture) where (t.number=". $id .") return t";
        $result = $client->run($query);
        $p=null;
       
        if($result)
        {
            if(!$result->getRecords())
                return null;
            $record=$result->getRecord();
           
            if($record)
            {
                
                $loc=PictureDB::getPhotosLocation($record->value('t')->value('number'));
               
                $p = new Picture($record->value('t')->value('number'), $record->value('t')->value('path'), $record->value('t')->value('about'), $loc);
              
            }
            return $p;
        }
        
        return null;
    }
    
    public static function readForTwitt(Twitt $t)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Twitt)-[:PICTURE_FROM_TWITT]->(p:Picture) where (t.number=". $t->id .") return p";
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
        $query = "match (t:Picture) where (t.number=" . $id .") delete t";
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
        $query = "match (t:Twitt)-[:PICTURE_FROM_TWITT]->(p:Picture) where (t.number=". $t->id .") delete p";
        $result = $client->run($query);
        
        if($result)
            return true;
        return false;
    }
    
    public static function getPhotosLocation($id)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (p:Picture {number:".$id."})-[:TAKEN]->(t:Place) return t";
        $result = $client->run($query);

        if($result)
        {
            $record = $result->getRecord();
            $p = new Location($record->value('t')->value('number'), $record->value('t')->value('town'), $record->value('t')->value('state'));
            return $p;
        }
        
        return false;
    }
    
    public static function getUsersTwittPhotos(User $u)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (u:User {username:'$u->username'})-[:TWITT_POST]->(tt:Twitt)-[:PICTURE_FROM_TWITT]->(t:Picture) return t";
        $result = $client->run($query);
        $pics=array();
        if($result)
        {
            $records = $result->getRecords();
            if($records!=null)
            {
                $records=$result->getRecords();
                foreach($records as $record)
                {
                   $p = new Picture($record->value('t')->value("number"), $record->value('t')->value("path"), $record->value('t')->value("about"), null);
                   $p->location= PictureDB::getPhotosLocation($p->id);
                   $pics[]=$p;  
                }
              
            }
            return $pics;
        }
        
        return null;
    }
    
    public static function UploadPhoto(Picture $pic, Twitt $t) {
       
           $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (tt:Twitt {number=".$t->id."}), (l:Place {number:".$pic->location->id."}) CREATE (tt)-[:PICTURE_FROM_TWITT]->(t:Picture {about:'$pic->about', number:".$t->id.", path:'$pic->path'})-[:TAKEN]->(l) ";
        
            $result = $client->run($query);
       
        
    }
}
