<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cinema_sold_tickets;
use App\cinemareport;
use App\reservemovie;

class MovieTicket extends Controller
{
    //
    public function index(){
        
        $chp=$_GET['id'];
       $reserve_tickets=reservemovie::all()
                                    ->where('checkpyment','=',$chp);
       
       $cinema_sold_tickets = new cinema_sold_tickets;
       $cinemareport=new cinemareport;
       $id=0;
       foreach($reserve_tickets as $reserve_ticket){

       $cinema_sold_tickets->Movie_Name = $reserve_ticket->Movie_Name;
       $cinema_sold_tickets->Cinema_Place = $reserve_ticket->Cinema_Place;
       $cinema_sold_tickets->Day = $reserve_ticket->Day;
       $cinema_sold_tickets->Time = $reserve_ticket->Time;
       $cinema_sold_tickets->Ticket_No = $reserve_ticket->Ticket_No;
       $cinema_sold_tickets->checkpyment = $reserve_ticket->checkpyment;
       $cinema_sold_tickets->Seat_id = $reserve_ticket->Seat_id;
       $cinema_sold_tickets->Seat_No = $reserve_ticket->Seat_No;
       $cinema_sold_tickets->amount = $reserve_ticket->amount;
       $cinema_sold_tickets->save();
       
        $cinemareport->Movie_Name = $reserve_ticket->Movie_Name;
        $cinemareport->Cinema_Place = $reserve_ticket->Cinema_Place;
        $cinemareport->Day = $reserve_ticket->Day;
        $cinemareport->Time = $reserve_ticket->Time;
        $cinemareport->Ticket_No = $reserve_ticket->Ticket_No;
        $cinemareport->amount = $reserve_ticket->amount;
        $cinemareport->save();
        
       }

        
        
        $dbre =new reservemovie;
        $dbre->where('checkpyment','=',$chp)->delete();
        
        $sold_tickets=cinema_sold_tickets::all()
                                        ->where('checkpyment','=',$chp);
        

        $price=$_GET['TotalAmount'];
        return view('movieticket',[
            'movieinfo'=>$sold_tickets,
            'price'=>$price
        ]);

    }
} 
