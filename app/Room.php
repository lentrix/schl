<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $fillable = ['code','name','building','floor','capacity'];
}
