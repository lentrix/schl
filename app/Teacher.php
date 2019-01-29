<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teacher extends Model
{
    public $fillable = ['title', 'lname', 'fname', 'mname', 'specialty','dept_id'];

    public function fullName() {
        return $this->lname . ", " . $this->fname . " " . substr($this->mname,0,1) . ".";
    }

    public static function specialties() {
        return DB::table('teachers')
            ->selectRaw('DISTINCT specialty')
            ->orderBy('specialty')
            ->pluck('specialty');
    }

    public function department() {
        return $this->belongsTo('App\Department', 'dept_id');
    }

    public function classes() {
        return $this->hasMany('App\Classes');
    }

    public function getCurrentClassesAttribute() {
        return Classes::where('teacher_id', $this->id)
                ->whereIn('period_id', DB::table('periods')
                    ->whereNotIn('status',['pending','expired'])->pluck('id'))
                ->get();
    }

    public function getFullnameAttribute() {
        return "{$this->lname}, {$this->fname}";
    }

    public static function list() {
        return DB::table('teachers')
            ->select(DB::raw("CONCAT(lname,', ',fname) as 'full_name'"),'id')
            ->orderByRaw('lname, fname')
            ->get()
            ->pluck('full_name','id');
    }
}
