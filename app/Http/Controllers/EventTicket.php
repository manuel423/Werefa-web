<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event_sold_ticket;

class EventTicket extends Controller
{
    //
    public function index(){
        
        $chp=$_GET['id'];
        $money=$_GET['TotalAmount'];
        $event_sold_ticket=event_sold_ticket::all()
                                            ->where('checkpyment','=',$chp);
        
        return view('eventticket',[
            'eventinfo'=>$event_sold_ticket,
            'money'=>$money,
        ]);

    }
}
 