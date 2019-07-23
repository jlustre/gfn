<?php

namespace App;
use App\EnagicUserAccount;

use Illuminate\Database\Eloquent\Model;

class EnagicProduct extends Model
{
    public function enagicuseraccount(){
        return $this->belongsToMany('App\EnagicUserAccount');
    }
}
