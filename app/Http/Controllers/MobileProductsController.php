<?php

namespace App\Http\Controllers;

use App\Models\mobile_products;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class MobileProductsController extends Controller
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
    public function create(Request $req)
    {
        $mobile = new mobile_products();
        $mobile->brand_name=$req->input('brand_name');
        $mobile->mobile_model=$req->input('mobile_model');

        if($req->file('mobile_image')){
            $file= $req->file('mobile_image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $mobile->mobile_image= $filename;
        }

                    // working

        // $image = $req->file('mobile_image');
        // $name=$image->getClientOriginalName();
        // $image->storeAs('public',$name);

        // $mobile->mobile_image=$name;

                // working end 

       

        $mobile->price=$req->input('price');
        $mobile->qunatity=$req->input('qunatity');
        $mobile->description=$req->input('description');

        // echo($image);
        
        $mobile->save();


       
        // return view('admin.product_list.mobile_product',['pd'=>$allData]);
        return redirect('product.mobile');


        
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
    public function show(mobile_products $mobile_products)
    {

            $allData=mobile_products::all();
    
        return view('admin.product_list.mobile_product',['mobile_data'=>$allData]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mobile_products $mobile_products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mobile_products $mobile_products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mobile_products $mobile_products)
    {
        //
    }
}
