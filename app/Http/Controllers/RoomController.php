<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Room;

class RoomController extends Controller
{
    
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
       /* $v = $this->validate($request, [
        ['name' => 'required|unique:posts|max:255'],
         ['location' => 'required']
        ]);
        if ($v->fails())
            {
                return redirect()->back()->withErrors($v);
            }
        //echo $request->input("name");*/
        $room = Room::insert($request);
       // redirectToShow();
       return redirect('room/show');

    }

    
    public function show()
    {
        $room = Room::all();
        
        return view('room.show',['roomview'=>$room]);

      
    }

 
    public function edit($id)
    {
        $room = Room::find($id);

        return view('room.edit',['room'=>$room]);
    }

    
    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $room->name = $request->name;
        $room->location = $request->location;
        $room->description= $request->description;
        $room->save();
        return redirect('room/show');
        
    }

   
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete(); 
        return redirect('room/show');
    }

}

