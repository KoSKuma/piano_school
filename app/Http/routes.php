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

Route::get('sample', function () {
    return view('pages.sample');
});

// Authentication routes...
/*Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('home', [
	'middleware'	=>	'auth',
	'uses'	=>	'UserController@home',
]);

Route::get('home/student', [
	'middleware'	=>	'auth',
	'uses'	=>	'UserController@studentHome',
]);

Route::get('home/teacher', [
	'middleware'	=>	'auth',
	'uses'	=>	'UserController@teacherHome',
]);

*/