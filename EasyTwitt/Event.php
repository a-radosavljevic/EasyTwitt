<?php


class Event{
	public $name;
	public $hour;
	public $minute;
	public $day;
	public $month;
	public $year;
	public $info;
	public $noGuests;
        public $location;
        public $id;
	public function __construct($n, $h, $mi, $d, $m, $y, $i, $ng)
	{
		$this->name=$n;
		$this->hour=$h;
		$this->minute=$mi;
		$this->day=$d;
		$this->month=$m;
		$this->year=$y;
		$this->info=$i;
		$this->noGuests=$ng;
	}
	
        public function setLocation($loc)
        {
            $this->location=$loc;
        }
        
        public function setId($id)
        {
            $this->id=$id;
        }
	
}
?>