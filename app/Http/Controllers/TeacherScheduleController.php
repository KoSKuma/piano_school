<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;
use App\models\Schedule;
use DateTime;
use DateInterval;
use App\models\Teacher;

class TeacherScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
      
        $class_time = Config::get('piano.class_time');
        $teachers = Teacher::teacherList();
       

        $value = $request->date;
        $teacher_id = $request->teacher;
        $dateArray = array();
        $schedule_of_teacher = array();

        if($value!=NULL){ 
            $date = explode(' - ', $value);
            $start_date = new DateTime($date[0]);
            $end_date = new DateTime($date[1]);
            $day_count = $end_date->diff($start_date)->format('%a');

            $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
            $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');

            $dateArray[] = $start_date->format('D d M');
            for ($i=0; $i < $day_count ; $i++) { 
                $start_date->add(new DateInterval('P1D'));
                $dateArray[$start_date->format('Y-m-d')] = $start_date->format('D d M');

            }


            $schedule_of_teacher = Schedule::getTeacherSchedule($teacher_id,$start_date_timestamp,$end_date_timestamp);
            //print_r($schedule_of_teacher);die();
        }


        return view('teacherschedule.index',[
                'time'=>$class_time, 
                'dateArray'=>$dateArray,
                'date'=>$value,
                'teachers' => $teachers->get(),
                'schedule_of_teacher' => $schedule_of_teacher,
                'teacher_id'=>$teacher_id
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
