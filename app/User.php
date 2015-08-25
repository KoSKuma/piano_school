<?php

namespace App;

use DB;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'nickname','email','date_of_birth'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function createUser(Request $request){

        $user = new User;

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->date_of_birth = $request->date_of_birth;

        $user->save();

        return $user;
    }

}
