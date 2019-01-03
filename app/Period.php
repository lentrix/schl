<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public $fillable = ['accronym', 'name', 'start', 'end', 'type'];
}
