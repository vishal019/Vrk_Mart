<?php

namespace App\Http\Controllers;

use App\Models\user_registration;
use Illuminate\Http\Request;

class UserRegistrationController extends Controller
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
    public function create( Request $request)
    {
            $request->validate(['first_name'=>'required','last_name'=>'required','email'=>'required|email',
       'password'=>'required|min:6|required_with:repeat_password|same:repeat_password', 'repeat_password'=>'required|min:6']);


        $register = new user_registration();
        $register->first_name=$request->input('first_name');
        $register->last_name=$request->input('last_name');
        $register->email=$request->input('email');
        $register->password=$request->input('password');
        $register->repeat_password=$request->input('repeat_password');
        $register->save();

        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user_registration $user_registration)
    {
        return view('User.User_register');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_registration $user_registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user_registration $user_registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_registration $user_registration)
    {
        //
    }
}
