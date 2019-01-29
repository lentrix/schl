<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public $fillable = ['accronym', 'name', 'start', 'end', 'type'];

    public function classes() {
        return $this->hasMany('App\Classes');
    }

    public static function list() {
        return static::where('status','enrolment')->pluck('name', 'id');
    }
}
