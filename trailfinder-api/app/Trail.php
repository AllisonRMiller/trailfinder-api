<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    public function trips(){
        return $this->belongsToMany('App\Trip', 'Trail_Trip');
    }
}
