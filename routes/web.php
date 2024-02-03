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




// Admin Routes 
Route::get('/', function () {

    return view('index');
});

Route::get('/admin',function(){
        return view('admin/login');
});
Route::get('/adminpanel',function(){
    return view('admin/Adminpanel');

});


// product Routes 
Route::get('/product.mobile',function(){

    return view('admin.product_list.mobile_product');

});
Route::get('/product.electronic',function(){


    return view('admin.product_list.electronic_product');

});
Route::get('/product.fashion',function(){



    return view('admin.product_list.fashion_product');

});


// User Routes

Route::get('/login',function(){


    return view('User.User_login');

});

Route::get('/User_Registeration',function(){


    return view('User.User_register');

});


