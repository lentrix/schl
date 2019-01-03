<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $fillable = ['code','description','units','academic','program_id'];

    public function program() {
        return $this->belongsTo('App\Program');
    }

    public function programName() {
        return $this->program?$this->program->accronym:'none';
    }

    public function deptName() {
        return $this->program?$this->program->department->accronym:'none';
    }

    public function isAcademic() {
        return $this->academic?'Academic':'Non-academic';
    }
}
