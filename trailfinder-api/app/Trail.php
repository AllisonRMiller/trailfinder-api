<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    public function trips(){
        return $this->belongsToMany('App\Trip', 'Trail_Trip');
    }

    protected $fillable = ['name','api_id','stars', 'difficulty'];
}
