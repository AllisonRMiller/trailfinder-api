<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['name','user_id'];
}
