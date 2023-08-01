<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function landing()
    {
        // check is login or not
        if(auth()->user()== null)
        {
            $user = User::all();
            return view('welcome',compact('user'));
        }else
        {
            $user = User::where('id','!=',auth()->user()->id)->get();

            $user = User::whereNotIn('id',auth()->user()->wishlist->pluck('friend_id'))->get();
            return view('welcome',compact('user'));
        }
    }

    public function session(Request $request)
    {
     
        \Stripe\Stripe::setApiKey('sk_test_51NXT5YFSLbwC00tLfIG0WS4FTAYSuTYS1KxJdIOENVjkQaBgzyYR4BQc6eCpDSampJCqH7PuYn1bwzCfOppnSTJS00uT4dw4pa');
        $order_id = $request->orderID;
        $total_price = $request->total_price;

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'idr',
                    'unit_amount' => $total_price,
                    'product_data' => [
                        'name' => 'Order ID: '.$order_id,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('landing'),
            'cancel_url' => route('home'),
        ]);

        return redirect()->away($checkout_session->url);
    }
}
