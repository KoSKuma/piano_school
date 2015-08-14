<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Teacher;
use App\User;
use Validator;
use DB;
use Log;


class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teacher = DB::table('users')
            ->join('teachers','users.teachers_id', '=', 'teachers.id')
            ->select('teachers.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','teachers.experience','teachers.degrees','teachers.institute','teachers.teacher_phone')
            ->get();
        return view('teacher.index',['teacherlist'=>$teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('teacher.add');
    }

   
    public function store(Request $request)
    {

       $rules = array(
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

        $validator = Validator::make($request->all(), $rules );

        if ($validator->fails()) {

            return redirect('teacher/create')->withErrors($validator);

        } 

        else {       
            $users = new User;

            $users->firstname = $request->firstname;
            $users->lastname = $request->lastname;
            $users->nickname = $request->nickname;
            $users->email = $request->email;
            $users->password = bcrypt($request->password);
            $users->date_of_birth = $request->date_of_birth;


            $users->save();


            $teacher = new Teacher;

            $teacher->degrees = $request->degrees;
            $teacher->experience = $request->experience;
            $teacher->institute = $request->institute;
            $teacher->teacher_phone = $request->teacher_phone;
            
       
            $teacher->save();

            $users->teachers_id = $teacher->id;
            $users->save();

        return  redirect('teacher');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $teacher = DB::table('users')
            ->join('teachers','users.teachers_id', '=', 'teachers.id')
            ->select('teachers.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','teachers.experience','teachers.degrees','teachers.institute','teachers.teacher_phone')
            ->where('teachers.id','=',$id);

        $teacher = $teacher->first();

        return view('teacher.edit',['teacher'=>$teacher]);
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
        $users  = User::find($id);
            $users->firstname = $request->firstname;
            $users->lastname = $request->lastname;
            $users->nickname = $request->nickname;
            $users->date_of_birth = $request->date_of_birth;

            $users->save();

        $users = User::find($id);
            $teacher->degrees = $request->degrees;
            $teacher->experience = $request->experience;
            $teacher->institute = $request->institute;
            $teacher->teacher_phone = $request->teacher_phone;
            
            $teacher->save();

            $users->teachers_id = $teacher->id;
            $users->save();

        return  redirect('teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
