<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournaments';
    protected $fillable = [
        'status'
    ];

    public function cups(){
        return $this->hasMany('App\Cup');
    }
}
