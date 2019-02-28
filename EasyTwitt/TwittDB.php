<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TwittDB
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

require_once 'User.php';
include_once 'CommentDB.php';
include_once 'PictureDB.php';
include_once 'Notification.php';
include_once 'NotificationDB.php';

class TwittDB {

    //put your code here
    public static $password = "macka996";

    public static function create(Twitt $t) {
        

        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:Twitt) return MAX(n.number) as m";
        $result = $client->run($query);
        $record=$result->getRecord();
        $broj=$record->value('m');
        //if(!ctype_digit($result))
         //   $t->id=0;
        $t->id=$broj+1;
        
       /* $query = "CREATE (t:Twitt {number:" .$t->id . ", text:'" . $t->text 
                                                            . "', month:" . $t->month . ", year:" . $t->year 
                                                            . ", day:" . $t->day 
                                                            . ", likesNO:" . $t->likesNO
                                                            . ", retwittsNO:" . $t->retwittsNO 
                                                            . "}) return t";
        $result = $client->run($query);*/
        $query="match (u:User {username:'".$t->user->username."'}) CREATE (u)-[:TWITT_POST]->(t:Twitt {number:" .$t->id . ", text:'" . $t->text ."', month:" . $t->month . ", year:" . $t->year 
                                                            . ", day:" . $t->day 
                                                            . ", likesNO:" . $t->likesNO
                                                            . ", retwittsNO:" . $t->retwittsNO 
                                                            . "})";
        $result = $client->run($query);
        if(!empty($t->comments))
        foreach ($t->comments as $c)
            CommentDB::CreateComment($c, $t->user, $t);
        if(!empty($t->photos))
        foreach ($t->photos as $p)
            PictureDB::create ($p, $t);
        
        return $t->id;
    }

    public static function read($id) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Twitt) where (t.number=". $id .") return t";
        $result = $client->run($query);

        if($result)
        {
            if(empty($result->getRecords()))
                return null;
            $record = $result->getRecord();
           
            $t = new Twitt($record->value('t')->value('number'), null, null, $record->value('t')->value('text'), null, null, $record->value('t')->value('day'), $record->value('t')->value('month'), $record->value('t')->value('year'), $record->value('t')->value('likesNO'), $record->value('t')->value('retwittsNO'));
           
            foreach (CommentDB::ReadComments($t) as $c) {
                $t->addComment($c);
            }

            if($p= PictureDB::read($t->id) ) //ovako kako je napravljeno moze samo jedna slika po tvitu
            {
                $t->addPhoto ($p);
            }
             $query = "match (t:Twitt)<-[:TWITT_POST]-(n:User) where (t.number=". $id .") return n";
       
        $result = $client->run($query);
            $record = $result->getRecord();
            
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));
            
            $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
           
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            $t->user=$user;
            
            return $t;
        }
        
        return false;
    }
    
    public static function getUserTwitts(User $u) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (u:User)-[:TWITT_POST]->(t:Twitt) where u.email='" . $u->email . "' return t";

        $result = $client->run($query);

        if($result)
        {
            $twittArray = array();
            
            foreach($result->getRecords() as $record)
            {
                $t = new Twitt($record->value('t')->value('number'), null, null, $record->value('t')->value('text'), null, null, $record->value('t')->value('day'), $record->value('t')->value('month'), $record->value('t')->value('year'), $record->value('t')->value('likesNO'), $record->value('t')->value('retwittsNO'));
           
            foreach (CommentDB::ReadComments($t) as $c) {
                $t->addComment($c);
            }

            if($p= PictureDB::read($t->id) ) //ovako kako je napravljeno moze samo jedna slika po tvitu
            {
                $t->addPhoto ($p);
            }
                $t->user=$u;
                $twittArray[] = $t;
            
            }
            
            return $twittArray;
        }
        
        return false;
    }

    public static function delete(Twitt $t) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (t:Twitt) where (t.number=" . $t->id .") detach delete t";
        $result = $client->run($query);
        
        if($result)
            return true;
        return false;
    }

    
    
    public static function UserLikedTwitt(User $u, Twitt $t)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (u:User {username:'$u->username'}),(t:Twitt {number:".$t->id."}) CREATE (u)-[:LIKED]->(t)";
        $result = $client->run($query);
        $query = "match (t:Twitt {number:".$t->id."}) set t.likesNO=t.likesNO+1";
        $result = $client->run($query);
        
        $dt= new DateTime("now", new DateTimeZone("Europe/Belgrade"));
		
        $date=$dt->format("Y-m-d H:i:s");
        $n=new Notification($date, $u->username, "liked", $t);
        NotificationDB::CreateNotification($n, $t->user);
       
        
        if($result)
            return true;
        return false;
    }
    
    public static function DidUserLikedTwitt(User $u, Twitt $t)
    {
        
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (u:User {username:'$u->username'}),(t:Twitt {number:".$t->id."})  return exists((u)-[:LIKED]->(t)) as e ";
        
         try {
            $result = $client->run($query);
            //var_dump($result);
            $record=$result->getRecord();
            if ($record->value('e')) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
           
            return false;
        }
    }
    
    public static function ReportTwitt(Twitt $t)
    {
        
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (a:Admin),(t:Twitt {number:".$t->id."})  CREATE (t)-[:REPORTED_TWITT]->(a) ";
        try
        {
            $result = $client->run($query);
        } catch (Exception $ex) {

        }
    }
    
    public static function ReturnReportedTwitts()
    {
          $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (a:Admin)<-[:REPORTED_TWITT]-(t) return t ";
        try
        {
            $reported=array();
            $result = $client->run($query);
            $records=$result->getRecords();
            if($records)
            {
                foreach ($records as $record)
                {
                  $t = new Twitt($record->value('t')->value('number'), null, null, $record->value('t')->value('text'), null, null, $record->value('t')->value('day'), $record->value('t')->value('month'), $record->value('t')->value('year'), $record->value('t')->value('likesNO'), $record->value('t')->value('retwittsNO'));
                  
                  $reported[]=$t;
                }
            }
            
            return $reported;
        } catch (Exception $ex) {

        }
    }

}
