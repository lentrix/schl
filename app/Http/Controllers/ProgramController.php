<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class ProgramController extends Controller
{
    public function index() {

        $programs = null;

        if(isset($_GET['search'])) {
            $programs = Program::where('accronym','like',"%{$_GET['search']}%")
                ->orWhere('name','like',"%{$_GET['search']}%")
                ->orderBy('name')
                ->get();
        }

        if(isset($_GET['dept_id'])) {
            $programs = Program::where('dept_id',$_GET['dept_id'])
                ->orderBy('name')
                ->get();
        }

        return view('programs.index', compact('programs'));
    }

    public function show(Program $program) {

        return view('programs.view', compact('program'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'accronym' => 'required|max:20',
            'name' => 'required',
            'dept_id' => 'required|integer'
        ]);

        $program = Program::create($request->all());

        return redirect("/programs/$program->id");
    }

    public function update(Request $request, Program $program) {
        $this->validate($request, [
            'accronym' => 'required|max:20',
            'name' => 'required',
            'dept_id' => 'required|integer'
        ]);

        $program->update($request->all());

        return redirect("/programs/$program->id");
    }
}
