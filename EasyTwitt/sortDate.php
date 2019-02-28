<?php

 class DateSort
{
	static function date_compare($a, $b)
	{
            $t1 = strtotime($a->datetime->format("Y-m-d H:i:s"));
            $t2 = strtotime($b->datetime->format("Y-m-d H:i:s"));
            return $t1 - $t2;
	} 
	
	public static function SortMessages($array)
	{
		usort($array, array("DateSort","date_compare"));
		return $array;
	}
        
       
}
?>