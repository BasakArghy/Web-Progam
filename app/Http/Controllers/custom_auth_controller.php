<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

use Session;

class custom_auth_controller extends Controller
{
    public function login(){
return view("auth.login");
    }
   
    public function registration(){
     
        return view('auth.registration');
  
    }

    public function registerUser(Request $request){
       $request->validate(
        [
            'name'=>'required',
            'number'=>'required|unique:users',
            'password'=>'required|min:5|max:12',
            'type'=>'required'

        ]
        );

        $user = new User();
        
        $user->name=$request->name;
        $user->number=$request->number;
        $user->password=Hash::make($request->password);
        $user->type=$request->type;
        if($request->type=='owner')
        {
            $user->lat=$request->lat;
            $user->lng=$request->lng;
            $user->price=$request->price;
        }
    

        $res=$user->save();

        if($res){
            return back()->with('success','You have registered successfully');
        }
        else{
            return back()->with('fail','Something wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate(
            [
              
                'number'=>'required|',
                'password'=>'required|min:5|max:12'
            ]
            );

            $user =User::Where('number','=',$request->number)->first();
            if($user){
                if(Hash::check($request->password,$user->password)){
            $request->session()->put('loginId',$user->id);
            return redirect('/');
                }
                else{
                    return back()->with('fail','Password not matched.');
                }

            }
            else{
                return back()->with('fail','This Phone Number is not registered.');
            }

    }
    public function dashboard(){
        $data= array();
        if(Session::has('loginId')){
            $data =User::Where('id','=',Session::get('loginId'))->first();
        }

        return view('dashboard',compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
          return  redirect('/');
        }
    }


    public function appoint(){

        return view("admin.arghy");
    }


}
