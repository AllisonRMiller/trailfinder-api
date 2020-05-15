<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
     public function user(){
        return $this->belongsTo('App\User');
    }
    public function journey(){
        return $this->belongsTo('App\Journey');
    }
}
