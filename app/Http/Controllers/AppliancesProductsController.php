<?php

namespace App\Http\Controllers;

use App\Models\appliances_products;
use Illuminate\Http\Request;

class AppliancesProductsController extends Controller
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
        $appliances = new appliances_products();
        $appliances->product_name=$req->input('product_name');
        $appliances->product_type=$req->input('product_type');

        if($req->file('image')){
            $file= $req->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $appliances->image= $filename;
        }
        $appliances->price=$req->input('price');
        $appliances->qunatity=$req->input('qunatity');
        $appliances->description=$req->input('description');
        $appliances->save();
        return redirect('product.appliances_product_admin');
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
    public function show(appliances_products $appliances_products)
    {
        $appliances = appliances_products::all();
        return view('admin.product_list.appliances_product_admin',['appliances'=>$appliances]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(appliances_products $appliances_products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, appliances_products $appliances_products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(appliances_products $appliances_products)
    {
        //
    }
}
