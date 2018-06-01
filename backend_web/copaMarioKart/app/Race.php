<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'races';
    protected $fillable = [
        'cup_id',
        'race_track_id'
    ];

    public function cup(){
        return $this->belongsTo('App\Cup');
    }

    public function raceTrack(){
        return $this->belongsTo('App\RaceTrack');
    }
}
