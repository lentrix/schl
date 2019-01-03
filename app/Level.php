<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $fillable = ['code', 'name', 'category'];
    public $timestamps = null;
}
