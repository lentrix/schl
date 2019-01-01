<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $fillable = [
        'id','lrn', 'lname', 'fname', 'mname', 'bdate', 'gender', 'phone',
        'barangay', 'town', 'province', 'religion', 'citizenship', 'mother',
        'mphone', 'father', 'fphone', 'pr_address'
    ];

    public $incrementing = false;
    protected $keyType = "string";

    public function fullName() {
        return $this->lname . ", " . $this->fname . " " . substr($this->mname,0,1) . ".";
    }

    public function fullAddress() {
        return $this->barangay . ", " . $this->town . ", " . $this->province;
    }
}
