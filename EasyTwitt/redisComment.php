<?php

class redisComment
{

	public static function writeComments($user, $twit, $comments)
	{
		try {
		    $redis = new Predis\Client();
		    //$redis->connect('localhost', 6379);
		    
		    //$redis->set('name', 'Redis is Installed');
		    //echo $glueStatus = $redis->get('name');
		    $key=$user->username."TwitComments".$twit->id;

		    foreach ($comments as $value) {
		    	# code...
		    	$redis->rPush($key, $value->hour);
		    	$redis->rPush($key, $value->minute);
		    	$redis->rPush($key, $value->second);
		    	$redis->rPush($key, $value->day);
		    	$redis->rPush($key, $value->month);
		    	$redis->rPush($key, $value->year);
		    	$redis->rPush($key, $value->text);
		    }

		    //$redis->close();
		    
			} 
		catch (Exception $ex) {
		    	echo $ex->getMessage();
			}
	}

	public static function readComments($user, $twit, $comments)
	{

		try {
		    $redis = new Predis\Client();
		    //$redis->connect('localhost', 6379);
		    
		    //$redis->set('name', 'Redis is Installed');
		    //echo $glueStatus = $redis->get('name');
		    $key=$user->username."TwitComments".$twit->id;

		    $komentari=array();

		    $lenght=$redis->lLen($key);
		    for ($i=0; $i < $lenght/6; $i++) { 
		    	# code...
		    	$c=new Comment($redis->lIndex($key,$i),$redis->lIndex($key,$i+1),$redis->lIndex($key,$i+2),$redis->lIndex($key,$i+3),$redis->lIndex($key,$i+4),$redis->lIndex($key,$i+5));
		    	$komentari[]=$c;

		    }

		    //$redis->close();
			return $komentari;

			} 
		catch (Exception $ex) {
		    	echo $ex->getMessage();
			}
			
	}


}