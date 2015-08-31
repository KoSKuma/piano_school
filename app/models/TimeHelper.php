<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

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
	public static function calculateTimeStudent($time_minute, $students_id)
	{
		$schedule = Schedule::where('students_id',$students_id)->first();
		$student = Student::where('id',$students_id)->first();
		$payment = Payment::where('students_id',$students_id)->first();
		if ($schedule->status == 'Finish') {
		
			$time_finish = $student->remaining_time - $time_minute;

			$student->remaining_time = $time_finish;
			$student->save();

			$time_topup = $payment->topup_time - $time_minute;
			$payment->topup_time = $time_topup;
			$payment->save();
		}
	

	}


}
