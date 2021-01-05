<?php

namespace App\Http\Controllers;

use App\businfo;
use App\bus_sold_tickets;
use App\seatmap;
use Illuminate\Http\Request;

class BusinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(isset($_POST['destination'])){


            $result2='
                    <h4	align="center">Result</h4>
                        <h5>No	bus	found!!</h5>
            ';
					
            $destination=$_POST['destination'];
            $departure=$_POST['departure'];
            $date=$_POST['Date'];
            $responce=businfo::all()
                                    ->where('From','=',$departure)
                                    ->where('To','=',$destination)
                                    ->where('Date','=',$date);
                                    
                //dd($responce->Date);
                 if($responce->count()>0){
                    return view('avilablebus',[
                        'responces'=>$responce,
                        'from'=> $_POST['departure'],
                        'to'=> $_POST['destination'],
                        'date'=> $_POST['Date'],
                    ]);
                 }else{
            
                        return response($result2);
                    
                 }
            }
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
     * @param  \App\businfo  $businfo
     * @return \Illuminate\Http\Response
     */
    public function show(businfo $businfo)
    {

        $businfo_id=$_SERVER["QUERY_STRING"];
       $bus= $businfo->find($businfo_id);
       session(['Bus_Name' => $bus->BusName]);
       session(['Bus_NO' => $bus->Bus_num]);
       session(['From' => $bus->From]);
       session(['To' => $bus->To]);
       session(['Businfo_id' => $businfo_id]);
       session(['TakeOfTime' => $bus->TakeofTime]);
       session(['Date'  => $bus->Date]);
       session(['Bus_Price' => $bus->Price]);
       $soldSeat= bus_sold_tickets::all()
                    ->where('Bus_Name','=',$bus->BusName)
                    ->where('Bus_No','=',$bus->Bus_num)
                    ->where('From','=',$bus->From)
                    ->where('To','=',$bus->To);
                    
        return view('bus_seat_mapss',[
            'soldSeats'=>$soldSeat,
            'businfo'=>$bus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\businfo  $businfo
     * @return \Illuminate\Http\Response
     */
    public function edit(businfo $businfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\businfo  $businfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, businfo $businfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\businfo  $businfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(businfo $businfo)
    {
        //
    }
}
