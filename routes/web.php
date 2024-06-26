<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileProductsController;
use App\Http\Controllers\ElectronicProductsController;
use App\Http\Controllers\FashionProductsController;
use App\Http\Controllers\HomeAndFurnitureProductsController;
use App\Http\Controllers\AppliancesProductsController;
use App\Http\Controllers\HeaderBannerController;
use App\Http\Controllers\OthersBannerController;
use App\Http\Controllers\index;
use App\Http\Controllers\SmartphoneProductlist;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\validate_admin_login;
use App\Http\Controllers\buynow;












// Admin Routes 
Route::get('/',[index::class,'show']);


Route::group(['middleware'=>'web'],function(){


    Route::get('/admin',[validate_admin_login::class,'show_admin_login']);
    Route::post('/validate.admin',[validate_admin_login::class,'validate_login']);

Route::get('/adminpanel',function(){
    return view('admin/Adminpanel');

});
Route::get('/adminlogout',[validate_admin_login::class,'admin_logout']);

});





// product Routes 
Route::get('/product.mobile',[MobileProductsController::class,'show']);
Route::post('/add_mobile_product',[MobileProductsController::class,'create']);


Route::get('/product.electronic',[ElectronicProductsController::class,'show']);
Route::post('/add_electronic_product',[ElectronicProductsController::class,'create']);

Route::get('/product.fashion',[FashionProductsController::class,'show']);
Route::post('/add_fashion_product',[FashionProductsController::class,'create']);

Route::get('/product.home_and_furniture',[HomeAndFurnitureProductsController::class,'show']);
Route::post('add_home_and_furniture',[HomeAndFurnitureProductsController::class,'create']);

Route::get('/product.appliances',[AppliancesProductsController::class,'show']);
Route::post('/add_appliances_product',[AppliancesProductsController::class,'create']);



    //  Banner route 
Route::get('/admin.header_banner',[HeaderBannerController::class,'show']);
Route::post('/add_header_banner',[HeaderBannerController::class,'create']);

Route::get('/admin.other_banner',[OthersBannerController::class,'show']);
Route::post('/add_other_banner',[OthersBannerController::class,'create']);



// product list 

Route::get('/productlist.smartphone',[SmartphoneProductlist::class,'display_product']);
Route::get('/productlist.smartphone/{id}',[MobileProductsController::class,'get_product']);
Route::get('/productlist.appliances',[AppliancesProductsController::class,'frontend_appliances_display']);
Route::get('productlist.appliances/{id}',[AppliancesProductsController::class,'get_appliances_product']);
Route::get('/productlist.home_and_furniture',[HomeAndFurnitureProductsController::class,'display_homeandfurniture_frontend']);
Route::get('/productlist.electronic',[ElectronicProductsController::class,'display_electronic_frontend']);
Route::get('/productlist.fashion',[FashionProductsController::class,'display_fashion_frontend']);


// User Routes

Route::get('/login',[UserLoginController::class,'show']);
Route::post('/userlogincheck',[UserLoginController::class,'check']);



Route::get('/User_Registeration',[UserRegistrationController::class,'show']);
Route::post('/sendregisterresponse',[UserRegistrationController::class,'create']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// payment routes 
Route::get('product',[RazorpayController::class,'index']);
Route::post('razorpay-payment',[RazorpayController::class,'store'])->name('razorpay.payment.store');

// buynow route 
Route::post('productlist.smartphone/buynow_product',[buynow::class,'payment']);
