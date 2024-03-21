<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobile_products;

class SmartphoneProductlist extends Controller
{
    public function display_product( Request $request){


         $product = mobile_products::all();

        return view('frontend.productlist',['product'=>$product]);

    }
}
