<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Twitt
 *
 * @author Aleksandar
 */
require_once 'vendor/autoload.php';

require_once 'vendor/graphaware/neo4j-php-client/src/ClientBuilder.php';

use GraphAware\Neo4j\Client\ClientBuilder;

include_once 'Comment.php';

include_once 'Picture.php';


class Twitt {
    
    public $id;
    
    public $user;
    public $tags;
    public $text;
    public $comments=array();
    public $photos=array();
    
    public $day;
    public $month;
    public $year;
    
    public $likesNO=0;
    public $retwittsNO=0;
    
    public function __construct($id, $user, $tags, $text, $comments, $photos, $day, $month, $year, $likesNO, $retwittsNO) {
        $this->id=$id;
        
        $this->user=$user;
        $this->tags=$tags;
        $this->text=$text;
        $this->comments=$comments;
        $this->photos=$photos;
        
        $this->day=$day;
        $this->month=$month;
        $this->year=$year;
        
        $this->likesNO=$likesNO;
        $this->retwittsNO=$retwittsNO;
    }
    public function addComment(Comment $comment) {
        $this->comments[]=$comment;
    }

    
    public function removeComment(Comment $comment) {
        $key = array_search($comment,$this->comments);
        if($key!==false){
            unset($array[$key]);
            $this->comments = array_values($this->comments);
        }
    }
    
    public function addPhoto(Picture $photo) {
        $this->photos[]=$photo;
    }
    
    public function removePhoto(Picture $photo) {
        $key = array_search($photo,$this->photos);
        if($key!==false){
            unset($array[$key]);
            $this->comments = array_values($this->photos);
        }
    }
     public function setUser(User $u)
    {
        $this->user=$u;
    }
    public function addLike() {
        $this->likesNO++;
    }
    
    public function removeLike() {
        $this->likesNO--;
    }
    
    public function addRetwitt() {
        $this->retwittsNO++;
    }
    
    public function removeRetwitt() {
        $this->retwittsNO--;
    }


    //put your code here
}
