<?php

namespace App\Http\Controllers;

use App\Cup;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;

class CupController extends Controller
{

    private $menu_item = 1;
    private $title_page = 'Copas';
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
    public function create(Tournament $tournament)
    {   
        $cup = new Cup();
        $cup->status = 'Open';
        $cup->tournament_id = $tournament->id;
        $cup->save();

        return redirect()->route('cups.show', $cup);

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
    public function show(Cup $cup)
    {
        $users = User::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('cups.show')
            ->with('cup', $cup)
            ->with('users', $users)
            ->with('title_page', 'Torneo #'.$cup->tournament_id.' - Copa #'.$cup->id)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function edit(Cup $cup)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cup  $cup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cup $cup)
    {
        //
    }
}
