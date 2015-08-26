<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
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
                'teachers.lastname as teacher_lastname')
            //->where('students_teachers.id' , '=' , $id )->first();
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
                'students_teachers.location as location')
            ->where('students_teachers.id' , '=' , $id )->first();
           
        return $scheduleById;
    }

}
