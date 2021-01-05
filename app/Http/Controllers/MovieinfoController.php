<?php

namespace App\Http\Controllers;

use App\movieinfo;
use App\cinemaplace;
use Illuminate\Http\Request;
use App\cinema_sold_tickets;
use App\seataddedbycinema;

class MovieinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=explode(',',$_POST['time']);
        $time=$all[0];
        $screen=$all[1];
        $day=$all[2];

        session(['Day' => $day]);
        session(['Time' => $time]);
        $soald_seats= cinema_sold_tickets::all()
                ->where('Movie_Name','=',session()->get('MovieName'))
                ->where('Cinema_Place','=',session()->get('CinemaPlace'))
                ->where('Day','=',$day)
                ->where('Time','=',$time);
        $cinema_soald= seataddedbycinema::all()
                                         ->where('Movie_Name','=',session()->get('MovieName'))
                                        ->where('Cinema_Place','=',session()->get('CinemaPlace'))
                                        ->where('Day','=',$day)
                                        ->where('Time','=',$time);
        $cinemaplace=cinemaplace::all()
                                ->where('Name','=',session()->get('CinemaPlace'));
        return view('cinemamap',[
            'soldSeats' => $soald_seats,
            'cinemasoald' => $cinema_soald,
            'infos' => $cinemaplace,
            'screen' => $screen,
            'cplace' => session()->get('CinemaPlace'),
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
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function show(movieinfo $movieinfo)
    {
        //
        if(isset($_POST['decision'])){
				
            if($_POST['decision']!="choose"){
                
                $cinemaName=$_POST['decision'];
               
                session(['CinemaPlace' => $cinemaName]);
                $movie=session()->get('MovieName');
                
                $cinemaplace=cinemaplace::all()
                                        ->where('Name','=',$cinemaName);
                
                $movieinfo=movieinfo::all()
                                    ->where('cinema','=',$cinemaName)
                                    ->where('Movie','=',$movie);
                
                 if($movieinfo->count()>0){
                     return view('movieinfo',[
                         'price'=>$cinemaplace,
                         'movieinfos'=>$movieinfo,
                         'cinemaPlace'=>$cinemaName
                     ]);
                 }else{
                     echo "This cinema place don't have this movie!!";
                 }
             }else{
                 echo "You didn't choose cinema place!!";
             }
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(movieinfo $movieinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        //
        //$schedule= new Object();
        $cinema=$_POST['cinema'];
        $movies=$_POST['movie'];
        $schedule=json_encode($_POST['schedule']);
        $movinfo= new movieinfo;

        $movinfo->cinema=$cinema;
        $movinfo->Movie=$movies;
        $movinfo->Schedule=$schedule;
        $movinfo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\movieinfo  $movieinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(movieinfo $movieinfo)
    {
        //
    }
}
