<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Student;

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
	
	public static function secondsToMinutes($seconds)
	{
		return $seconds/60;
	}
	
	public static function calculateElapsedTime($start_time , $end_time)
	{
		return TimeHelper::secondsToMinutes(strtotime($end_time) - strtotime($start_time));
	}
}
