<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Student;
use App\User;
use Validator;
use DB;
use Log;
use App\models\Role;
use App\models\Permission;

class PermissionInitializer extends Controller
{
	public function initializePermissions(){
		//
		// Create roles
		//
		
		$admin = new Role();
		$admin->name			=	"admin";
		$admin->display_name	=	"Administrator";
		$admin->description		=	"System administrator: Admin is allowed to manage everything in the system.";
		$admin->save();

		$teacher = new Role();
		$teacher->name			=	"teacher";
		$teacher->display_name	=	"Teacher";
		$teacher->description	=	"Teacher is allowed to view one's own class, schedule, and confirm that a class has been tought.";
		$teacher->save();

		$student = new Role();
		$student->name 			= 	"student";
		$student->display_name 	=	"Student";
		$student->description 	= 	"Student is allowed to view one's own class, schedule, and payment history";
		$student->save();


		//
		// Create permissions
		//

		// Teacher

		$createTeacher = new Permission();
		$createTeacher->name 			= 	"create-teacher";
		$createTeacher->display_name 	=	"Create new Teachers";
		$createTeacher->description 	= 	"Allow a user to create a new teacher";
		$createTeacher->save();

		$viewTeacher = new Permission();
		$viewTeacher->name 			=	"view-teacher";
		$viewTeacher->display_name 	= 	"View Teachers";
		$viewTeacher->description 	=	"Allow a user to view existing teachers";
		$viewTeacher->save();

		$editTeacher = new Permission();
		$editTeacher->name 			=	"edit-teacher";
		$editTeacher->display_name 	= 	"Edit Teachers";
		$editTeacher->description 	= 	"Allow a user to edit existing teachers";
		$editTeacher->save();

		$deleteTeacher = new Permission();
		$deleteTeacher->name 			= 	"delete-teacher";
		$deleteTeacher->display_name	= 	"Delete Teachers";
		$deleteTeacher->description 	=	"Allow a user to delete existing teachers";
		$deleteTeacher->save();


		// Student

		$createStudent = new Permission();
		$createStudent->name = "create-student";
		$createStudent->save();

		$viewStudent = new Permission();
		$viewStudent->name = "view-student";
		$viewStudent->save();

		$editStudent = new Permission();
		$editStudent->name = "edit-student";
		$editStudent->save();

		$deleteStudent = new Permission();
		$deleteStudent->name = "delete-student";
		$deleteStudent->save();

		// Schedule

		$createSchedule = new Permission();
		$createSchedule->name = "create-schedule";
		$createSchedule->save();

		$viewSchedule = new Permission();
		$viewSchedule->name = "view-schedule";
		$viewSchedule->save();

		$editSchedule = new Permission();
		$editSchedule->name = "edit-schedule";
		$editSchedule->save();

		$deleteSchedule = new Permission();
		$deleteSchedule->name = "delete-schedule";
		$deleteSchedule->save();

		// Confirm class

		$confirmTaughtClass = new Permission();
		$confirmTaughtClass->name = "confirm-taught-class";
		$confirmTaughtClass->save();

		// Payment

		$createPayment = new Permission();
		$createPayment->name = "create-payment";
		$createPayment->save();

		$viewPayment = new Permission();
		$viewPayment->name = "view-payment";
		$viewPayment->save();

		$adjustPayment = new Permission();
		$adjustPayment->name = "adjust-payment";
		$adjustPayment->save();

		// Calendar

		$viewCalendar = new Permission();
		$viewCalendar->name = "view-calendar";
		$viewCalendar->save();

		//
		// Attach roles with permissions
		//

		// teacher related permissions

		$admin->attachPermission($createTeacher);
		$admin->attachPermission($viewTeacher);
		$admin->attachPermission($editTeacher);
		$admin->attachPermission($deleteTeacher);

		$teacher->attachPermission($viewTeacher);
		$student->attachPermission($viewTeacher);

		// student related permissions

		$admin->attachPermission($createStudent);
		$admin->attachPermission($viewStudent);
		$admin->attachPermission($editStudent);
		$admin->attachPermission($deleteStudent);

		$teacher->attachPermission($viewStudent);
		$student->attachPermission($viewStudent);

		// schedule related permissions

		$admin->attachPermission($createSchedule);
		$admin->attachPermission($viewSchedule);
		$admin->attachPermission($editSchedule);
		$admin->attachPermission($deleteSchedule);

		$teacher->attachPermission($viewSchedule);
		$student->attachPermission($viewSchedule);

		// permission to confirm that a class was taught

		$admin->attachPermission($confirmTaughtClass);

		// payment related permission

		$admin->attachPermission($createPayment);
		$admin->attachPermission($viewPayment);
		$admin->attachPermission($adjustPayment);

		// calendar related permission

		$admin->attachPermission($viewCalendar);


		//$user->attachRole($admin);
	}
}