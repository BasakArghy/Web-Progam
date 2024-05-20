<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationCon extends Controller
{
    public function index(){
        $reservations=Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
}
public function edit($id){
    $reservation = Reservation::findorFail($id);
    return view('admin.reservation.edit',compact('reservation'));
}

public function update(Request $request,$id)
{
    $request->validate([
        'name'=>'required',
        'number'=>'required',
        'date'=>'required',
        'time'=>'required'
    ]);

  
    $reservation = Reservation::findorFail($id);

    $reservation->update([
        'name'=>$request->name,
        'description' =>$request->description,
        
    ]);
    return to_route('reservation');

}
public function destroy($id)
{
    $reservation = Reservation::findorFail($id);

    
$reservation->delete();

    

 
        return back()->with('error', 'Reservation not found');
    

}


}
