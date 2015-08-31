<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TimeHelper extends Model
{
	public static function calculateTimeFromSeconds($seconds)
	{
				
		$hours = floor($seconds / 3600);
		$minutes = floor(($seconds / 60) % 60);

		return array('hours'=> $hours , 'minutes'=> $minutes);
	} 

	public static function calculateTimeFromMinutes($minutes)
	{

		return TimeHelper::calculateTimeFromSeconds($minutes*60);
	} 


}
