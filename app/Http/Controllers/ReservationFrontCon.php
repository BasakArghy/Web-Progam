<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationFrontCon extends Controller
{
    public function reservationfront()
    {
       
        return view('frontend.reservationFrontend');
    }
}
