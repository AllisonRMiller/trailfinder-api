<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrailTrip extends Model
{
    protected $fillable = ['trail_id','trip_id'];
    public $timestamps = false;
}
