<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

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
}
