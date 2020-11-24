<?php

namespace App\Http\Controllers;

use DB;
use App\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matchs=DB::table('matches')
            //->select('matches.*', 'clubs.nomClub as nomClubDomicile', 'club_domiciles.nbBut as nbButDomicile', 'clubs.nomStade as stadeDomicile')
            ->get();
        foreach($matchs as $match){
            $nomEquipeLocale=DB::table('equipes')->select('nom')->where('id', $match->idEquipeLocale)->get()->first();
            $match->nomEquipeLocale=$nomEquipeLocale->nom;
            $nomEquipeVisiteuse=DB::table('equipes')->select('nom')->where('id', $match->idEquipeVisiteuse)->get()->first();
            $match->nomEquipeVisiteuse=$nomEquipeVisiteuse->nom;
        }
        return $matchs;
        //return Match::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Match::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        return $match;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        $match->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        $match->delete();
    }
}
