<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bus_sold_tickets;
use App\businfo;

class BusTicket extends Controller
{
    //
    public function index(){
        
        $chp=$_GET['id'];

        $bus_sold_tickets=bus_sold_tickets::all()
                                            ->where('checkpyment','=',$chp);
        foreach($bus_sold_tickets as $bus){
            $businfoid=$bus->Bus_id;
        }
        
        
        $price=$_GET['TotalAmount'];
        return view('busticket',[
            'businfo'=>$bus_sold_tickets,
            'price'=>$price
        ]);

    }

}
