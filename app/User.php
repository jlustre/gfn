<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Profile;
use App\Todo;
use App\Prospect;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor','username','firstname','lastname', 'email', 'password', 'role_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function profile(){
        return $this->hasOne('App\Profile');
    }

    public function todos(){
        return $this->hasMany('App\Todo');
    }

    public function enagicusersaccount(){
        return $this->hasOne('App\EnagicUsersAccount');
    }

    public function prospects(){
        return $this->hasMany('App\Prospect');
    }

    public function setPasswordAttribute($password) {
        if(!empty($password)) {
           // $this->attributes['password'] = bcrypt($password);
            $this->attributes['password'] = Hash::make($password);
        }
    }

    public function isAdmin() {
        if($this->role->name== "administrator") {
            return true;
        }
        return false;
    }

    public function isActive() {
        if($this->is_active == 1) {
            return true;
        }
        return false;
    }
}
