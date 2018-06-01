<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';
    protected $fillable = [
        'name',
        'image'
    ];

    public function participations(){
        return $this->hasMany('App\Participation');
    }
}
