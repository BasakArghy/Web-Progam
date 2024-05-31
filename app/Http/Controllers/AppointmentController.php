<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AppointmentController extends Controller
{
    public function index(){
        $user=User::all();
        $reservations = Reservation::all();
        $data= array();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
        }

        return view('frontend.reservationFrontend',compact('data','user','reservations'));
       
    }
    public function myappoint(){
        $user=User::all();
        $reservations = Reservation::all();
        $data= array();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
        }

        return view('frontend.myappoint',compact('data','user','reservations'));
       
    }
    public function storeappoint (){
        $user=User::all();
        $reservations = Reservation::all();
        $data= array();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
        }

        return view('frontend.storeappoint',compact('data','user','reservations'));
       
    }

    public function stores(){
        $user=User::all();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
        }
        return view('frontend.stores',compact('user','data'));
    }
    public function product(){
        $products=Product::all();
        $user=User::all();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
        }
        return view('frontend.productfront',compact('data','products'));
    }

    public function appointed(Request $request){
   
       
         $reservation = new Reservation();
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
    return back()->with('success','Your reservation is successful');
}
else{
    return back()->with('fail','Something wrong');
}
 
         
 
     
     }

}
