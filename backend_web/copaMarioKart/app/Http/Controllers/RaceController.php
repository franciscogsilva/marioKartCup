<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tournament $tournament, Cup $cup)
    {   
        $race = new Race();
        $race->status = 'Open';
        $race->cup_id = $cup->id;
        $race->save();

        return redirect()->route('races.show', [$tournament, $cup, $race]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament, Cup $cup, Race $race)
    {
        return view('races.show')
            ->with('tournament', $tournament)
            ->with('cup', $cup)
            ->with('race', $race)
            ->with('title_page', 'Torneo #'.$tournament->id.' - Copa #'.$cup->id.' - Carrera #'.$race->id)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        //
    }
}
