<?php

namespace App\Http\Controllers;

use App\cinemaplace;
use App\movies;
use Illuminate\Http\Request;

class CinemaplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id=$_SERVER["QUERY_STRING"];
        $movieinfo=movies::find($id);

        session(['MovieName' => $movieinfo->MovieName]);
        $cinemas=cinemaplace::all();
        return view('movie',[
            'movie'=> $movieinfo,
            'cinemas'=> $cinemas,
        ]
        );
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
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function show(cinemaplace $cinemaplace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function edit(cinemaplace $cinemaplace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cinemaplace $cinemaplace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cinemaplace  $cinemaplace
     * @return \Illuminate\Http\Response
     */
    public function destroy(cinemaplace $cinemaplace)
    {
        //
    }
}
