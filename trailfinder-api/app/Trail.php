<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    public function trip(){
        return $this->belongsToMany('App\Trip');
    }
}
