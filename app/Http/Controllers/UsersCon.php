<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Hash;

use Session;


class UsersCon extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
}

public function edit($id){
    $user = User::findorFail($id);
    return view('admin.users.edit',compact('user'));
}
public function update(Request $request,$id){
    $request->validate(
     [
         'name'=>'required',
         'number'=>'required',
         'password'=>'required|min:5|max:12'
      

     ]
     );

     $user = User::findorFail($id);
     
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
         return redirect()->route('users')->with('success','You have registered successfully');
     }
     else{
         return redirect()->route('users')->with('fail','Something wrong');
     }
 }

public function destroy($id)
{
    $user = User::findorFail($id);

    
$user->delete();

    

 
        return back()->with('error', 'User not found');
    

}
}
