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
include_once 'UserDB.php';

class CommercialDB
{

	public static $password="macka996";

	public static function CreateCommercial(Commercial $c1, Location $p1) //adminsko kreiranje reklama
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	//$query = "MATCH (a:ADMIN) RETURN a CREATE(c:Commercial{text:'$c1->text',picture:'$c1->path'}) CREATE(a)-[:COMMERCIAL_POST {expirationDateDay:toInt('$c1->day'), expirationDateMonth:toInt('$c1->month'), expirationDateYear:toInt('$c1->year')}]->(c)";
	$query = "MATCH (n:Admin) MATCH (p:Place) WHERE p.town='$p1->town' and p.state='$p1->state'  CREATE(n)-[:COMMERCIAL_POST {expirationDateDay:".$c1->day.", expirationDateMonth:".$c1->month.", expirationDateYear:".$c1->year."}]->(c:Commercial{text:'$c1->text',picture:'$c1->filePath'})-[:TAGGED_COMMERCIAL_TOWN_STATE]->(p)";
       
        try
		{
		$result = $client->run($query);
		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
	}

	public static function CreateCommercialUser(Commercial $c1, User $u1, Location $p1)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (n:User {username:'$u1->username'}) MATCH (p:Place) WHERE p.town='$p1->town' and p.state='$p1->state'  CREATE(n)-[:COMMERCIAL_POST {expirationDateDay:".$c1->day.", expirationDateMonth:".$c1->month.", expirationDateYear:".$c1->year."}]->(c:Commercial{text:'$c1->text',picture:'$c1->filePath'})-[:TAGGED_COMMERCIAL_TOWN_STATE]->(p)";
            //var_dump($query);
        try
		{
		$result = $client->run($query);
		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
	}

	public static function ReadCommercial(Commercial $c1)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (c:Commercial {c.text='$c1->text'AND c.picture='$c1->filePath'}) WHERE ()-[cp:COMMERCIAL_POST{expirationDateDay:toInt('$c1->day'), expirationDateMonth:toInt('$c1->month'), expirationDateYear:toInt('$c1->year')}]->(c) RETURN c,cp";

		try
		{
		$result = $client->run($query);
		$record=$result->getRecord();

		$commerc=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));


		return $commerc;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
		
	}
        
        public static function ReadCommercialById($id)
        {
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH ()-[cp:COMMERCIAL_POST]->(c:Commercial ) WHERE ID(c)=" . $id . " RETURN c,cp, ID(c) as id";

		try
		{
		$result = $client->run($query);
		$record=$result->getRecord();

		$commerc=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));

                $commerc->id = $record->value('id');
		return $commerc;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
        }
        public static function CommercialsUser ($id)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".EventDB::$password."@localhost:7687")
    				->build();
		$query= " MATCH (u:User)-[:COMMERCIAL_POST]->(c:Commercial) where ID(c)=".$id." return u ";

		$result=$client->run($query);
		$record=$result->getRecord();
		$user=new User($record->value('u')->value('email'),$record->value('u')->value('password'),$record->value('u')->value('name'),$record->value('u')->value('surname'),$record->value('u')->value('username'), null, null);
		return $user;
	}
	public static function DeleteCommercial($id)
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (c:Commercial) WHERE ID(c)=".$id." DETACH DELETE c";
            

		try
		{
		$result = $client->run($query);
		

		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}
		

	}

	public static function ReadAdminCommercial()
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (a:Admin)-[cp:COMMERCIAL_POST]->(c:Commercial) RETURN c,cp, ID(c) as id";

		try
		{
		$result = $client->run($query);
		
		$comms=array();
		$comm=null;

		foreach ($result->getRecords() as $record) 
		{
			# code...
			$comm=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));
			$comm->id=$record->value('id');
                        $comms[]=$comm;
		}

		return $comms;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}

	}

	public static function ReadCommercialByPhotoPlace(User $u)
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (uu:User{email:'$u->email'})-[:PICTURE_POST]->(p:Picture), (p)-[:TAGGED_PICTURE_TOWN_STATE]->(pl:Place), (c:Commercial)-[:TAGGED_COMMERCIAL_TOWN_STATE]->(pl), ()-[:cp:COMMERCIAL_POST]->(c) return c,cp";

		try
		{
		$result = $client->run($query);
		
		$comms=array();
		$comm=null;

		foreach ($result->getRecords() as $record) 
		{
			# code...
			$comm=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));
			$comms[]=$comm;
		}

		return $comms;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc ");
		}

	}

	public static function ReadAllCommercials()
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (u:User)-[cp:COMMERCIAL_POST]->(c:Commercial) return c,cp, ID(c) as id";
          
		try
		{
		$result = $client->run($query);
		
		$comms=array();
		$comm=null;

		foreach ($result->getRecords() as $record) 
		{
			# code...
			$comm=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));
			$comm->id=$record->value('id');
                        $comms[]=$comm;
		}

		return $comms;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc");
		}
	}
        
        public static function ShowRelevantCommercials(User $u)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (u:User)-[cp:COMMERCIAL_POST]->(c:Commercial)-[:TAGGED_COMMERCIAL_TOWN_STATE]->(l.Place {number:".$u->location->id."}) return c,cp, ID(c) as id";
          
		try
		{
		$result = $client->run($query);
		
		$comms=array();
		$comm=null;

		foreach ($result->getRecords() as $record) 
		{
			# code...
			$comm=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));
			$comm->id=$record->value('id');
                        $comms[]=$comm;
		}

		return $comms;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc");
		}
	}
        
        public static function ReadUsersCommercials(User $u)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (u:User {username:'$u->username'})-[cp:COMMERCIAL_POST]->(c:Commercial) return c,cp, ID(c) as id";
           
		try
		{
		$result = $client->run($query);
		
		$comms=array();
		$comm=null;

		foreach ($result->getRecords() as $record) 
		{
			# code...
			$comm=new Commercial($record->value('c')->value('text'),$record->value('c')->value('picture'),$record->value('cp')->value('expirationDateDay'),$record->value('cp')->value('expirationDateMonth'),$record->value('cp')->value('expirationDateYear'));
			$comm->id=$record->value('id');
                        $comms[]=$comm;
		}

		return $comms;

		}
		catch(Exception $e)
		{
			print_r("Greska commerc");
		}
	}
        
         public static function ReturnLocation(Commercial $commercial)
    {
        $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:". UserDB::$password."@localhost:7687")
    				->build();
		$query= "MATCH (c:Commercial)-[:TAGGED_COMMERCIAL_TOWN_STATE]-> (l:Place) WHERE ID(c)=".$commercial->id." return l";
		$result = $client->run($query);
		$record=$result->getRecord();
		$loc= new Location($record->value('l')->value('number'), $record->value('l')->value('town'), $record->value('l')->value('state'));
		return $loc;
    }

}