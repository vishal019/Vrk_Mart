<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileProductsController;
use App\Http\Controllers\ElectronicProductsController;
use App\Http\Controllers\FashionProductsController;
use App\Http\Controllers\HomeAndFurnitureProductsController;
use App\Http\Controllers\AppliancesProductsController;
use App\Http\Controllers\HeaderBannerController;
use App\Http\Controllers\OthersBannerController;








// Admin Routes 
Route::get('/', function () {

    return view('index');
});


Route::group(['middleware'=>'web'],function(){


    Route::get('/admin',function(){
        return view('admin/login');
});
Route::get('/adminpanel',function(){
    return view('admin/Adminpanel');

});

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


// User Routes

Route::get('/login',function(){


    return view('User.User_login');

});

Route::get('/User_Registeration',function(){


    return view('User.User_register');

});


