<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Commercial
{

	public $text;
	public $filePath;
	public $day;
	public $month;
	public $year;
        public $id;

        public function __construct($t,$p,$d,$m,$y)
	{
		$this->text=$t;
		$this->filePath=$p;
		$this->day=$d;
		$this->month=$m;
		$this->year=$y;
	}
	public static function checkCommercialDate(Commercial $c)
	{

		$dt=new DateTime();

			$h = $dt->format('H'); // '20'	
			$min = $dt->format('i');
			$s=$dt->format('s');

			$y=$dt->format('Y');
			$m=$dt->format('m');
			$d=$dt->format('d');

		if($c->year>$y)
		{
			return 1;
		}
		else 
		{
			if($c->year<$y)
			{
				return 0;
			}
			else
			{
				if($c->month>$m)
				{
					return 1;
				}
				else 
				{
					if($c->month<$m)
					{
						return 0;
					}
					else
					{
						if($c->day>$d)
						{
							return 1;
						}
						else
						{
							if($c->day<$d)
							{
								return 0;
							}
							else
							{
								return 1;
							}

						}
					}
				}
			}
		}

	}
        
        public function SetId($id)
        {
            $this->id=$id;
        }

}