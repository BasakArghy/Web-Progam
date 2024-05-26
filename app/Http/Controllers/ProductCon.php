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
}
