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

Route::get('sample', function () {
    return view('pages.sample');
});

Route::get('room/add', function () {
    return view('room.add');
});

//Route::post('room/add', 'RoomController@store');
Route::post('room/add', [
	'uses'	=> 'RoomController@store'
]);

Route::get('room/show','RoomController@show' );
Route::get('room/edit/{id}','RoomController@edit');
Route::post('room/update/{id}','RoomController@update');
Route::get('room/destroy/{id}','RoomController@destroy');

Route::resource('teacher', 'TeacherController');

Route::resource('student', 'StudentController');

Route::resource('schedule', 'ScheduleController');


//Route::post('auth/login', 'Auth\AuthController@postLogin');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('sample', function () {
    return view('pages.sample');
});



Route::get('calendar',function () {
	return view('calendar.calendar');
});

Route::get('jquery/test',function(){
		return view('jquery/test');
});




