<?php
include_once "Event.php";
include_once "User.php";
include_once "Location.php";
include_once 'SortDate.php';

require_once 'vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

//DISCLAIMER: Eventi su jedinstveni jedino po internal id-ju tako da obratite paznju na to kad ih budete povlacili iz baze

class EventDB{
	public static $password="macka996";
	
	public static function CreateEvent (Event $e, User $u , Location $l) //Kreira se Event koji hostuje neki user; podrazumeva se da taj koji hostuje, prisustvuje dogadjaju
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= "CREATE (e1:Event {name:'".$e->name."', hour:".$e->hour.", minute:".$e->minute.", day:".$e->day.", month:".$e->month.", year:".$e->year.", info:'".$e->info."', noGuests:".$e->noGuests."}) RETURN ID(e1)";
    	$rec=$client->run($query);
		$recc=$rec->getRecord();
		$id=$recc->value('ID(e1)');
		var_dump($id);
		$query="MATCH (e1:Event), (u:User {username:'".$u->username."'}) where ID(e1)=".$id." CREATE (u)-[:IS_HOSTING]->(e1)";
		$client->run($query);
		$query="MATCH (e1:Event), (u:User {username:'".$u->username."'}) where ID(e1)=".$id." CREATE (u)-[:IS_GOING]->(e1)";
		$client->run($query);
		$query="MATCH (e1:Event) where ID(e1)=".$id." set e1.noGuests=e1.noGuests+1";
		$client->run($query);
		$query="MATCH (e1:Event), (l:Place {number:".$l->id."}) where ID(e1)=".$id." CREATE (e1)-[:IS_TAKING_PLACE]->(l)";
		$client->run($query);
		
	}
	public static function ReadEventByInternalId($id)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (e:Event) where ID(e)=".$id ." return e";
		$result = $client->run($query);
		$record=$result->getRecord();
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		$loc= EventDB::ReadEventsLocation($id);
                $ev->setLocation($loc);
                $ev->setId($id);
                return $ev;
	}
	public static function ReadEventsLocation($id)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (e:Event)-[:IS_TAKING_PLACE]-> (l:Place) where ID(e)=".$id ." return l";
		$result = $client->run($query);
		$record=$result->getRecord();
		$loc= new Location($record->value('l')->value('number'), $record->value('l')->value('town'), $record->value('l')->value('state'));
		return $loc;
	}
	public static function UserIsGoingToEvent(User $u, $eventId)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (e:Event), (u:User {username:'".$u->username."'}) where ID(e)=".$eventId ." CREATE (u)-[:IS_GOING]->(e)";
		$client->run($query);
		$query="MATCH (e1:Event) where ID(e1)=".$eventId." set e1.noGuests=e1.noGuests+1";
		$client->run($query);
		
	}
	
	public static function DeleteEventById($id)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (e:Event) where ID(e)=".$id ." DETACH DELETE e";
		$client->run($query);
	}
	
	public static function UpdateAnEvent($id, Event $e)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (e:Event) where ID(e)=".$id ." SET e.name='$e->name', e.hour=".$e->hour.", e.minute=".$e->minute.", e.day=".$e->day.", e.month=".$e->month.", e.year=".$e->year.", e.info='".$e->info."', e.noGuests=".$e->noGuests;
		$client->run($query);
                
                $query="MATCH (e:Event)-[t:IS_TAKING_PLACE]->(p:Place) WHERE ID(e)=".$id." DELETE t";
              
                
                $client->run($query);
                
                $query="MATCH (e:Event),(l:Place {number:".$e->location->id."}) WHERE ID(e)=".$id." CREATE (e) -[:IS_TAKING_PLACE]->(l)";
                $client->run($query);
	}
	
	public static function ReturnAllEventsIDsOnLocation(Location $l) 
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (e:Event) -[:IS_TAKING_PLACE]->(l:Place {number:".$l->id."}) return ID(e) ";
		//var_dump($query);
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
			$niz[]=$record->value('ID(e)');
		}
		
		return $niz;
		
	}
	public static function ReturnAllEventsOnLocation(Location $l) 
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (e:Event) -[:IS_TAKING_PLACE]->(l:Place {number:".$l->id."}) return e, ID(e) as idd ";
		//var_dump($query);
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		
                $ev->setLocation($l);
                $ev->setId($record->value('idd'));
                $niz[]=$ev;
		}
		
		return $niz;
		
	}
	public static function ReturnEventsIDsHostedByUser(User $u)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User {username:'$u->username'}) -[:IS_HOSTING]->(e:Event) return ID(e) ";

		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		
		foreach($records as $record)
		{
			$niz[]=$record->value('ID(e)');
		}
		
		return $niz;
	}
	
	public static function ReturnAllEventsHostedByUser(User $u) 
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User {username:'$u->username'}) -[:IS_HOSTING]->(e:Event) return e, ID(e) as idd";
		//var_dump($query);
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		$loc= EventDB::ReadEventsLocation($record->value('idd'));
                $ev->setLocation($loc);
                $ev->setId($record->value('idd'));
                $niz[]=$ev;
		}
		
		return $niz;
		
	}
	public static function UsersEventsID(User $u)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User {username:'$u->username'}) -[:IS_GOING]->(e:Event) return ID(e) ";

		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		
		foreach($records as $record)
		{
			$niz[]=$record->value('ID(e)');
		}
		
		return $niz;
	}
	public static function UsersEvents(User $u) 
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User {username:'$u->username'}) -[:IS_GOING]->(e:Event) return e, ID(e) as idd";
		//var_dump($query);
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		$loc= EventDB::ReadEventsLocation($record->value('idd'));
                $ev->setLocation($loc);
                $ev->setId($record->value('idd'));
               $niz[]=$ev;
		}
		
		return $niz;
                
                
		
	}
	public static function ReportEvent($id, User $u)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
					
		$query="MATCH (e1:Event), (u:User {username:'".$u->username."'}), (a:Admin) where ID(e1)=".$id." CREATE (a)<-[:REPORTED]-(e1)-[:IS_REPORTED_BY]->(u)";
		$client->run($query);
	}
	
	public static function EventsHost ($id)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User)-[:IS_HOSTING]->(e:Event) where ID(e)=".$id." return u ";

		$result=$client->run($query);
		$record=$result->getRecord();
		$user=new User($record->value('u')->value('email'),$record->value('u')->value('password'),$record->value('u')->value('name'),$record->value('u')->value('surname'),$record->value('u')->value('username'), null, null);
		return $user;
	}
	
	public static function UsersGoingToAnEvent($id)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User)-[:IS_GOING]->(e:Event) where ID(e)=".$id." return u ";

		$result=$client->run($query);
		$records=$result->getRecords();
		$users=array();
		foreach($records as $record)
		{
			$user=new User($record->value('u')->value('email'),$record->value('u')->value('password'),$record->value('u')->value('name'),$record->value('u')->value('surname'),$record->value('u')->value('username'), null, null);
			$users[]=$user;
		}
		return $users;
	}
        
        
        public static function ReturnEventsByName($name)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (e:Event) WHERE e.name CONTAINS '$name' return e, ID(e) as idd";
		
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		$loc= EventDB::ReadEventsLocation($record->value('idd'));
                $ev->setLocation($loc);
                $ev->setId($record->value('idd'));
               $niz[]=$ev;
		}
		
		return $niz;
        }
        
         public static function ReturnEventsOnDate($d, $m, $y)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (e:Event {day:".$d.", month:".$m.", year:".$y."}) return e, ID(e) as idd";
		
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		$loc= EventDB::ReadEventsLocation($record->value('idd'));
                $ev->setLocation($loc);
                $ev->setId($record->value('idd'));
               $niz[]=$ev;
		}
		
		return $niz;
        }
        
        public static function AreYouGoing(User $u, $id)
        {
            $client = ClientBuilder::create()
                ->addConnection("bolt", "bolt://neo4j:" . UserDB::$password . "@localhost:7687")
                ->build();
        $query = "match (u:User {username:'$u->username'}),(ev:Event) WHERE ID(ev)=".$id."  return exists((u)-[:IS_GOING]->(ev)) as e ";
       
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
        
        public static function FriendsGoingToEvent(User $u, $id)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (uu:User {username:'$u->username'})-[:FRIENDS]->(u:User)-[:IS_GOING]->(e:Event) where ID(e)=".$id." return u ";

		$result=$client->run($query);
		$records=$result->getRecords();
		$users=array();
		foreach($records as $record)
		{
			$user=new User($record->value('u')->value('email'),$record->value('u')->value('password'),$record->value('u')->value('name'),$record->value('u')->value('surname'),$record->value('u')->value('username'), null, null);
			$users[]=$user;
		}
		return $users;
        }
        
        public static function ReturnAllEvents()
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (e:Event) return e, ID(e) as idd";
		//var_dump($query);
		$result=$client->run($query);
		$niz=array();
		$records=$result->getRecords();
		//var_dump($records);
		foreach($records as $record)
		{
		$ev= new Event($record->value('e')->value('name'), $record->value('e')->value('hour'), $record->value('e')->value('minute'), $record->value('e')->value('day'), $record->value('e')->value('month'), $record->value('e')->value('year'), $record->value('e')->value('info'), $record->value('e')->value('noGuests'));
		$loc= EventDB::ReadEventsLocation($record->value('idd'));
                $ev->setLocation($loc);
                $ev->setId($record->value('idd'));
                $niz[]=$ev;
		}
		
		return $niz;
        }
}
