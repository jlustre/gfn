<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
