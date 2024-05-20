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
 

  
    $reservation = Reservation::findorFail($id);

    $reservation->shop_id=$request->shop_id;
    $reservation->name=$request->name;
    $reservation->number=$request->number;
    
    $reservation->date=$request->date ;
    $reservation->time=$request->time;
    $flag=0;
    $res=0;
    $count = Reservation::where('time',$request->time)->count();
    if($count!=0)
    {
        $count2 = Reservation::where('date',$request->date)->count();
        if($count2!=0){
           $flag=1;
          
           


        }
    }
if($flag==0){
$res=$reservation->save();

}
if($res){
return redirect()->route('reservation')->with('success','Reservation updated successfully');
}
else{
    return redirect()->route('reservation')->with('success','Reservation not updated');
}

}
public function destroy($id)
{
    $reservation = Reservation::findorFail($id);

    
$reservation->delete();

    

 
        return back()->with('error', 'Reservation not found');
    

}


}
