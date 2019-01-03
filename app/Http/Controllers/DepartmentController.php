<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function index() {
        $depts = null;

        if(isset($_GET['search'])) {
            $depts = Department::where('accronym','like',"%{$_GET['search']}%")
                    ->orWhere('name','like',"%{$_GET['search']}%")
                    ->orderBy('name')
                    ->get();
        }

        return view('depts.index', compact('depts'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'accronym' => 'required',
            'name' => 'required'
        ]);

        $dept = Department::create($request->all());

        return redirect("/depts/$dept->id");
    }

    public function show(Department $dept) {
        return view('depts.view', compact('dept'));
    }

    public function update(Request $request, Department $dept) {
        $this->validate($request, [
            'accronym' => 'required',
            'name' => 'required'
        ]);

        $dept->update($request->all());

        session()->flash('info',"$dept->code has beed updated.");

        return redirect("/depts/$dept->id");
    }
}
