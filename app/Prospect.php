<?php

namespace App;
use App\Prospect;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    public function user(){
        return $this->belongsTo('App\Prospect');
    }
}
