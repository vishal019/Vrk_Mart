<?php

namespace App\Http\Controllers;

use App\Models\header_banner;

use Illuminate\Http\Request;

class index extends Controller
{
    public function show(Request $request){


        $h_banner=header_banner::all();
      return view('index',['header_banner'=>$h_banner]);
    // dd($h_banner);


    }

}
