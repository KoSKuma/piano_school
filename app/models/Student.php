<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

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
            'email' => 'required|email' ,
            'nickname' => 'required' ,
            'student_phone' => 'required' ,
            'date_of_birth' => 'required',
            'parent_phone' => 'required'
            );
}
