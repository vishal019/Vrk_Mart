<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class buynow extends Controller
{
    public function payment(Request $request){

        $price =$request->all('price');
        // dd($price['price']);

        return view('razorpay.razorpay_intergration',['price'=>$price['price']]);

    }
}
