<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\models\Teacher;
use App\models\Student;
use App\models\Schedule;
use Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $scheduleList = Schedule::scheduleList();
        return view('schedule.index', ['scheduleList' => $scheduleList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $teacher = Teacher::teacherList();
        $student = Student::studentList();
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
     
        $teacherlist = Teacher::teacherList();
  
        $studentlist = Student::studentList();
      

       
        return view('schedule.edit',['scheduleById'=>$scheduleById , 'teacherlist'=>$teacherlist , 'studentlist'=>$studentlist]);
     
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

        
    /*      
            $teacher->teachers_id = $request->teachers_id;
            $teacher->save();

          
            $student->students_id = $request->students_id;
            $student->save();
*/
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
