<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stadium_sold_tickets;

class StadiumTicket extends Controller
{
    // 
    public function index(){
        
        $chp=$_GET['id'];;
        $stadium_sold_tickets=stadium_sold_tickets::all()
                                            ->where('checkpyment','=',$chp);
        
        return view('stadiumticket',[
            'stadiuminfo'=>$stadium_sold_tickets,
        ]);

    }
}
