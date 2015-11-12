<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Config;
use App\models\Teacher;
use App\models\Schedule;
use DateTime;
use DateInterval;

class TeacherSchedule extends Model
{
    public static function getTeacherSchedule ($request){
    	$time_in_config = Config::get('piano.class_time');
        $teachers = Teacher::teacherList();
        $date_request = $request->date;
        $teacher_id = $request->teacher;
        $date_range_selected = array();
        $schedule_of_teacher = array();
        $schedules_id = array();

         if($date_request!=NULL) {
            $split_date = explode(' - ', $date_request);
            $start_date = new DateTime($split_date[0]);
            $end_date = new DateTime($split_date[1]);
            $day_count = $end_date->diff($start_date)->format('%a');

            $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
            $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');

         }else {
             
                $teacher_id = 20;
                $start_date = new DateTime();
                $end_date = new DateTime();
                $end_date = $end_date->modify('+7 day');
                $day_count = $end_date->diff($start_date)->format('%a');
                $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
                $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');
         }

        $date_range_selected = Schedule::getTeacherScheduleFromSelectedDate($start_date,$day_count); 
        $schedule_of_teacher = Schedule::getTeacherSchedule($teacher_id,$start_date_timestamp,$end_date_timestamp);
        $schedules_id = Schedule::getScheduleId($teacher_id, $start_date_timestamp, $end_date_timestamp);


        return [
                'time_in_config'=>$time_in_config, 
                'date_range_selected'=>$date_range_selected,
                'date_request'=>$date_request,
                'teachers' => $teachers->get(),
                'schedule_of_teacher' => $schedule_of_teacher,
                'teacher_id'=> $teacher_id ,
                'schedules_id' =>$schedules_id,
                'start_date' => $start_date,
                'end_date' =>  $end_date         
            ];
    }

    public static function getTeacherScheduleById ($request, $request_teacher_id){
    	$time_in_config = Config::get('piano.class_time');
        $teachers = Teacher::teacherList();
       	$date_request = $request->date;
        $teacher_id = $request_teacher_id;
        $date_range_selected = array();
        $schedule_of_teacher = array();
        $schedules_id = array();


       
        if($date_request!=NULL) {
            $split_date = explode(' - ', $date_request);
            $start_date = new DateTime($split_date[0]);
            $end_date = new DateTime($split_date[1]);

            $day_count = $end_date->diff($start_date)->format('%a');

            $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
            $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');

         }else {
                $teacher_id = 20;
                $start_date = new DateTime();
                $end_date = new DateTime();
                $end_date->modify('+7 day');
                $day_count = $end_date->diff($start_date)->format('%a');
                $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
                $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');
         }


         

        $date_range_selected = Schedule::getTeacherScheduleFromSelectedDate($start_date,$day_count); 
        $schedule_of_teacher = Schedule::getTeacherSchedule($teacher_id,$start_date_timestamp,$end_date_timestamp);
        $schedules_id = Schedule::getScheduleId($teacher_id, $start_date_timestamp, $end_date_timestamp);

        return [
                'time_in_config'=>$time_in_config, 
                'date_range_selected'=>$date_range_selected,
               	'date_request'=>$date_request,
                'teachers' => $teachers->get(),
                'schedule_of_teacher' => $schedule_of_teacher,
                'teacher_id'=> $teacher_id ,
                'schedules_id' =>$schedules_id         
            ];
    }
}
