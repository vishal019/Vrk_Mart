<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class buynow extends Controller
{
    public function payment(Request $request){


        if(auth()->user()){
            
        $price =$request->all('price');
        // dd($price['price']);

        return view('razorpay.razorpay_intergration',['price'=>$price['price']]);

        }else{

            return redirect('login');
        }

    }

    public function store(){
        $input = $request->all();
        $api = new Api (env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount']/100,
                    'json_response' => json_encode((array)$response)
                ]);
            } catch(Exceptio $e) {
                return $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        Session::put('success',('Payment Successful'));
        return redirect()->back();
    }
}
