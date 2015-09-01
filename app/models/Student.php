<?php namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use DB;
use App\models\Schedule;

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
        'password' => 'confirmed|required' ,
        'profile_picture' => 'image|max:1000'
    );

    public static $ruleswithoutpassword = array(
        'firstname' => 'required' ,
        'lastname' => 'required' ,
        'nickname' => 'required' ,
        'email' => 'required|email' ,
        'student_phone' => 'required' ,
        'date_of_birth' => 'required',
        'parent_phone' => 'required',
        'profile_picture' => 'image|max:1000'
    );


    public static function studentList() {

         $student = DB::table('users')
            ->join('students','users.students_id', '=', 'students.id')
            ->select('students.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','students.student_phone','students.parent_phone')
            ->get();
        
        return $student;
    }

    //
    public static function newStudent(Request $request)
    {
        $student = new Student;
    
        $student->student_phone = $request->student_phone;
        $student->parent_phone =  $request->parent_phone;

        $student->save();

        return $student;
    }

    public function teachers()
    {
        return $this->belongsToMany('App\models\Teacher');
    }

    public function user()
    {
        return $this->belongsTo('App\models\User');
    }

    public static function scheduleOfStudent($students_id) 
    {
        $schedule = Schedule::_scheduleOfTeacher_Student(null ,$students_id );

        return $schedule;

    }
    
    public static function remainingStudyTime($students_id, $teachers_id)
    {
        $total_time_paid = Payment::getTotalTimePaid($students_id, $teachers_id);
        $total_time_studied = Schedule::getTimeStudied($students_id, $teachers_id);

        return $total_time_paid - $total_time_studied ;


    }
}
