<?php
class Notification{ //user is notified via its notification node, when some other user likes or comments on his twitt
public $date;
public $fromUser;
public $type;
public $onTwitt;
public $id;

public function __construct($d, $u, $ty, $tw) {
    $this->date=$d;
    $this->fromUser=$u;
    $this->type=$ty;
    $this->onTwitt=$tw;
    
}

public function setId($i)
{
    $this->id=$i;
}
}