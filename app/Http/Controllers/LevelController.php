<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    public $fillable = ['code', 'name', 'category'];
    public $timestamps = null;

    public function index() {
        $levels = null;

        if(isset($_GET['search'])) {
            $levels = Level::where('code','like',"%{$_GET['search']}%")
                    ->orWhere('name','like',"%{$_GET['search']}%")
                    ->get();
        }

        return view('admin.levels.index', compact('levels'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|max:10',
            'name' => 'required',
            'category' => 'required|max:15'
        ]);

        $level = Level::create($request->all());

        return redirect("/levels/$level->id");
    }

    public function show(Request $request, Level $level) {
        return view('admin.levels.view', compact('level'));
    }

    public function update(Request $request, Level $level) {
        $this->validate($request, [
            'code' => 'required|max:10',
            'name' => 'required',
            'category' => 'required|max:15'
        ]);

        $level->update($request->all());

        session()->flash('info', "$level->name has been updated.");

        return redirect("/levels/$level->id");
    }
}
