<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;

use Response;
use DB;
use Validator;
use Auth;
use Entrust;

use App\models\Teacher;
use App\models\Student;
use App\models\Schedule;
use App\models\TimeHelper;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $searchResult = array();

        if($request->has('date'))
        {
            $date = $request->input('date');
        }
        else
        {
            $date = date("Y-m-d");
        }

        if($request->has('search'))
        {
            $search = $request->input('search');
        }
        else
        {
            $search = NULL;
        }

        if (Entrust::hasRole('admin'))
        {
            $schedules = schedule::scheduleList($date, $search);
            $searchResult = array(
                'status'    =>  'ok',
                'keyword'   =>  $request->input('search'),
                'count'     =>  $schedules->count(),
            );
        }
        if (Entrust::hasRole('teacher'))
        {
            $schedules = Teacher::scheduleOfTeacher($user->teachers_id, $date);
        }
        if (Entrust::hasRole('student'))
        {
            $schedules = Student::scheduleOfStudent($user->students_id, $date);
        }

        return view('schedule.index' , ['schedules' => $schedules->paginate(25)])->with( 'date', $date )->with('searchResult', $searchResult);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $teacher = Teacher::teacherList()->get();
        $student = Student::studentList()->get();
        //print_r($teacher);die();
        return view('schedule.booking',['teacherlist'=>$teacher , 'studentlist'=>$student ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $schedule = new Schedule;

        $schedule->teachers_id = $request->teachers_id;
        $schedule->students_id = $request->students_id;
        $schedule->start_time = $request->class_date . " " . $request->class_start_time;
        $schedule->end_time = $request->class_date . " " . $request->class_end_time;
        $schedule->location = $request->location;
        $schedule->save();

        return redirect('schedule');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       $scheduleById = Schedule::scheduleById($id);
     
        $teacherlist = Teacher::teacherList()->get();
  
        $studentlist = Student::studentList()->get();
      

       
        return view('schedule.edit',['scheduleById'=>$scheduleById , 'teacherlist'=>$teacherlist , 'studentlist'=>$studentlist]);
     
    }
    public function status(Request $request)
    {
        $schedule  = Schedule::setStatus($request);
        
        return redirect('schedule')->with('status', $schedule);
    }


   
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), Schedule::$rules_update);

        if ($validator->fails()) {

            return redirect('schedule/'.$id.'/edit')->withErrors($validator);

        } 

        else {

            $schedule  = Schedule::where('students_teachers.id',$id)->first();
            
            $schedule->teachers_id = $request->teachers_id;
            $schedule->students_id = $request->students_id;
            $schedule->start_time = $request->class_date . " " . $request->class_start_time;
            $schedule->end_time = $request->class_date . " " . $request->class_end_time;
            $schedule->location = $request->location;

            $schedule->save();

        
        return  redirect('schedule');
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
        
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('schedule');
    }
    

 }