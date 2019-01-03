<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index() {
        $courses = null;

        if(isset($_GET['search'])){
            $courses = Course::where('code','like',"%{$_GET['search']}%")
                    ->orWhere('description','like',"%{$_GET['search']}%")
                    ->orderBy('description')
                    ->get();
        }

        return view('courses.index', compact('courses'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|max:25',
            'description' => 'required',
            'units' => 'required|numeric',
            'academic' => 'boolean',
            'program_id' => 'integer'
        ]);
        
        $course = Course::create($request->all());

        return redirect("/courses/$course->id");
    }

    public function show(Course $course) {
        return view('courses.view', compact('course'));
    }

    public function update(Course $course, Request $request) {
        $this->validate($request, [
            'code' => 'required|max:25',
            'description' => 'required',
            'units' => 'required|numeric',
            'academic' => 'boolean',
            'program_id' => 'integer'
        ]);

        $course->update($request->all());

        session()->flash('info',"Course $course->code has been updated.");

        return redirect("/courses/$course->id");
    }
}
