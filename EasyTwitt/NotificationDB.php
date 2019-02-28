<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'vendor/autoload.php';
use GraphAware\Neo4j\Client\ClientBuilder;

include_once 'Commercial.php';
include_once 'User.php';
include_once 'Location.php';
include_once 'Notification.php';
include_once 'Twitt.php';

class NotificationDB
{

	public static $password="macka996";
        
        public static function CreateNotification(Notification $n, User $u)
        {
            
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (u:User {username:'$u->username'})-[:HAS_NOTIFICATION]->(n:Notification), (t:Twitt {number:".$n->onTwitt->id."}) WHERE u.username<>'$n->fromUser' CREATE (n)-[:NOTIFICATION {date:'$n->date', fromUser:'$n->fromUser', type:'$n->type' }]->(t)";
       
           
		try
		{
                    $result = $client->run($query);
		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
        }
        
        
        public static function ReadUsersNotifications(User $u)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (u:User {username:'$u->username'})-[:HAS_NOTIFICATION]->(n:Notification)-[notif:NOTIFICATION]->(t:Twitt) return t.number as idt,notif, ID(notif) as id";
        $client->run($query);
           $notifs=array();
		try
		{
                    $result = $client->run($query);
                    $records= $result->getRecords();
                    
                    if($records)
                    {
                        foreach ($records as $record)
                        {
                            $twitt= TwittDB::read($record->value('idt'));
                            //var_dump($twitt);
                            $notif=new Notification($record->value('notif')->value('date'),$record->value('notif')->value('fromUser'),$record->value('notif')->value('type'), $twitt);
                            $notif->setId($record->value('id'));
                            
                            $notifs[]=$notif;
                        }
                    }
                    
                    return $notifs;
		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
        }
        
        
        public static function DeleteNotification($id)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH ()-[notif:NOTIFICATION]->() WHERE ID(notif)=".$id." DELETE notif";
        $client->run($query);
        }
}