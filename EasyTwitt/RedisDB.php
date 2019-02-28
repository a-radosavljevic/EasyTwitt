<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RedisDB
 *
 * @author Aleksandar
 */
include_once 'User.php';

include_once 'redisComment.php';

require_once 'predis/autoload.php';

predis\Autoloader::register();

class RedisDB {
    //put your code here
    
    public static function saveUser(User $u)
    {
        $redis = new Predis\Client();
        
        $redis->set("user:".$u->email, GuzzleHttp\json_encode($u));
        
        $key = "twitt:" . $u->email;
        
        $i=0;
        
        foreach(UserDB::ShowRelevantTwitts($u) as $t)
        {
            $redis->rPush($key, GuzzleHttp\json_encode($t));
                //redisComment::writeComments($u, $t, $t->comments);
            
        }
        
    }
    
    public static function readUser($email)
    {
        $redis = new Predis\Client();
        
        $str = $redis->get("user:".$email);
        
        //$u = (Twitt)json_decode($str);
        
        $key = "twitt:" . $email;
        
        $twitts = array();
        
        for($i=0; $i<$redis->lLen($key); $i++)
        {
            $str = $redis->	lIndex($key,$i);
            $u = json_decode($str);
			$t = new Twitt($u->id, $u->user, null, $u->text, $u->comments, $u->photos, $u->day, $u->month, $u->year, $u->likesNO, 0);
            
            $twitts[] = $t;
        }
		
        //var_dump($twitts);
        return $twitts;
        
    }
	
	public static function deleteUser($email)
	{
		$redis = new Predis\Client();
		
		$key = "twitt:" . $email;
		
		$redis->del($key);
	}
}
