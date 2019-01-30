<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Enrol;

class EnrolController extends Controller
{
    /** show enrols of a particular student */
    public function ofStudent(Student $student) {

    }

    /** view or create enrolment record */
    public function enrol(Student $student) {
        //check if student in enrolled in an active period.
        if($en = $student->activeEnrolment()) {
            return view('enrols.view', ['enrol'=>$en]);
        }else {
            return view('enrols.create', ['student'=>$student]);
        }
    }
}
