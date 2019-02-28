<?php

include_once 'Commercial.php';

include_once 'redisComment.php';

require_once 'predis/autoload.php';

predis\Autoloader::register();

class redisEventMessages
{

	public static function sendMessage(Event $event,$message)
	{

		try {
		    $redis = new Predis\Client();
		    //$redis->connect('localhost', 6379);
		    
		    //$redis->set('name', 'Redis is Installed');
		    //echo $glueStatus = $redis->get('name');
		    $key=$event->name;
		    $redis->rPush($key,$message);
		    


		    //$redis->close();
		    
			} 
		catch (Exception $ex) {
		    	echo $ex->getMessage();
			}

	}

	public static function getAllMessagesForEvent(Event $event)
	{
		try {
		    $redis = new Predis\Client();
		    //$redis->connect('localhost', 6379);
		    
		    //$redis->set('name', 'Redis is Installed');
		    //echo $glueStatus = $redis->get('name');
		    $key=$event->name;
		    $messages=array();
		    
		    $lenght=$redis->lLen($key);
		    for ($i=0; $i < $lenght; $i++) { 
		    	# code...
		    	$messages[]=$redis->lIndex($key,$i);

		    }

		    //$redis->close();

		    return $messages;
		    
			} 
		catch (Exception $ex) {
		    	echo $ex->getMessage();
			}
	}

}