<?php

namespace App\Http\Controllers;

use App\Character;
use App\Cup;
use App\Participation;
use App\Tournament;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cup $cup, Request $request)
    {
        $userAlreadyExists = Participation::where('cup_id', $cup->id)->where('user_id', $request->user_id)->first();

        $errors= $userAlreadyExists?'El usuario ya esta inscrito en esta copa':null;

        if($errors != null){
            return redirect()->to($this->getRedirectUrl())
                    ->withInput($request->input())
                    ->withErrors($errors, $this->errorBag());
        }

        $character = $this->selectCharacter($cup);

        $participation = new Participation();
        $participation->user_id = $request->user_id;
        $participation->cup_id = $cup->id;
        $participation->character_id = $character->id;
        $participation->save();

        return redirect()->route('cups.show', $cup);
    }

    private function selectCharacter(Cup $cup){
        $character =  Character::inRandomOrder()->first();
        $isFree = Participation::where('cup_id', $cup->id)->where('character_id', $character->id)->first();
        $isFree?$this->selectCharacter($cup):$character;
        return $character;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cup $cup)
    {
        foreach ($request->positions as $key => $position) {
            $c = $cup->participations->where('id', $key)->first();
            $c->position = $position;
            $c->save(); 
        }
        foreach ($request->points as $key => $points) {
            $c = $cup->participations->where('id', $key)->first();
            $c->points = $points;
            $c->save(); 
        }

        $cup->status = 'Closed';
        $cup->save();

        return redirect()->route('tournaments.show', $cup->tournament_id); 
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participation $participation)
    {
        $cup = Cup::find($participation->cup_id);
        $participation->delete();

        return redirect()->route('cups.show', $cup);
    }
}
