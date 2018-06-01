<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = [
        'name',
        'image'
    ];

    public function participations(){
        return $this->hasMany('App\Participation');
    }
}
