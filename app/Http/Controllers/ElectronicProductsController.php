<?php

namespace App\Http\Controllers;

use App\Models\electronic_products;
use Illuminate\Http\Request;

class ElectronicProductsController extends Controller
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
        $electronic = new electronic_products();
        $electronic->brand_name=$req->input('brand_name');
        $electronic->product_name=$req->input('product_name');

        if($req->file('image')){
            $file= $req->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $electronic->image= $filename;
        }
        $electronic->price=$req->input('price');
        $electronic->qunatity=$req->input('qunatity');
        $electronic->description=$req->input('description');
        $electronic->save();
        return redirect('product.electronic');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function display_electronic_frontend(Request $request)
    {
        $electronic = electronic_products::all();
        return view('frontend.electronic',['electronic'=>$electronic]);
    }

    /**
     * Display the specified resource.
     */
    public function show(electronic_products $electronic_products)
    {

        $electronic =electronic_products::all();

        return view('admin.product_list.electronic_product',['electronic'=>$electronic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(electronic_products $electronic_products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, electronic_products $electronic_products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(electronic_products $electronic_products)
    {
        //
    }
}
