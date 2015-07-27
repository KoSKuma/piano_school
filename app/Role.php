<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public static function getRoleByRoleName($role_name)
    {
    	return DB::table('roles')->where('name', $role_name)->first();
    }
}
