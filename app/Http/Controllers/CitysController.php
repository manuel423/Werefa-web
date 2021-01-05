<?php

namespace App\Http\Controllers;

use App\citys;
use Illuminate\Http\Request;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $citys=citys::all();

        return view('buspage',[
            'citys'=>$citys,
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
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function show(citys $citys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function edit(citys $citys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citys $citys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\citys  $citys
     * @return \Illuminate\Http\Response
     */
    public function destroy(citys $citys)
    {
        //
    }
}
