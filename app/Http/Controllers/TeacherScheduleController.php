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
      
        $time_in_config = Config::get('piano.class_time');
        $teachers = Teacher::teacherList();

      
       

        $date_request = $request->date;
        $teacher_id = $request->teacher;
        $date_range_selected = array();
        $schedule_of_teacher = array();
        $schedules_id = array();

        if($date_request!=NULL){ 
            $split_date = explode(' - ', $date_request);
            $start_date = new DateTime($split_date[0]);
            $end_date = new DateTime($split_date[1]);
            $day_count = $end_date->diff($start_date)->format('%a');

            $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
            $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');

           
            }else{
                $start_date = new DateTime();
                $end_date = new DateTime();

                $day_count = $end_date->diff($start_date)->format('%a');

                $start_date_timestamp =  $start_date->format('Y-m-d 00:00:00'); 
                $end_date_timestamp =  $end_date->format('Y-m-d 23:59:59');
            }

            $date_range_selected[] = $start_date->format('D d M');
            for ($i=0; $i < $day_count ; $i++) { 
                $start_date->add(new DateInterval('P1D'));
                $date_range_selected[$start_date->format('Y-m-d')] = $start_date->format('D d M');
            


            $schedule_of_teacher = Schedule::getTeacherSchedule($teacher_id,$start_date_timestamp,$end_date_timestamp);
            $schedules_id = Schedule::getScheduleId($teacher_id, $start_date_timestamp, $end_date_timestamp);

        }


        return view('teacherschedule.index',[
                'time_in_config'=>$time_in_config, 
                'date_range_selected'=>$date_range_selected,
                'date_request'=>$date_request,
                'teachers' => $teachers->get(),
                'schedule_of_teacher' => $schedule_of_teacher,
                'teacher_id'=> $teacher_id ,
                'schedules_id' =>$schedules_id         
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
