<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table = 'billdetails';

    protected $fillable = ['bill_id', 'room_id', 'dateArrival', 'dateDeparture', 'name', 'phone', 'address', 'email'];

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
}
