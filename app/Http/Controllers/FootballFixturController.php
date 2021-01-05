<?php

namespace App\Http\Controllers;

use App\football_fixtur;
use App\stadium_gates;
use Illuminate\Http\Request;

class FootballFixturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $football_fixtur=football_fixtur::all();

        return view('stadiumpage',[
            'ff'=>$football_fixtur,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\football_fixtur  $football_fixtur
     * @return \Illuminate\Http\Response
     */
    public function show(football_fixtur $football_fixtur)
    {
        //
        $match_id=$_SERVER["QUERY_STRING"];
       $match= $football_fixtur->find($match_id);
       session(['Match_Id' => $match]);

        $gate=stadium_gates::all();

        return view('stadiummatch',[
            'gates'=>$gate,
            'match'=>$match,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\football_fixtur  $football_fixtur
     * @return \Illuminate\Http\Response
     */
    public function edit(football_fixtur $football_fixtur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\football_fixtur  $football_fixtur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, football_fixtur $football_fixtur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\football_fixtur  $football_fixtur
     * @return \Illuminate\Http\Response
     */
    public function destroy(football_fixtur $football_fixtur)
    {
        //
    }
}
