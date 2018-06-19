<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $table = 'participations';
    protected $fillable = [
        'position',
        'user_id',
        'cup_id'
    ];

    public function position(){
        return $this->belongsTo('App\Position', 'position_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cup(){
        return $this->belongsTo('App\Cup');
    }

    public function character(){
        return $this->belongsTo('App\Character');
    }

    public function vehicle(){
        return $this->belongsTo('App\Vehicle');
    }
}
