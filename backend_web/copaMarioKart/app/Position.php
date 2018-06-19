<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable = [
        'points'
    ];

    public function participations(){
        return $this->hasMany('App\Participation');
    }
}
