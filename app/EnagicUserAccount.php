<?php

namespace App;
use App\User;
use App\EnagicProduct;

use Illuminate\Database\Eloquent\Model;

class EnagicUserAccount extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function enagicproduct(){
        return $this->hasOne('App\EnagicProduct');
    }
}
