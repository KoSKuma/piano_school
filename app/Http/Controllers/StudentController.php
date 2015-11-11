<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Student;
use App\User;
use Validator;
use DB;
use Entrust;
use App;
use App\models\Role;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $students = Student::searchStudentList($request->input('search'));
            $searchResult = array(
                'status'    =>  'ok',
                'keyword'   =>  $request->input('search'),
                'count'     =>  $students->count(),
            );
            
        }
        else
        {
            $students = Student::studentList();
            $searchResult = array(
                'status'    =>  'ok',
                'keyword'   =>  null,
                'count'     =>  $students->count(),
            );
        }
        
        return view('student.index',['students'=>$students->paginate(10)])->with('searchResult', $searchResult);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        return view('student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), Student::$rules );

        if ($validator->fails()) {

            return redirect('student/create')->withErrors($validator);

        } 

        else {       
            
            $user = User::createUser($request);
            $request->student_phone = str_replace('-', '', $request->student_phone);
            $request->parent_phone = str_replace('-', '', $request->parent_phone);
            $student = Student::newStudent($request);

            $user->students_id = $student->id;

            $studentRole = Role::where('name', '=', 'student')->get()->first();
            $user->attachRole($studentRole);
            
            if($request->hasFile('profile_picture')){
                if($request->file('profile_picture')->isValid()){
                    $filename = $user->id.'.'.$request->file('profile_picture')->guessExtension();
                    $request->file('profile_picture')->move('uploads/profile_pictures', $filename);
                    $user->picture = $filename;
                }
            }

            $user->save();

        return  redirect('student');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $student = Student::find($id);
    

        return view('student.view', ['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        /*if(!Entrust::can('edit-student'))
        {
            return redirect("/student");
        }*/

        $student = DB::table('users')
        ->join('students','users.students_id', '=', 'students.id')
        ->select('students.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','students.student_phone','students.parent_phone', 'users.picture')
        ->where('students.id','=',$id);

        $student = $student->first();

        return view('student.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), Student::$ruleswithoutpassword );

        if ($validator->fails()) {

            return redirect('student/'.$id.'/edit')->withErrors($validator);

        } 

        else {

            $users = User::where('students_id',$id)->first();

            // File upload
            if($request->hasFile('profile_picture')){
                if($request->file('profile_picture')->isValid()){
                    $filename = $id.'.'.$request->file('profile_picture')->guessExtension();
                    $request->file('profile_picture')->move('uploads/profile_pictures', $filename);
                    $users->picture = $filename;
                }
            }

            

            $users->firstname = $request->firstname;
            $users->lastname = $request->lastname;
            $users->nickname = $request->nickname;
            //$users->email = $request->email;
            $users->date_of_birth = $request->date_of_birth;

            $users->save();


            $student = Student::find($id);

            $request->student_phone = str_replace('-', '', $request->student_phone);
            $request->parent_phone = str_replace('-', '', $request->parent_phone);

            $student->student_phone = $request->student_phone;
            $student->parent_phone =  $request->parent_phone;

            $student->save();

        return  redirect('student/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::where('students_id',$id)->first();
        $users  = User::find($user->id);
        $users->delete();

        $student = Student::find($id);
        $student->delete();
        
        return redirect('student');
    }

      public static function scheduleOfTeacher($students_id)
    {
       $schedule = Schedule::_scheduleOfTeacher_Student($students_id, null);

       return $schedule; 
    }

    public static function viewDeletedStudent()
    {

        $students = Student::deletedList()->get();
        return view('student.deleted',['deletedList'=>$students]);
    }

    public function restore(Request $request)
    {

        $student = Student::withTrashed()
                    ->where('id',$request->id)
                    ->restore();

        $user = User::withTrashed()
                    ->where('students_id',$request->id)
                    ->restore();

        $user = User::where('students_id',$request->id)->first();
        $user = User::find($user->id);

        $studentRole = Role::where('name', '=', 'student')->get()->first();
        $user->attachRole($studentRole);



        return redirect('student');

    }
   
}
