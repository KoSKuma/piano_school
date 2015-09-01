<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimeHelper;
use DB;

class Schedule extends Model
{
    protected $table = 'students_teachers';

    public static $rules = array(
        'teachers_id' => 'required' ,
        'students_id' => 'required' ,
        'class_date' => 'required' ,
        'start_time' => 'required' ,
        'end_time' => 'required' ,
        'location' => 'required',
    );

    public static $rules_update = array(
        'teacher_name' => 'required' ,
        'student_name' => 'required' ,
        'class_date_display' => 'required' ,
        'start_time_display' => 'required' ,
        'end_time_display' => 'required' ,
        'location' => 'required',
    );

    public static function scheduleList (){
        
     
    	$schedulelist = DB::table('students_teachers')
            ->join('users as students', 'students.students_id', '=', 'students_teachers.students_id')
            ->join('users as teachers', 'teachers.teachers_id', '=', 'students_teachers.teachers_id')
            ->select('students_teachers.id as id', 
                'students_teachers.start_time as start_time', 
                'students_teachers.end_time as end_time', 
                'students_teachers.teachers_id as teachers_id', 
                'students_teachers.students_id as students_id', 
                'students.nickname as student_nickname', 
                'students.firstname as student_firstname', 
                'students.lastname as student_lastname',
                'teachers.nickname as teacher_nickname', 
                'teachers.firstname as teacher_firstname', 
                'teachers.lastname as teacher_lastname',
                'students_teachers.status as status')
             ->get();
        return $schedulelist;
    }
    public static function scheduleById ($id){
        $scheduleById = DB::table('students_teachers')
            ->join('users as students', 'students.students_id', '=', 'students_teachers.students_id')
            ->join('users as teachers', 'teachers.teachers_id', '=', 'students_teachers.teachers_id')
            ->select('students_teachers.id as id', 
                'students_teachers.start_time as start_time', 
                'students_teachers.end_time as end_time', 
                'students_teachers.teachers_id as teachers_id', 
                'students_teachers.students_id as students_id', 
                'students.nickname as student_nickname', 
                'students.firstname as student_firstname', 
                'students.lastname as student_lastname',
                'teachers.nickname as teacher_nickname', 
                'teachers.firstname as teacher_firstname', 
                'teachers.lastname as teacher_lastname', 
                'students_teachers.location as location',
                'students_teachers.status as status')
            ->where('students_teachers.id' , '=' , $id )
            
            ->first();
           
        return $scheduleById;
    }

    public static function _scheduleOfTeacher_Student($teachers_id = null, $students_id = null)
    {
        if(!is_null($teachers_id) && !is_null($students_id))
        {
            $whereClause = 'students_teachers.teachers_id = '.$teachers_id.' AND '.'students_teachers.students_id = '.$student_id;
        }
        elseif (!is_null($teachers_id)) 
        {
            $whereClause = 'students_teachers.teachers_id = '.$teachers_id;
        }
        elseif(!is_null($students_id)) 
        {
            $whereClause = 'students_teachers.students_id = '.$students_id;
        }

        $schedule = DB::table('students_teachers')
            ->join('users as students', 'students.students_id', '=', 'students_teachers.students_id')
            ->join('users as teachers', 'teachers.teachers_id', '=', 'students_teachers.teachers_id')
            ->select('students_teachers.id as id', 
                'students_teachers.start_time as start_time', 
                'students_teachers.end_time as end_time', 
                'students_teachers.teachers_id as teachers_id', 
                'students_teachers.students_id as students_id', 
                'students.nickname as student_nickname', 
                'students.firstname as student_firstname', 
                'students.lastname as student_lastname', 
                'teachers.nickname as teacher_nickname', 
                'teachers.firstname as teacher_firstname', 
                'teachers.lastname as teacher_lastname', 
                'students_teachers.location as location',
                'students_teachers.status as status')
            ->whereRaw( $whereClause )
            //->where('students_teachers.teachers_id' , '=' , $teacher_id )
            //->where('students_teachers.students_id' , "=" , $student_id )
            ->get();

            return $schedule;
    }
    public static function setStatus($request)
    {
         $schedule  = Schedule::where('students_teachers.id',$request->id)->first();

        if($schedule->status == 'Not Finish')
        { 
            $schedule->status = 'Finish';
            $status = 'Finish';
           
        }
         else
         {
            $schedule->status = 'Not Finish';
             $status = 'Not Finish';
          
        }
        $schedule->save();

        return $status;
    }

    public static function getStatus($status)
    {
        if($status=='Finish')
            return "Finish";
        else
            return "Not finish";
    }

    public function time(){
        return TimeHelper::calculateElapsedTime($this->start_time , $this->end_time);
    }

    public static function getTimeStudied($students_id, $teachers_id)
    {
        $schedules = Schedule::where('students_id',$students_id)
                             ->where('teachers_id', $teachers_id)
                             ->where('status' , 'Finish')
                             ->get();

        $totalTimeStudied = 0;

        foreach ($schedules as $schedule) {
            $totalTimeStudied += $schedule->time();
        }

        return $totalTimeStudied;

    }

 
}