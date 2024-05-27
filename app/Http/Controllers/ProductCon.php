<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductCon extends Controller
{
    public function index(){
        $products=Product::all();
        return view('admin.products.index',compact('products'));
}   public function create(){
   
    return view('admin.products.create');
}
public function store(Request $request)
{
    

    $image =$request->file('image')->storeAs('images',$request->file('image')->getClientOriginalName(),'public');
$product = new Product();
$product->name=$request->name;
$product->description=$request->description;
$product->price=$request->price;
$product->image='/storage/'.$image;


$res=$product->save();

if($res){
    return redirect()->route('products')->with('success','You have created a new product');
}
else{
    return redirect()->route('products')->with('fail','Something wrong');
}
}

public function edit($id){
    $product = Product::findorFail($id);
    return view('admin.products.edit',compact('product'));
}

public function update(Request $request,$id){
  

     $product = Product::findorFail($id);

     $image= $product->image;
     if($request->hasFile('image')){
        @unlink($product->image);
     $image =$request->file('image')->storeAs('images',$request->file('image')->getClientOriginalName(),'public');
     $image='/storage/'.$image;
     }
    
     $product->name=$request->name;
     $product->description=$request->description;
     $product->price=$request->price;
     $product->image=$image;
     
     
     $res=$product->save();
     
     if($res){
         return redirect()->route('products')->with('success','You have created a new product');
     }
     else{
         return redirect()->route('products')->with('fail','Something wrong');
     }
 }

public function destroy($id)
{
    $product = Product::findorFail($id);

    
$product->delete();

    

 
        return back()->with('error', 'User not found');
    

}
}
