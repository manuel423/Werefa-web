<?php

namespace App\Http\Controllers;

use App\movies;
use Illuminate\Http\Request;
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type=$_SERVER["QUERY_STRING"];
        $movies =movies::all()
        ->where('Type','=',$type);
        return view('cinemap',[
            'movies' => $movies,
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
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show(movies $movies)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit(movies $movies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movies $movies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy(movies $movies)
    {
        //
    }
}
