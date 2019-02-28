<?php
include_once 'Commercial.php';

include_once 'redisComment.php';

require_once 'predis/autoload.php';

predis\Autoloader::register();

class redisCommercialComments
{

	public static function leaveComment($id,Commercial $c, $comm)
	{

		try {
		    $redis = new Predis\Client();
		    //$redis->connect('localhost', 6379);
		    
		    //$redis->set('name', 'Redis is Installed');
		    //echo $glueStatus = $redis->get('name');
		    $key=$id."Commercial".$c->text."Comment";
		    $redis->rPush($key,$comm);
		    


		    //$redis->close();
		    
			} 
		catch (Exception $ex) {
		    	echo $ex->getMessage();
			}

	}

	public static function getComments($id,Commercial $c)
	{

		try {
		    $redis = new Predis\Client();
		    //$redis->connect('localhost', 6379);
		    
		    //$redis->set('name', 'Redis is Installed');
		    //echo $glueStatus = $redis->get('name');
		    $key=$id."Commercial".$c->text."Comment";
		    
		    $messages=array();
		    
		    $lenght=$redis->lLen($key);

		    for ($i=0; $i < $lenght; $i++) { 
		    	# code...
		    	$messages[]=$redis->lIndex($key,$i); //vraca nam komentare iz liste i samo se prikazu
		    }


			return $messages;
		    //$redis->close();
		    
			} 
		catch (Exception $ex) {
		    	echo $ex->getMessage();
			}

	}

}