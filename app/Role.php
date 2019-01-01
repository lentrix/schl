<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public $fillable = ['name','display_name', 'description'];

    public static function availableFor(User $user) {
        $role_ids = DB::table('role_user')->where('user_id',$user->id)->pluck('role_id');
        $roles = DB::table('roles')->whereNotIn('id', $role_ids)->get();
        return $roles;
    } 

    public function users() {
        return $this->belongsToMany('App\User', 'role_user');
    }
}
