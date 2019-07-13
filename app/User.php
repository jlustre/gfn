<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor','username','firstname','lastname', 'email', 'password',
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
        return $this->belongsTo('App\Profile');
    }

    public function setPasswordAttribute($password) {
        if(!empty($password)) {
           // $this->attributes['password'] = bcrypt($password);
            $this->attributes['password'] = Hash::make($password);
        }
    }

    public function isAdmin() {
        if($this->role->name== "administrator" && $this->isActive()) {
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
