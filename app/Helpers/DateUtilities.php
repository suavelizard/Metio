<?php namespace App\Helpers;

class DateUtilities extends Response{

	public function checkDateOverlap(Time $t1, Time $t2){
		if($t1 <= $t2){
			return false;
		} else {
			return true;
		}
	}

}