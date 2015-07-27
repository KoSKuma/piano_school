<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function home()
    {
        $user = Auth::user();
        return view('home', ['user' => User::findOrFail($user->id)]);
    }

    public function studentHome()
    {
        $user = Auth::user();
        if(!$user->is('Student'))
        {
            return redirect('/')->with('status', 'Only student can access this page');
        }
        return view('user.student', ['user' => User::findOrFail($user->id)]);
    }

    public function teacherHome()
    {
        $user = Auth::user();
        return view('user.teacher', ['user' => User::findOrFail($user->id)]);
    }
}

?>