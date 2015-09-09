<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Teacher;
use App\User;
use Validator;
use DB;
use Log;
use App\models\Role;

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
	public function index(Request $request)
	{
		if($request->has('search')){
			$teachers = Teacher::searchTeacherList($request->input('search'));

			$searchResult = array(
				'status'	=>	'ok',
				'keyword'	=>	$request->input('search'),
				'count'		=>	$teachers->count(),
			);

			return view('teacher.index',['teachers'=>$teachers->paginate(5)])->with('searchResult', $searchResult);
		}
		else{
			$teachers = Teacher::teacherList();
			return view('teacher.index',['teachers'=>$teachers->paginate(5)]);
		}

		
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
		$validator = Validator::make($request->all(), Teacher::$rules );

		if ($validator->fails()) {

			return redirect('teacher/create')->withErrors($validator);

		} 

		else {   

			$user = new User;

			$user->firstname = $request->firstname;
			$user->lastname = $request->lastname;
			$user->nickname = $request->nickname;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->date_of_birth = $request->date_of_birth;
			$user->save();

			$teacherRole = Role::where('name', '=', 'teacher')->get()->first();
			$user->attachRole($teacherRole);
			

			if($request->hasFile('profile_picture')){
				if($request->file('profile_picture')->isValid()){
					$filename = $user->id.'.'.$request->file('profile_picture')->guessExtension();
					$request->file('profile_picture')->move('uploads/profile_pictures', $filename);
					$user->picture = $filename;
				}
			}

			$teacher = new Teacher;

			$teacher->degrees = $request->degrees;
			$teacher->experience = $request->experience;
			$teacher->institute = $request->institute;
			$teacher->teacher_phone = $request->teacher_phone;
			
			
			$teacher->save();

			$user->teachers_id = $teacher->id;
			$user->save();

			return redirect('teacher');
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
		$teacher = DB::table('users')
		->join('teachers','users.teachers_id', '=', 'teachers.id')
		->select('teachers.id','users.firstname','users.lastname','users.nickname','users.email','users.date_of_birth','teachers.experience','teachers.degrees','teachers.institute','teachers.teacher_phone', 'users.picture')
		->where('teachers.id','=',$id);

		$teacher = $teacher->first();

		return view('teacher.view', ['teacher'=>$teacher]);
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

		$validator = Validator::make($request->all(), Teacher::$ruleswithoutpassword );

		if ($validator->fails()) {

			return redirect('teacher/'.$id.'/edit')->withErrors($validator);

		} 

		else {
			$user  = User::where('teachers_id',$id)->first();

		 // File upload
			if($request->hasFile('profile_picture')){
				if($request->file('profile_picture')->isValid()){
					$filename = $id.'.'.$request->file('profile_picture')->guessExtension();
					$request->file('profile_picture')->move('uploads/profile_pictures', $filename);
					$user->picture = $filename;
				}
			}

			$user->firstname = $request->firstname;
			$user->lastname = $request->lastname;
			$user->nickname = $request->nickname;
			$user->date_of_birth = $request->date_of_birth;

			$user->save();

			$teacher = Teacher::find($id);
			$teacher->degrees = $request->degrees;
			$teacher->experience = $request->experience;
			$teacher->institute = $request->institute;
			$teacher->teacher_phone = $request->teacher_phone;
			
			$teacher->save();

			return  redirect('teacher');
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
		$user = User::where('teachers_id',$id)->first();
		$user = User::find($user->id);
		$user->delete();

		$teacher = Teacher::find($id);
		$teacher->delete();
		
		

		return redirect('teacher');
	}

	public static function  viewDeletedTeacher()
	{
		$teachers = Teacher::deletedList()->get();
		//print_r($teachers );die();
		return view('teacher.deleted',['teachersList'=>$teachers]);
	}

	public function restore(Request $request)
	{

		$teacher = Teacher::withTrashed()
					->where('id',$request->id)
					->restore();

		$user = User::withTrashed()
					->where('teachers_id',$request->id)
					->restore();

		$user = User::where('teachers_id',$request->id)->first();
		$user = User::find($user->id);

		
		
		$teacherRole = Role::where('name', '=', 'teacher')->get()->first();
		$user->attachRole($teacherRole);


		return redirect('teacher');

	}
}
