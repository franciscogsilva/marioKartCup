<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    protected $table = 'cups';
    protected $fillable = [
        'status',
        'tournament_id'
    ];

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }

    public function participations(){
        return $this->hasMany('App\Participation');
    }

    public function races(){
        return $this->hasMany('App\Race');
    }
}
