<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function booking(Request $request, $id){
        // lấy ngày đến
        $tempDateArrival = str_replace(['<span class=day>', '</span>', '<span class=month>', '<span class=year>'] , ['','','',''], $request->input('dateArrival'));
        $dataDateArrival = explode(' ', $tempDateArrival);
        $dateArrival = $dataDateArrival[2] . '-' . $dataDateArrival[1] . '-' . $dataDateArrival[0];
        
        // lấy ngày đi
        $tempDeparture = str_replace(['<span class=day>', '</span>', '<span class=month>', '<span class=year>'] , ['','','',''], $request->input('dateDeparture'));
        $dataDateDeparture = explode(' ', $tempDeparture);
        $dateDeparture = $dataDateDeparture[2] . '-' . $dataDateDeparture[1] . '-' . $dataDateDeparture[0];
        
        
    }
}
