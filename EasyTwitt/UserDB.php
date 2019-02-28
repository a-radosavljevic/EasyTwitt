<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDB
 *
 * @author Aleksandar
 */
include_once 'User.php';
include_once 'LocationDB.php';
include_once 'TwittDB.php';
include_once 'Twitt.php';
include_once 'EventDB.php';

require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class UserDB {

    //put your code here
    public static $password = "macka996";

    public static function CreateUser(User $u) {

        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (l:Place {town:'".$u->location->town."', state:'".$u->location->state."'}) CREATE (l)<-[:LIVES_IN]-(u:User{email:'$u->email',password:'$u->password',name:'$u->name',surname:'$u->surname',username:'$u->username'})-[:HAS_NOTIFICATION]->(n:Notification)";

        
        try {
           $result = $client->run($query);
          
           
        } catch (Exception $e) {
            
        }
    }

    public static function ReadUser($email, $password) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User) WHERE n.email='$email' AND n.password='$password' RETURN n";

        try {
            $result = $client->run($query);
            $record = $result->getRecord();
            
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));
            
            $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
           
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            return $user;
            
        } catch (Exception $e) {
            print_r("User ne postoji " . $e->getMessage());
        }
    }
    public static function ReadUserUsername($username, $password) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User) WHERE n.username='$username' AND n.password='$password' RETURN n";

        try {
            $result = $client->run($query);
            $record = $result->getRecord();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));

           $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            return $user;
        } catch (Exception $e) {
            print_r("User ne postoji " . $e->getMessage());
        }
    }
    public static function ReadUserByUsername($username)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User {username:'$username'}) RETURN n";
        $user=null;
        try {
            $result = $client->run($query);
            $record = $result->getRecord();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));

           $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            return $user;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }
    

    public static function ReadUsersLocation($username)
    {
        $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:". UserDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (u:User {username:'$username'})-[:LIVES_IN]-> (l:Place) return l";
		$result = $client->run($query);
		$record=$result->getRecord();
		$loc= new Location($record->value('l')->value('number'), $record->value('l')->value('town'), $record->value('l')->value('state'));
		return $loc;
    }
    public static function DeleteUser(User $u) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User) WHERE n.email='$u->email' DETACH DELETE n";
        try {
            $result = $client->run($query);
        } catch (Exception $e) {
            
        }
    }

    public static function UpdateUser(User $u, $usernameNew) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User{email:'$u->email',password:'$u->password',name:'$u->name',surname:'$u->surname',username:'$u->username'}) SET n.username='$usernameNew'";
        try {
            $result = $client->run($query);
        } catch (Exception $e) {
            
        }
    }

    public static function FriendRequest(User $u1, User $u2) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n1:User{email:'$u1->email',password:'$u1->password',name:'$u1->name',surname:'$u1->surname',username:'$u1->username'}) MATCH (n2:User{email:'$u2->email',password:'$u2->password',name:'$u2->name',surname:'$u2->surname',username:'$u2->username'}) CREATE (n1)-[:FRIENDS_REQUEST]->(n2)";
        try {
            $result = $client->run($query);
        } catch (Exception $e) {
            
        }
    }

    public static function AcceptFriendRequest(User $u1, User $u2) { //U1 accepts friend request from U2
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
       $query2 = "MATCH (n1:User{email:'$u1->email'}), (n2:User{email:'$u2->email'}) CREATE (n1)-[:FRIENDS]->(n2), (n2)-[:FRIENDS]->(n1)";
        try {
           

            $result2 = $client->run($query2);
            $query2 = "MATCH (n1:User{email:'$u1->email'})<-[f:FRIENDS_REQUEST]-(n2:User{email:'$u2->email'}) delete f";
            $result2 = $client->run($query2);
        } catch (Exception $e) {
            
        }
    }

    public static function DeleteFriendRequest(User $u1, User $u2) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query1 = "MATCH (n1:User{email:'$u1->email'})-[r:FRIENDS_REQUEST]->(n2:User{email:'$u2->email'}) DELETE r";
        try {
            $result1 = $client->run($query1);
        } catch (Exception $e) {
            
        }
    }

    public static function returnAllFriendRequests(User $u1) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n1:User)-[:FRIENDS_REQUEST]->(n:User{email:'$u1->email'}) RETURN n1";
        try {
            $result = $client->run($query);
            $friendRQSTS = array();
            $us = null;


            foreach ($result->getRecords() as $record) {
                //print_r($record->value('n')->value('email'));//vraca node object i preko njega mozemo da pristupimo propertijima
                //echo "<br>";
                //print_r($record->value('t')->value('text'));
                //echo "<br>";

                $us = new User($record->value('n1')->value('email'), $record->value('n1')->value('password'), $record->value('n1')->value('name'), $record->value('n1')->value('surname'), $record->value('n1')->value('username'), null, null);
                $friendRQSTS[] = $us;
            }

            return $friendRQSTS;
        } catch (Exception $e) {
            
        }
    }

    public static function returnAllFriends(User $u1) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n1:User)-[:FRIENDS]->(n:User{email:'$u1->email'}) RETURN n1";
        try {
            $result = $client->run($query);
            $friendRQSTS = array();
            $us = null;


            foreach ($result->getRecords() as $record) {
                $us= UserDB::ReadUserByUsername($record->value('n1')->value('username'));
                $friendRQSTS[] = $us;
            }

            return $friendRQSTS;
        } catch (Exception $e) {
            
        }
    }

    public static function returnFriendsOfFriends(User $u1) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
       //$query = "MATCH (n1:User)-[:FRIENDS]->(n:User{email:'$u1->email'}), (n2:User)-[:FRIENDS]->(n1) WHERE NOT (n1)-[:FRIENDS]-(friendOfFriend:Person) n2.email='$u1->email' RETURN n2";
       $query="MATCH  
    (me:User{username:'$u1->username'})-[:FRIENDS]-(myFriend:User)-[:FRIENDS]-(friendOfFriend:User) WHERE NOT (me)-[:FRIENDS]-(friendOfFriend:User) AND  NOT friendOfFriend.username='$u1->username' RETURN DISTINCT friendOfFriend as n2";
        try {
            $result = $client->run($query);
            $friendRQSTS = array();
            $us = null;


            foreach ($result->getRecords() as $record) {
                $loc= UserDB::ReadUsersLocation($record->value('n2')->value('username'));
                $us = new User($record->value('n2')->value('email'), $record->value('n2')->value('password'), $record->value('n2')->value('name'), $record->value('n2')->value('surname'), $record->value('n2')->value('username'), $loc->state, $loc->town);
                $friendRQSTS[] = $us;
            }

            return $friendRQSTS;
        } catch (Exception $e) {
            
        }
    }
    
    public static function ShowRelevantTwitts(User $u)
    {
      $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (u1:User {username:'".$u->username."'})-[:FRIENDS]->(u:User)-[:TWITT_POST]->(t:Twitt) return u,t";
        try {
            $result = $client->run($query);
              $twitts = array();
            $us = null;
             
            
            foreach ($result->getRecords() as $record) {
                
                $us= UserDB::ReadUserByUsername($record->value('u')->value('username'));
               
                $tw= TwittDB::read($record->value('t')->value('number'));
                $tw->user=$us;
       
               // $twitts[]=$us;
                $twitts[]=$tw;
             
            }
           
            return $twitts;
        } catch (Exception $e) {
            
        }
    }
    
    /*public static function GetFriendByUsername(User $u, $username)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (u1:User {username:'$u->username'})-[:FRIENDS]->(n:User {username:'$username'}) RETURN n";
        $user=null;
        try {
            $result = $client->run($query);
            $record = $result->getRecord();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));

           $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            return $user;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }*/
    public static function GetUsersByUsername(User $u, $username)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User {username:'$username'}) RETURN n";
        $user=null;
        try {
            $result = $client->run($query);
            $record = $result->getRecord();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));

           $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            return $user;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }
    
    /*public static function GetUsersByLocation(User $u, $id)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (u1:User {username:'$u->username'})-[:FRIENDS]->(n:User)-[:LIVES_IN]->(l:Place {number:".$id."}) RETURN n";
        $user=null;
        $friends=array();
        try {
            $result = $client->run($query);
            $records = $result->getRecords();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));
            foreach($records as $record)
            {
                $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
                $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
                $friends[]=$user;
            
            }
            return $friends;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }*/
    public static function GetUsersByLocation(User $u, $id)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User)-[:LIVES_IN]->(l:Place {number:".$id."}) WHERE n.username<>'$u->username' RETURN n";
        $user=null;
        $friends=array();
        try {
            $result = $client->run($query);
            $records = $result->getRecords();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));
            foreach($records as $record)
            {
                $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
                $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
                $friends[]=$user;
            
            }
            return $friends;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }
    
     /*public static function GetUsersByName(User $u, $name, $surname)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (u1:User {username:'$u->username'})-[:FRIENDS]->(n:User {name:'$name', surname:'$surname'}) RETURN n";
        $user=null;
        $friends=array();
        try {
            $result = $client->run($query);
            $records = $result->getRecords();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));
            foreach($records as $record)
            {
                $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
                $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
                $friends[]=$user;
            
            }
            return $friends;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }*/
    public static function GetUsersByName(User $u, $name, $surname)
    {
         $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User {name:'$name', surname:'$surname'}) WHERE n.username<>'$u->username' RETURN n";
        $user=null;
        $friends=array();
        try {
            $result = $client->run($query);
            $records = $result->getRecords();
            //print_r("User postoji ".$record->value('n')->value('email')." ".$record->value('n')->value('password'));
            foreach($records as $record)
            {
                $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
                $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
                $friends[]=$user;
            
            }
            return $friends;
        } catch (Exception $e) {
           // print_r("User ne postoji " . $e->getMessage());
            return null;
        }
    }
    public static function AreWeFriends(User $u1, User $u2)
    {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (u1:User {username:'$u1->username'}), (u2:User {username:'$u2->username'}) return exists((u1)-[:FRIENDS]->(u2)) as e ";
        
       
         try {
            $result = $client->run($query);
            //var_dump($result);
            $record=$result->getRecord();
           //var_dump($record);
            if ($record->value('e')) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
           
            return false;
        }
    }
    
    
     public static function isRequestSent(User $u1, User $u2) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        
        $query = "match (u1:User {username:'$u1->username'}), (u2:User {username:'$u2->username'}) RETURN EXISTS ((u1)-[:FRIENDS_REQUEST]->(u2)) as e";
        
        try {
             $result = $client->run($query);
            //var_dump($result);
            $record=$result->getRecord();
           //var_dump($record);
            if ($record->value('e')) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
           
            return false;
        }
    }
    
        public static function getMutualFriends(User $u1, User $u2) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        
        $query = "match (u1:User)-[:FRIENDS]->(u:User)<-[:FRIENDS]-(u3:User) where u1.username='" . $u1->username . "' and u3.username='" . $u2->username . "' return u";
      
        try {
            $result = $client->run($query);
            
            $ar = array();
            
             foreach ($result->getRecords() as $record)
             {
                 $us = new User($record->value('u')->value('email'), $record->value('u')->value('password'), $record->value('u')->value('name'), $record->value('u')->value('surname'), $record->value('u')->value('username'), null, null);
                 $ar[] = $us;
             }
             return $ar;
        } catch (Exception $e) {
            
        }
    }
    
    public static function UpdateUser2(User $u, $usernameNew, $nameNew, $surnameNew, $passwordNew) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n:User{email:'$u->email'}) SET n.username='$usernameNew', n.name='$nameNew', n.surname='$surnameNew', n.password='$passwordNew'";
        try {
            $result = $client->run($query);
        } catch (Exception $e) {
            
        }
    }
    
       public static function returnAllUsers(User $u1) {
        $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "MATCH (n1:User) WHERE n1.username<> '$u1->username' RETURN n1";
        try {
            $result = $client->run($query);
            $friendRQSTS = array();
            $us = null;


            foreach ($result->getRecords() as $record) {
                $us= UserDB::ReadUserByUsername($record->value('n1')->value('username'));
                $friendRQSTS[] = $us;
            }

            return $friendRQSTS;
        } catch (Exception $e) {
            
        }
    }

}
