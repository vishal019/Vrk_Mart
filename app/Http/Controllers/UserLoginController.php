<?php

namespace App\Http\Controllers;

use App\Models\user_login;
use App\Models\user_registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required|min:6',
        ]);
        $user_register_data = user_registration::all();
        $user_name=$user_register_data[0]->name;
        $email= $user_register_data[0]->email;
        $password = $user_register_data[0]->password;
        if( Auth::check(['email'=>$email,'password'=>$password])){

            return redirect('/');
        }
        else{


             return redirect('/login')->withError(['message'=>'invalid email or password']);

        }
       
     
             


    }

    /**
     * Display the specified resource.
     */
    public function show(user_login $user_login)
    {

        

        return view('User.User_login');
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_login $user_login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user_login $user_login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_login $user_login)
    {
        //
    }
}
