<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceTrack extends Model
{
    protected $table = 'race_tracks';
    protected $fillable = [
        'name'
    ];

    public function races(){
        return $this->hasMany('App\Race');
    }
}
