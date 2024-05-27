<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    
    public function index()
    {
        return view('stipe');
    }

    public function checkout($id)
    {
        $product = Product::findorFail($id);

      \Stripe\Stripe::setApiKey(config('stripe.sk'));
      $session = \Stripe\Checkout\Session::create([
        'line_items' => [
           [ 'price_data'=>[
                'currency' => 'gbp',
                'product_data' => [
                    'name' => 'Send me money!!!',
                ],
                'unit_amount' => $product->price*100, //$5.00
            ],
            'quantity' => 1,
        ],

    ],
    'mode' => 'payment',
    'success_url' =>route('success'),
    'cancel_url' =>route('index'),

]);

return redirect()->away($session->url);
    }

    public function checkoutRe($id)
    {
        

      \Stripe\Stripe::setApiKey(config('stripe.sk'));
      $session = \Stripe\Checkout\Session::create([
        'line_items' => [
           [ 'price_data'=>[
                'currency' => 'gbp',
                'product_data' => [
                    'name' => 'Send me money!!!',
                ],
                'unit_amount' => $id*100, //$5.00
            ],
            'quantity' => 1,
        ],

    ],
    'mode' => 'payment',
    'success_url' =>route('success'),
    'cancel_url' =>route('index'),

]);

return redirect()->away($session->url);
    }

    public function success()
    {
        return view('stipe');
    }

}
