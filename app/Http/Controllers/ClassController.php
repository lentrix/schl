<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Classes;
use App\Rules\CheckStartTime;

class ClassController extends Controller
{
    public function index() {
        $classes = null;

        if(isset($_GET['search'])) {
            $classes = Classes::with(['course','teacher'])->whereHas('course', function($query){
                $query->where('code','like', "%{$_GET['search']}%")
                ->orWhere('description','like', "%{$_GET['search']}%");
            })->whereHas('period', function($query) {
                $query->where('status', 'enrolment');
            })
            ->get();
        }

        return view('classes.index', compact('classes'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'course_id' => 'required|integer',
            'period_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'credit_units' => 'required|numeric',
            'pay_units' => 'required|numeric',
        ]);

        $class = Classes::create($request->all());

        return redirect("/classes/$class->id");
    }

    public function update(Request $request, Classes $class) {
        $this->validate($request, [
            'course_id' => 'required|integer',
            'period_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'credit_units' => 'required|numeric',
            'pay_units' => 'required|numeric',
        ]);

        $class->update($request->all());

        session()->flash('info', "The class $class->id has been updated.");

        return redirect("/classes/$class->id");
    }

    public function show(Classes $class) {
        return view('classes.view', compact('class'));
    }
}
