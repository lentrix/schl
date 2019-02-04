<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'period_id', 'program_id', 'level_id', 'room_id'];

    public function program() {
        return $this->belongsTo('App\Program', 'program_id');
    }

    public function period() {
        return $this->belongsTo('App\Period', 'period_id');
    }

    public function level() {
        return $this->belongsTo('App\Level', 'level_id');
    }

    public function room() {
        return $this->belongsTo('App\Room', 'room_id');
    }

    public function identityString() {
        return $this->program->accronym . " " . $this->level->code . " " . $this->name;
    }
}
