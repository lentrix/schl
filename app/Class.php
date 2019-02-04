<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public $tableName = "classes";
    public $fillable = ['course_id', 'period_id', 'teacher_id', 'credit_units', 'pay_units'];

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function period() {
        return $this->belongsTo('App\Period');
    }

    public function teacher() {
        return $this->belongsTo('App\Teacher');
    }

    public function schedules() {
        return $this->hasMany('App\Schedule');
    }

    public function enrolClasses() {
        return $this->hasMany('App\EnrolClass', 'class_id');
    }

    public function getScheduleTextAttribute() {
        if(count($this->schedules)==0) {
            return 'Unscheduled';
        }else {
            $str = "";
            foreach($this->schedules as $sched) {
                $str .= "$sched->start-$sched->end $sched->days " . $sched->room->code . " & ";
            }
            return substr($str, 0, strlen($str)-2);
        }
    }
}
