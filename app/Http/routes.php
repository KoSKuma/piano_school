<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/',function () {
	return view('auth/login');
});

Route::resource('teacher', 'TeacherController');

Route::resource('student', 'StudentController');

Route::resource('schedule', 'ScheduleController');

Route::resource('payment', 'PaymentController');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('calendar',function () {
	return view('calendar.calendar');
});


