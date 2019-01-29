<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    public $fillable = ['classes_id', 'room_id', 'start', 'end', 'days'];

    public function class() {
        return $this->belongsTo('App\Classes', 'classes_id');
    }

    public function room() {
        return $this->belongsTo('App\Room');
    }

    public static function checkClassConflict($start, $end, $days, $room_id) {
        $startPlus = Carbon::parse($start)->addMinute()->toTimeString();
        $endMinus = Carbon::parse($end)->subMinute()->toTimeString();
        foreach(explode(',', $days) as $day) {
            $qry = static::whereRaw("start between ? AND ? AND end BETWEEN ? AND ?", [$start,$endMinus,$startPlus,$end])
                ->whereHas('class', function($query){
                    $query->whereIn('period_id', DB::table('periods')->where('status','enrolment')->pluck('id'));
                })
                ->where('room_id', $room_id)
                ->where('days','like', "%$day%")
                ->first();

            if($qry) return $qry;
        }
        return null;
    }

    public static function checkTeacherConflict($start, $end, $days, $teacher_id) {
        $startPlus = Carbon::parse($start)->addMinute()->toTimeString();
        $endMinus = Carbon::parse($end)->subMinute()->toTimeString();
        foreach(explode(',', $days) as $day) {
            $qry = Classes::where('teacher_id',$teacher_id)
                    ->whereHas('period', function($query) { 
                        $query->whereNotIn('status',['pending','expired']); 
                    })->whereHas('schedules', function($query) use ($start, $startPlus, $end, $endMinus, $day) { 
                        $query->where('days','like',"%$day%")
                              ->whereBetween('start', [$start,$endMinus])
                              ->orWhereBetween('end',[$startPlus,$end]);
                    })->with('course')->with('schedules')
                    ->first();

            if($qry) return $qry;
        }

        return null;
    }

    //public static function checkSelfConflict($start, $end, $class_id)
}
