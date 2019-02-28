<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoggedDB
 *
 * @author Aleksandar
 */
include_once 'Logged.php';
include_once 'User.php';

class LoggedDB {
    //put your code here
    public static $password="luka";

	public static function CreateLog(User $u)
	{

		$client = ClientBuilder::create()
    				->addConnection("bolt", "bolt://neo4j:".UserDB::$password."@localhost:7687")
    				->build();
    	$dt=new DateTime();

		$h = $dt->format('H'); // '20'	
		$min = $dt->format('i');
		$s=$dt->format('s');

		$y=$dt->format('Y');
		$m=$dt->format('m');
		$d=$dt->format('d');
		//echo "<br>" ;
		//echo "".$h." ".$min." ".$s." ".$y." ".$m." ".$d."";

    	$query = "MATCH (n:User{email:'$u->email'}) CREATE(l:Logged{hour:toInt('$h'), minute:toInt('$min'), second:toInt('$s'), day:toInt('$d'), month:toInt('$m'), year:toInt('$y')}), (n)-[:LOG]->(l)";
		try
		{
		$result = $client->run($query);
		}
		catch(Exception $e)
		{
			
		}
	}

	public static function ReturnLogs(User $u)
	{
		$query = "MATCH (n:Logged)<-[:LOG]-(u:User{email:'$u->email'}) RETURN n";
		try
		{
		$result = $client->run($query);
		$logs=array();
		$ll=null;
		foreach ($result->getRecords() as $record) {
    	
				$ll=new Logged($record->value('n')->value('hour'),$record->value('n')->value('minute'),$record->value('n')->value('second'),$record->value('n')->value('year'),$record->value('n')->value('month'),$record->value('n')->value('day'));
				$logs[]=$us;
		}

		}
		catch(Exception $e)
		{
			
		}
	}
}
