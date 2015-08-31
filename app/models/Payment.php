<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Payment extends Model
{
	protected $table = 'students_payments';

    public static function paymentlist() {
    	$paymentlist = DB::table('students_payments')
    					->join('students' , 'students.id' , '=' , 'students_payments.students_id')
    					->join('teachers' , 'teachers.id' , '=' , 'students_payments.teachers_id')
    					->join('users as students_users' , 'students_users.students_id' , '=' , 'students.id')
    					->join('users as teachers_users' , 'teachers_users.teachers_id' , '=' , 'teachers.id')
    					->select('students_users.firstname as students_firstname',
            					 'students_users.lastname as students_lastname ' ,
            					 'students_users.nickname as students_nickname' , 
            					 'teachers_users.firstname as teachers_firstname' , 
            					 'teachers_users.lastname as teachers_lastname' ,
            					 'teachers_users.nickname as teachers_nickname',
            					 'students_payments.*')
                        ->orderBy('students_payments.created_at', 'asc')
    					->get();
    	return $paymentlist;
    }


    public static function paymentById($id) {
        $paymentById = DB::table('students_payments')
                        ->join('students' , 'students.id' , '=' , 'students_payments.students_id')
                        ->join('teachers' , 'teachers.id' , '=' , 'students_payments.teachers_id')
                        ->join('users as students_users' , 'students_users.students_id' , '=' , 'students.id')
                        ->join('users as teachers_users' , 'teachers_users.teachers_id' , '=' , 'teachers.id')
                        ->select('students_users.firstname as students_firstname',
                                 'students_users.lastname as students_lastname ' ,
                                 'students_users.nickname as students_nickname' , 
                                 'teachers_users.firstname as teachers_firstname' , 
                                 'teachers_users.lastname as teachers_lastname' ,
                                 'teachers_users.nickname as teachers_nickname',
                                 'students_payments.topup_time as topup_time ',
                                 'students_payments.teachers_id as teachers_id',
                                 'students_payments.students_id as students_id',
                                 'students_payments.id as id')
                        ->where('students_payments.id' , '=' , $id)
                        ->orderBy('students_payments.created_at', 'asc')
                        ->first();
        return $paymentById;
    }

    static $rulesPayment = array(
        'topup_time' => 'required'
        );
}
