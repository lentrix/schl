<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = null;

    public $fillable = ['accronym', 'name'];

    public function teachers() {
        return $this->hasMany('App\Teacher', 'dept_id');
    }

    public function programs() {
        return $this->hasMany('App\Program', 'dept_id');
    }
}
