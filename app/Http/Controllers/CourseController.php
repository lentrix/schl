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
}
