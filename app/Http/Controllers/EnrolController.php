<?php

namespace App\Http\Controllers;

use App\Rules\LevelToProgram;
use App\Rules\TrackToProgram;
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
            return redirect('enrols/' . $en->id . '/view');
        }else {
            return redirect('enrols/create/' . $student->id);
        }
    }

    public function create(Student $student) {
        return view('enrols.create', compact('student'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'student_id' => 'required|integer',
            'program_id' => 'required|integer',
            'strand_id' => [new TrackToProgram($request['program_id'])],
            'level_id' => ['required','integer',new LevelToProgram($request['program_id'])],
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

        return redirect('/enrols/' . $en->student_id);
    }

    public function show(Enrol $enrol) {
        if($enrol==null) {
            return redirect('/enrols/create');
        }
        return view('enrols.view', compact('enrol'));
    }

    public function edit(Enrol $enrol) {
        return view('enrols.update', compact('enrol'));
    }

    public function update(Request $request, Enrol $enrol) {
        $this->validate($request, [
            'student_id' => 'required|integer',
            'program_id' => 'required|integer',
            'strand_id' => [new TrackToProgram($request['program_id'])],
            'level_id' => ['required','integer',new LevelToProgram($request['program_id'])],
            'period_id' => 'required|integer',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        $enrol->update([
            'student_id' => $request['student_id'],
            'program_id' => $request['program_id'],
            'level_id' => $request['level_id'],
            'strand_id' => $request['strand_id'],
            'period_id' => $request['period_id'],
            'type' => $request['type'],
            'status' => $request['status']
        ]);

        return redirect('/enrols/' . $enrol->student_id);
    }

    public function addClass(Request $request, Enrol $enrol) {
        $this->validate($request, [
            'class_id' => 'required'
        ]);

        $enClass = \App\EnrolClass::create([
            'class_id' => $request['class_id'],
            'enrol_id' => $enrol->id
        ]);

        return redirect('/enrols/' . $enrol->student->id)->withMessage("Class added.");
    }
}
