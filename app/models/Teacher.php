<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;

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
}
