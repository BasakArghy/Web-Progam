<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users=User::all();
        $reservations=Reservation::all();


        return view('admin.index',compact('users','reservations'));
    }
}
