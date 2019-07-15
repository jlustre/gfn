<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
