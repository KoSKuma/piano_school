<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Entrust;
use Auth;
use App\models\Teacher;
use App\models\Student;
use App\models\Schedule;
use App\models\TeacherSchedule;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        //print_r($user);die();

        if (Entrust::hasRole('admin')) {
            $teacherschedule = TeacherSchedule::getTeacherSchedule($request);
            return view('admin.home' , $teacherschedule);
        }
        if (Entrust::hasRole('teacher')) {
            $teacherschedule = TeacherSchedule::getTeacherScheduleById($request,$user->teachers_id);
            return view('teacher.home' , $teacherschedule);

        }
        if (Entrust::hasRole('student')) {
            $student_schedule = Student::scheduleOfStudent($user->students_id);
            return view('student.home',['scheduleList'=>$student_schedule->get()]);
        }

    }
    

    public function index()
    {
        //
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
