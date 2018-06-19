<?php

namespace App;

use App\Tournament;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function participations(){
        return $this->hasMany('App\Participation');
    }

    public static function getUserByTournament(Tournament $tournament){
        $users = User::whereHas('participations', function($participations) use($tournament){
            $participations->whereHas('cup', function($cup) use($tournament){
                $cup->where('tournament_id', $tournament->id);
            });
        })->get();

        return $users;
    }

    public function getTotalPointsInTournament(Tournament $tournament){
        
        $participations = $this->participations()->whereHas('cup', function($cup) use($tournament){
                $cup->where('tournament_id', $tournament->id);
            })->get();
        
        $points =  0;

        foreach ($participations as $par) {
            $points = $points + $par->position->points;
        }

        return $points;
    }
}
