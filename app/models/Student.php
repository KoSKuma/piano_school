<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use DB;

class Student extends Model
{
    public $timestamps = false;
    public static $rules = array(
            'firstname' => 'required' ,
            'lastname' => 'required' ,
            'email' => 'required|email' ,
            'nickname' => 'required' ,
            'student_phone' => 'required' ,
            'date_of_birth' => 'required',
            'parent_phone' => 'required',
            'password' => 'confirmed|required'
            );

     public static $ruleswithoutpassword = array(
            'firstname' => 'required' ,
            'lastname' => 'required' ,
            'nickname' => 'required' ,
            'student_phone' => 'required' ,
            'date_of_birth' => 'required',
            'parent_phone' => 'required'
            );


     public static function studentList() {

         $student = DB::table('users')
            ->join('students','users.students_id', '=', 'students.id')
            ->select('students.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','students.student_phone','students.parent_phone')
            ->get();
        
        return $student;
       } 

}
