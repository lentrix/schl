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

    public function store(Request $request) {
        $this->validate($request, [
            'student_id' => 'required|integer',
            'program_id' => 'required|integer',
            'level_id' => 'required|integer',
            'strand_id' => 'integer',
            'period_id' => 'required|integer',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        $en = Enrol::create([
            'student_id' => $request['student_id'],
            'program_id' => $request['program_id'],
            'level_id' => $request['level_id'],
            'strand_id' => $request['strand_id'],
            'period_id' => $request['period_id'],
            'type' => $request['type'],
            'status' => $request['status']
        ]);

        return redirect('/enrol/' . $en->student_id);
    }

    public function show(Enrol $enrol) {
        return view('enrols.view', compact('enrol'));
    }
}
