<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
     public function users(){
        return $this->belongsTo('App\User');
    }
    public function journeys(){
        return $this->belongsTo('App\Journey');
    }

    public function trails(){
        return $this->belongsToMany('App\Trail', 'Trail_Trip');
    }
}
