<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentDB
 *
 * @author Aleksandar
 */
include_once 'Comment.php';
include_once 'Twitt.php';
include_once 'User.php';
include_once 'UserDB.php';
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

class CommentDB
{
	public static $password="macka996";

	public static function CreateCommentOnly(Comment $c)
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "CREATE (c1:Comment{hour:'$c->hour', minute:'$c->minute', second:'$c->second', day:'$c->day', month:'$c->month', year:'$c->year', text:'$c->text'}) RETURN c1";//preuzeto ime iz arguemnta prosledjenog funkciji
		try
		{
			$result = $client->run($query);
		}
		catch(Exception $e)
		{
			
		}
	}
	public static function CreateComment(Comment $c,User $u, Twitt $t)
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (u1:User {username: '$u->username'}), (t1:Twitt {number:".$t->id."}) CREATE (u1)-[:COMMENT_POST]->(c1:Comment{hour:".$c->hour.", minute:".$c->minute.", second:".$c->second.", day:".$c->day.", month:".$c->month.", year:".$c->year.", text:'$c->text'}) -[:COMMENT_POST_FOR_TWITT]->(t1)";

		try
		{
			$result = $client->run($query);
		}
		catch(Exception $e)
		{
			
		}
	}
	public static function ReadComment($cmntText,Twitt $t)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (c:Comment)-[:COMMENT_POST_FOR_TWITT]->(t:Twitt) WHERE c.text='$cmntText' ANDt.text='$t->text' AND t.day='$t->day' AND t.month='$t->month' AND t.year='$t->year' RETURN c";
		try
		{
			$result = $client->run($query);
			return $result;
		}
		catch(Exception $e)
		{
			
		}
	}
	public static function ReadComments(Twitt $t) 
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (c:Comment)-[:COMMENT_POST_FOR_TWITT]->(t:Twitt) WHERE t.text='$t->text' AND t.day=".$t->day." AND t.month=".$t->month." AND t.year=".$t->year." RETURN c";
      
		try
		{
		$result = $client->run($query);
		$comments=array();
		$cmnt=null;

		foreach ($result->getRecords() as $record) {

				$cmnt=new Comment($record->value('c')->value('hour'),$record->value('c')->value('minute'),$record->value('c')->value('second'),$record->value('c')->value('day'),$record->value('c')->value('month'),$record->value('c')->value('year'),$record->value('c')->value('text'));
				$comments[]=$cmnt;
		}

		return $comments;

		}
		catch(Exception $e)
		{
			
		}
	}
	public static function DeleteComment(Comment $c,Twitt $t)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$query = "MATCH (c:Comment {text: '$c->text', hour: '$c-hour', minute: '$c->minute', second: '$c->second',day: '$c->day', month: '$c->month', year: '$c->year'})-[:COMMENT_POST_FOR_TWITT]->(t:Twitt {text: '$t->text'})
					DETACH DELETE c";
		try
		{
			$result = $client->run($query);
		}
		catch(Exception $e)
		{
			
		}
	}
	public static function UpdateComment(Comment $c,Twitt $t,$newText)
	{
		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
		$query = "MATCH (c:Comment {text: '$c->text', hour: '$c-hour', minute: '$c->minute', second: '$c->second',day: '$c->day', month: '$c->month', year: '$c->year'})-[:COMMENT_POST_FOR_TWITT]->(t:Twitt {text: '$t->text'})
					SET c.text = '$newText'";
		try
		{
			$result = $client->run($query);
		}
		catch(Exception $e)
		{
			
		}

	}
        
        public static function ReadCommentsUser(Comment $c)
        {
           
            $client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
		$query = "MATCH (n:User)-[:COMMENT_POST]->(c:Comment {text: '".$c->text."', hour:".$c->hour.", minute: ".$c->minute.", second: ".$c->second.",day: ".$c->day.", month: ".$c->month.", year: ".$c->year."})
					return n";
       
                try
		{
			
                        $result = $client->run($query);
            $record = $result->getRecord();
            
            $loc= UserDB::ReadUsersLocation($record->value('n')->value('username'));
           
            $user = new User($record->value('n')->value('email'), $record->value('n')->value('password'), $record->value('n')->value('name'), $record->value('n')->value('surname'), $record->value('n')->value('username'), $loc->town, $loc->state );
            return $user;
		}
		catch(Exception $e)
		{
			
		}
                
        }

}