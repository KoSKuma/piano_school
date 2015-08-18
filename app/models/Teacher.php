<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

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
            'password' => 'confirmed|required'
            );

     public static $ruleswithoutpassword = array(
            'firstname' => 'required' ,
            'lastname' => 'required' ,
            'nickname' => 'required' ,
            'degrees' => 'required' ,
            'experience' => 'required' ,
            'institute' => 'required' ,
            'teacher_phone' => 'required' ,
            'date_of_birth' => 'required'
            );
    public static function teacherList() {
        $teacher = DB::table('users')
            ->join('teachers','users.teachers_id', '=', 'teachers.id')
            ->select('teachers.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','teachers.experience','teachers.degrees','teachers.institute','teachers.teacher_phone')
            ->get();

        return $teacher;
    }
}
