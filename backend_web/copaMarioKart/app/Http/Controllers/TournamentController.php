<?php

namespace App\Http\Controllers;

use App\Cup;
use App\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TournamentController extends Controller
{

    private $menu_item = 1;
    private $title_page = 'Torneos';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::orderBy('created_at', 'DESC')->paginate(30);

        return view('tournaments.index')
            ->with('tournaments', $tournaments)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournament = new Tournament();
        $tournament->status = 'Open';
        $tournament->save();

        return redirect()->route('tournaments.show', $tournament);  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        return view('tournaments.show')
            ->with('tournament', $tournament)
            ->with('title_page', 'Torneo #'.$tournament->id)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
