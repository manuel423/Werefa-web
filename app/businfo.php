<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class businfo extends Model
{
    //
    protected $fillable =[
            'BusName',
            'Bus_num',
            'From',
            'To',
            'TakeofTime',
            'Date',
            'avilablseat',
            'Price'
    ];
}
