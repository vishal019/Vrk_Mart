<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_registration;

class validate_admin_login extends Controller
{
    public function validate_login(Request $request){

    $validated_data=$request->validate([

        'username'=>'required | max:8',
        'password'=>'required | min:8'

    ]);
   
   $data= admin_registration::where( 'username' ,$request->input('username'))->first();

  $username= $request->input('username');
  $password= $request->input('password');

//   dd($data->username);
$path = $request->path();
  if($username == $data->username && $password == $data->password ){


      echo('i am here');
        if( $path == 'validate.admin'){

          
        $request->session()->put('username',$username);
        $request->session()->put('password',$password);
        echo('hi');
          
        return redirect('adminpanel');

        }
   


  }else{

    return redirect('admin');
        }

 

    

   
   


    }

    public function show_admin_login(){

        return view('admin.login');
    }


    public function admin_logout(Request $request){


        session()->forget('username');
      session()->forget('password');
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
      
    }
}
