<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public $timestamps = false;
      
      public static function insert(Request $request)
	    {
	        // Validate the request...

	        $room = new Room;

	        $room->name = $request->name;
	        $room->location = $request->location;
	        $room->description = $request->description;

	        $room->save();

	        return $room;
	    }
	
}
