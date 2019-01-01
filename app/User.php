<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    public const ROLE_ADMIN = 500;
    public const ROLE_REGISTRAR = 400;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'full_name', 'password', 'active', 'dept'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roleText() {
        switch($this->role) {
            case 500 : return "Administrator";
            case 400 : return "Registrar";
        }
    }

    public function roles() {
        return $this->belongsToMany('App\Role', 'role_user');
    }
}
