<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YenePay\Models\CheckoutOptions;
use YenePay\Models\CheckoutItem;
use YenePay\CheckoutHelper;
use App\bus_sold_tickets;
use App\businfo;
use App\reserve_tickets;
use App\stadium_sold_tickets;
use App\event_sold_ticket;
use App\stadiumreport;
use App\eventreport;
use App\cinemareport;
use App\busreport;
use App\stadium_gates;
use App\football_fixtur;
use App\events;
use App\reservemovie;
use App\seatmap;
use Illuminate\Support\Facades\Hash;

class PaymentProcessForAll extends Controller
{
    //
    public function store(Request $request){
            $useSandbox = true; // set this to false if you are on production environment
            $sellerCode = '0605';
        $serviceType=$_SERVER["QUERY_STRING"];
       $cancelUrl = "https://werefa.biz/paymentcanceled"; //"YOUR_CANCEL_URL";
       //$ipnUrl = "https://localhost:81/sampleshop/ipn.php"; //"YOUR_IPN_URL";
   if($serviceType=='bus'){
       
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $seats=$_POST['Selected_Seat'];
        $seat_id=$_POST['Seat_id']; 
       $price=$request->session()->get('Bus_Price');
       $businfoid=$request->session()->get('Businfo_id');
       $qun=$_POST['quantity'];
       $itemName='Bus Ticket';

       $bus=businfo::find($businfoid);
       $avseat=$bus->avilablseat;
       $avseat-=$qun;

       $bus->avilablseat=$avseat;
       $bus->save();

       $bus_sold_ticket = new bus_sold_tickets;
       $busreport= new busreport;
       $Bus_Ticket_No="WBT_".$bus_sold_ticket->count();
       $en_busticket=Hash::make($Bus_Ticket_No);
       $chp="userid".$bus_sold_ticket->count();
       
       $bus_sold_ticket->Bus_Name = $request->session()->get('Bus_Name');
       $bus_sold_ticket->Bus_No = $request->session()->get('Bus_NO');
       $bus_sold_ticket->Bus_id = $businfoid;
       $bus_sold_ticket->From = $request->session()->get('From');
       $bus_sold_ticket->To = $request->session()->get('To');
       $bus_sold_ticket->Time = $request->session()->get('TakeOfTime');
       $bus_sold_ticket->Date = $request->session()->get('Date');
       $bus_sold_ticket->Ticket_No = $en_busticket;
       $bus_sold_ticket->checkpyment = $chp;
       $bus_sold_ticket->Name = $name;
       $bus_sold_ticket->Phone = $phone;
       $bus_sold_ticket->Seat_id = $seat_id;
       $bus_sold_ticket->Seat_No = $seats;
       $bus_sold_ticket->amount = $qun;
       $bus_sold_ticket->save();

       $busreport->Bus_Name = $request->session()->get('Bus_Name');
       $busreport->Bus_No = $request->session()->get('Bus_NO');
       $busreport->From = $request->session()->get('From');
       $busreport->To = $request->session()->get('To');
       $busreport->Time = $request->session()->get('TakeOfTime');
       $busreport->Date = $request->session()->get('Date');
       $busreport->Name = $name;
       $busreport->Phone = $phone;
       $busreport->save();

       $successUrl = "https://werefa.biz/busticket?id=".$chp; //"YOUR_SUCCESS_URL";
      
       

       $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
       $checkoutOptions -> setSuccessUrl($successUrl);
       $checkoutOptions -> setCancelUrl($cancelUrl);
       //$checkoutOptions -> setIPNUrl($ipnUrl);
   
       $checkoutOrderItem = new CheckoutItem($itemName, $price,  $qun);
       $checkoutOrderItem  -> setHandlingFee(4);
       $checkoutHelper = new CheckoutHelper();
       $checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
   
      echo $checkoutUrl;
   }else if($serviceType=='movie'){

    $day=session()->get('Day');
    $time=session()->get('Time');
    $seats=$_POST['Selected_Seat'];
    $seat_id=$_POST['Seat_id']; 
    $price=$request->session()->get('price');
    $qun=$_POST['quantity'];
    $itemName='Movie Ticket';
    $reserve_tickets = new reservemovie();
    $num= new cinemareport();
    
    $Movei_Ticket_No="WMT_".$num->count();
    $en_movieticket=Hash::make($Movei_Ticket_No);
    $chp="userid".$num->count();
    $successUrl = "https://werefa.biz/movieticket?id=".$chp;

    $reserve_tickets->Movie_Name = $request->session()->get('MovieName');
    $reserve_tickets->Cinema_Place = $request->session()->get('CinemaPlace');
    $reserve_tickets->Day = $day;
    $reserve_tickets->Time = $time;
    $reserve_tickets->Ticket_No = $en_movieticket;
    $reserve_tickets->checkpyment = $chp;
    $reserve_tickets->Seat_id = $seat_id;
    $reserve_tickets->Seat_No = $seats;
    $reserve_tickets->amount = $qun;
    $reserve_tickets->save();


    $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
    $checkoutOptions -> setSuccessUrl($successUrl);
    $checkoutOptions -> setCancelUrl($cancelUrl);
    //$checkoutOptions -> setIPNUrl($ipnUrl);

    $checkoutOrderItem = new CheckoutItem($itemName, $price,  $qun);
    $checkoutOrderItem  -> setHandlingFee(4);
    $checkoutHelper = new CheckoutHelper();
    $checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);

    echo $checkoutUrl;

   }else if($serviceType=='stadium'){

       $matchid=$request->session()->get('Match_Id');
       $stadsecid=$_POST['Stadium_Secsion'];
       $football_fixtur=football_fixtur::find($matchid);
       $gate=stadium_gates::find($stadsecid);

       $stadium_sold_tickets=new stadium_sold_tickets;
       $stadiumreport=new stadiumreport;
       
       $Stadium_Ticket_No="WST_".$stadium_sold_tickets->count();
       $en_stadticket=Hash::make($Stadium_Ticket_No);
       $chp="userid".$stadium_sold_tickets->count();
       $successUrl = "https://werefa.biz/stadiumticket?id=".$chp;
       $stadium_sold_tickets->checkpyment = $chp;
       foreach($football_fixtur as $f){
           $stadium_sold_tickets->Home_Team = $f->HomewTeam;
           $stadium_sold_tickets->Away_Team = $f->AwayTeam;
           $stadium_sold_tickets->Stadium_Name = $f->Stadium_Name;
           $stadium_sold_tickets->Time = $f->Time;
           $stadium_sold_tickets->Day = $f->Date;
       }
       $stadium_sold_tickets->Stadium_Section = $gate->Gate_Name;
       $stadium_sold_tickets->Ticket_No = $en_stadticket;
       $stadium_sold_tickets->save();

       foreach($football_fixtur as $f){
           $stadiumreport->Home_Team = $f->HomewTeam;
           $stadiumreport->Away_Team = $f->AwayTeam;
           $stadiumreport->Stadium_Name = $f->Stadium_Name;
           $stadiumreport->Time = $f->Time;
           $stadiumreport->Day = $f->Date;
       }
       $stadiumreport->Stadium_Section = $gate->Gate_Name;
       $stadiumreport->Ticket_No = $en_stadticket;
       $stadiumreport->save();
    
       $price=$gate->Price;
       $qun=1;
       $itemName='Stadium Ticket';
       
       $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
       $checkoutOptions -> setSuccessUrl($successUrl);
       $checkoutOptions -> setCancelUrl($cancelUrl);
       //$checkoutOptions -> setIPNUrl($ipnUrl);
   
       $checkoutOrderItem = new CheckoutItem($itemName, $price,  $qun);
       $checkoutOrderItem  -> setHandlingFee(4);
       $checkoutHelper = new CheckoutHelper();
       $checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
   
       header("Location: " . $checkoutUrl); 

   }else if($serviceType=='event'){

    $eventtype=$_POST['eventtype'];
    $spot=$eventtype.'_am';
    $envent_name=$request->session()->get('Event');
    $event=events::all()
                    ->where("Event","=",$envent_name);
        foreach($event as $evn){
         $price=$evn->$eventtype;
         $spotleft=$evn->$spot;
         $evn->$spot=$spotleft-1;
         $evn->save();
        }
    
        
       $qun=1;
       $itemName='Event Ticket';

       $event_sold_ticket=new event_sold_ticket;
       $eventreport=new eventreport;

        
       $Event_Ticket_No="WET_".$event_sold_ticket->count();
       $en_eventticket=Hash::make($Event_Ticket_No);
       $chp="userid".$event_sold_ticket->count();

       $event_sold_ticket->checkpyment=$chp;
       $event_sold_ticket->EventName=$envent_name;
       $event_sold_ticket->Type=$eventtype;
       foreach($event as $evn){
            $event_sold_ticket->Time=$evn->Time;
            $event_sold_ticket->Day=$evn->Date;
       }
       
       $event_sold_ticket->Ticket_No=$en_eventticket;
       $event_sold_ticket->save();

       $eventreport->EventName=$envent_name;
       $eventreport->Type=$eventtype;
       foreach($event as $evn){
            $eventreport->Time=$evn->Time;
            $eventreport->Day=$evn->Date;
        }
       $eventreport->Ticket_No=$en_eventticket;
       $eventreport->save();

       $successUrl = "https://werefa.biz/eventticket?id=".$chp;

       $checkoutOptions = new CheckoutOptions($sellerCode, $useSandbox);
       $checkoutOptions -> setSuccessUrl($successUrl);
       $checkoutOptions -> setCancelUrl($cancelUrl);
       //$checkoutOptions -> setIPNUrl($ipnUrl);
   
       $checkoutOrderItem = new CheckoutItem($itemName, $price,  $qun);
       $checkoutOrderItem  -> setHandlingFee(4);
       $checkoutHelper = new CheckoutHelper();
       $checkoutUrl = $checkoutHelper -> getSingleCheckoutUrl($checkoutOptions, $checkoutOrderItem);
   
       echo $checkoutUrl; 

   }
       // if(isset($_POST["ItemId"]))
       // {
       //     $checkoutOrderItem  -> setId($_POST["ItemId"]);
       // }
       // if(isset($_POST["DeliveryFee"]))
       // {
       //     $checkoutOrderItem  -> setDeliveryFee($_POST["DeliveryFee"]);
       // }
       // if(isset($_POST["Tax1"]))
       // {
       //     $checkoutOrderItem  -> setTax1($_POST["Tax1"]);
       // }
       // if(isset($_POST["Tax2"]))
       // {
       //     $checkoutOrderItem  -> setTax2($_POST["Tax2"]);
       // }
       // if(isset($_POST["Discount"]))
       // {
       //     $checkoutOrderItem  -> setDiscount($_POST["Discount"]);
       // }
       // if(isset($_POST["HandlingFee"]))
       // {
       //     $checkoutOrderItem  -> setHandlingFee($_POST["HandlingFee"]);
       // }         
}

}
