<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\models\Schedule;

class Teacher extends Model
{
    public $timestamps = false;
    public static $rules = array(
            'firstname' => 'required' ,
            'lastname' => 'required' ,
            'email' => 'required|email' ,
            'nickname' => 'required' ,
            'degrees' => 'required' ,
            'experience' => 'required' ,
            'institute' => 'required' ,
            'teacher_phone' => 'required' ,
            'date_of_birth' => 'required',
            'password' => 'confirmed|required',
            'profile_picture' => 'image|max:1000'
            );

     public static $ruleswithoutpassword = array(
            'firstname' => 'required' ,
            'lastname' => 'required' ,
            'nickname' => 'required' ,
            'degrees' => 'required' ,
            'experience' => 'required' ,
            'institute' => 'required' ,
            'teacher_phone' => 'required' ,
            'date_of_birth' => 'required',
            'profile_picture' => 'image|max:1000'
            );
     
    public static function teacherList() {
        $teacher = DB::table('users')
            ->join('teachers','users.teachers_id', '=', 'teachers.id')
            ->select('teachers.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','teachers.experience','teachers.degrees','teachers.institute','teachers.teacher_phone')
            ->get();

        return $teacher;
    }
    public static function scheduleOfTeacher($teachers_id)
    {
       $schedule = Schedule::_scheduleOfTeacher_Student($teachers_id, null);

       return $schedule; 
    }
}
