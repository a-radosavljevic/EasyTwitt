<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageDB
 *
 * @author Aleksandar
 */
include_once 'Message.php';

require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class MessageDB {
    //put your code here
    public static $password="macka996";

	public static function CreateMessage($text, User $from, User $to)
	{
		$dt= new DateTime("now", new DateTimeZone("Europe/Belgrade"));
		$h= $dt->format("H");
		$mi=$dt->format("i");
		$s=$dt->format("s");
		$y=$dt->format("Y");
		$mo=$dt->format("m");
		$d=$dt->format("d");
		
		$m=new Message($h, $mi, $s, $d, $mo, $y, $text);
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".MessageDB::$password."@localhost:7687")
    				->build();
		$query= "CREATE (m1:Message {hour:".$m->hour.", minute:".$m->minute.", second:".$m->second.", day:".$m->day.", month:".$m->month.", year:".$m->year.", text:'".$m->text."'})";
    	$client->run($query);
		$query="MATCH (u1:User {username:'".$from->username."'}),  (u2:User {username:'".$to->username."'}),(r:Message {text:'".$m->text."'}) CREATE (u1)-[:SEND]->(r)-[:RECEIVE]->(u2)";
		$client->run($query);
	}
	
	public static function ReadConversations(User $u) //vraca sve razgovore izmedju dva korisnika
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".MessageDB::$password."@localhost:7687")
    				->build();
    	$query = "match (u1:User)-[r:SEND]->(m:Message)-[rr:RECEIVE]->(u2:User)
		where u1.username = '".$u->username."' return u2
		UNION
		match  (u2:User)-[r:SEND]->(m:Message)-[rr:RECEIVE]->(u1:User)
		where u1.username = '".$u->username."' return u2";
		$result = $client->run($query);
		
		$usrs =array();
		
		foreach ($result->getRecords() as $record) {
		$u= new User($record->value('u2')->value('email'), $record->value('u2')->value('password'), $record->value('u2')->value('name'), $record->value('u2')->value('surname'), $record->value('u2')->value('username'), "Belgrade", "Serbia");
	    $usrs[]=$u;
		print_r($record->value('u2')->value('username'));
	    
		
		}
		return $usrs;
	}
	
	public static function ShowMessages(User $u1, User $u2) //prikazuje poruke izmedju dva korisnika u opadajucem redosledu po vremenu
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".MessageDB::$password."@localhost:7687")
    				->build();
    	$query = "match (user1:User {username:'".$u1->username."'})-[:SEND]->(message)-[rr:RECEIVE]->(user2:User {username:'".$u2->username."'}) return message UNION match (user1:User {username:'".$u2->username."'})-[:SEND]->(message)-[rr:RECEIVE]->(user2:User {username:'".$u1->username."'}) return message";
		$result = $client->run($query);
		
		$msgs =array();
		
		foreach ($result->getRecords() as $record) {
				
		$m = new Message($record->value('message')->value('hour'), $record->value('message')->value('minute'), $record->value('message')->value('second'), $record->value('message')->value('day'), $record->value('message')->value('month'), $record->value('message')->value('year'), $record->value('message')->value('text'));
	    $msgs[]=$m;
		//print_r($record->value('message')->value('text'));
	    //echo "<br>";
	   // print_r($record->value('message')->value('day')." ". $record->value('message')->value('month') ." " . $record->value('message')->value('year')."       " . $record->value('message')->value('hour')." " . $record->value('message')->value('minute')." " . $record->value('message')->value('second'));
	   // echo "<br>";
		}
	
	DateSort::SortMessages($msgs);
		
		return $msgs;
	}
	
	public static function DeleteMessage(User $from, User $to, Message $message) //poruke moze da brise samo onaj ko ih je poslao
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".MessageDB::$password."@localhost:7687")
    				->build();
    	$query = "match (user1:User {username:'".$from->username."'})-[:SEND]->(message:Message {hour:".$message->hour." ,minute:".$message->minute.", second:".$message->second.", day:".$message->day.", month:".$message->month.", year:".$message->year.", text:'".$message->text."'})-[rr:RECEIVE]->(user2:User {username:'".$to->username."'}) detach delete message";
		var_dump($query);
		$result = $client->run($query);

	}
        
        public static function isMyMessage(Message $m, User $u)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".MessageDB::$password."@localhost:7687")
    				->build();
            $query = "match (u:User)-[:SEND]->(m:Message) where u.username='" . $u->username . "' return m";
            $query = "match (u:User)-[:SEND]->(m:Message) where u.username='" . $u->username . "' and m.text='" . $m->text . "'  return m";
            
            try {
            $result = $client->run($query);
            $records = $result->getRecord();
            if ($records->value('m')->value('text') == $m->text) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
           
            return false;
        }
        }
}
