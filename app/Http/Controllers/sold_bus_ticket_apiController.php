<?php

namespace App\Http\Controllers;

use App\bus_sold_tickets;
use App\buses;
use Illuminate\Http\Request;
use App\businfo;
use App\Http\Resources\apiresource;
use App\Http\Resources\apiresourcebus;

class sold_bus_ticket_apiController extends Controller
{
    //
    public function show($bus): apiresource{
        $bus_name='';
        $bus_com=buses::all()
                        ->where('Bus_id','=',$bus);
        if($bus_com->count()>0){
            foreach($bus_com as $busn){
                $bus_name=$busn->Bus_Name;
            }
            
            $info=bus_sold_tickets::all()
                            ->where('Bus_Name','=',$bus_name);
        return new apiresource($info);
        }else{
            return new apiresource('no');
        }
        
    }

    public function store(Request $request): apiresourcebus{
        $request->validate([
            'BusName'=>'required',
            'Bus_num'=>'required',
            'From'=>'required',
            'To'=>'required',
            'TakeofTime'=>'required',
            'Date'=>'required',
            'avilablseat'=>'required',
            'Price'=>'required'
        ]);
       $bus_info=businfo::create($request->all());
       return new apiresourcebus($bus_info);
    }

    public function update(businfo $businfoup, Request $request, $id){ 
        $request->validate([
            'BusName'=>'required',
            'Bus_num'=>'required',
            'From'=>'required',
            'To'=>'required',
            'TakeofTime'=>'required',
            'Date'=>'required',
            'avilablseat'=>'required',
            'Price'=>'required'
        ]);
        
        if($businfoup->find($id)->update($request->all())){
            return "sucssesful";
        }else{
            return "something went wrong";
        }
    }

    public function destroy(businfo $businfodel, $id){

        if($businfodel->destroy($id)>0){
            return "sucssesful";
        }else{
            return "something went wrong";
        }

    }

}
