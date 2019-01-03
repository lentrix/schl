<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    public function index() {
        $rooms = null;

        if(isset($_GET['search'])) {
            $rooms = Room::where('code','like',"%{$_GET['search']}%")
                    ->orWhere('name','like',"%{$_GET['search']}%")
                    ->orderBy('name')
                    ->get();
        }

        if(isset($_GET['building'])){
            $rooms = Room::where('building', $_GET['building'])
                    ->orderBy('code')
                    ->get();
        }

        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room) {
        return view('rooms.view', compact('room'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|max:30',
            'name' => 'required',
            'floor' => 'integer',
            'capacity' => 'required|integer'
        ]);

        $room = Room::create($request->all());

        return redirect("/rooms/$room->id");
    }

    public function update(Request $request, Room $room) {
        $this->validate($request, [
            'code' => 'required|max:30',
            'name' => 'required',
            'floor' => 'integer',
            'capacity' => 'required|integer'
        ]);

        $room->update($request->all());

        session()->flash('info', "$room->name has been updated.");

        return redirect("/rooms/$room->id");
    }
}
