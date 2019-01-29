<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function destroy(Request $request) {
        $schedule = \App\Schedule::find($request['schedule_id']);
        $schedule->delete();
        return back()->withMessage('The schedule has been removed.');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'classes_id' => 'required|integer',
            'room_id' => 'required|integer',
            'start' => 'required',
            'end' => 'required',
            'days' => 'required'
        ]);

        $class = \App\Classes::find($request['classes_id']);

        //Check class' period status
        if($class->period->status!=='enrolment') {
            return back()->withError('This class does not belong within a period of enrolment.');
        }

        //check conflict with other classes based on start, end, & room_id
        if($conflict = Schedule::checkClassConflict($request['start'], $request['end'], $request['days'], $request['room_id'], $class->period_id)) {
            return back()->withError("The schedule is in conflict with Class " 
                . $conflict->class->course->code . " " . $conflict->class->scheduleText)->withInput();
        }

        //check for conflict with teacher assigned Schedule::checkTeacherConflict()
        if($conflict=Schedule::checkTeacherConflict($request['start'], $request['end'], $request['days'], $class->teacher_id)) {
            return back()->withError("The schedule is in conflict with Teacher " 
            . $conflict->teacher->fullname . " on class " . $conflict->course->code 
            . " " . $conflict->scheduleText)->withInput();
        }
        
        //check for conflict with current class Schedule::checkSelfConflict

        \App\Schedule::create($request->all());

        return redirect("/classes/$class->id");
    }
}
