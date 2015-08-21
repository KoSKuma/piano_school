<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\models\Teacher;
use App\models\Student;
use App\models\Schedule;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $scheduleList = DB::table('students_teachers')
            ->join('users as students', 'students.students_id', '=', 'students_teachers.students_id')
            ->join('users as teachers', 'teachers.teachers_id', '=', 'students_teachers.teachers_id')
            ->select('students_teachers.id as id', 'students_teachers.start_time as start_time', 'students_teachers.end_time as end_time', 'students_teachers.teachers_id as teachers_is', 'students_teachers.students_id as students_id', 'students.nickname as student_nickname', 'students.firstname as student_firstname', 'students.lastname as student_lastname', 'teachers.nickname as teacher_nickname', 'teachers.firstname as teacher_firstname', 'teachers.lastname as teacher_lastname')
            ->get();
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
        $schedule->start_time = $request->class_date . " " . $request->start_time;
        $schedule->end_time = $request->class_date . " " . $request->end_time;
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
        //
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
        //
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
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect('schedule');
    }
}
