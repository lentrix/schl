<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = null;

    public function teachers() {
        return $this->hasMany('App\Teacher', 'dept_id');
    }
}
