<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('index');
});

Route::get('/admin',function(){
        return view('admin/login');
});
Route::get('/adminpanel',function(){
    return view('admin/Adminpanel');
});

Route::get('/login',function(){


    return view('User.User_login');

});

Route::get('/User_Registeration',function(){


    return view('User.User_register');

});


