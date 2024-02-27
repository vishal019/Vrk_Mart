<?php

namespace App\Http\Controllers;

use App\Models\fashion_products;
use Illuminate\Http\Request;

class FashionProductsController extends Controller
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
        $fashion = new fashion_products();
        $fashion->product_name=$req->input('product_name');
        $fashion->product_type=$req->input('product_type');

        if($req->file('image')){
            $file= $req->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $fashion->image= $filename;
        }
        $fashion->price=$req->input('price');
        $fashion->qunatity=$req->input('qunatity');
        $fashion->description=$req->input('description');
        $fashion->save();

        return redirect('product.fashion_product');
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
    public function show(fashion_products $fashion_products)
    {
        $fashion =fashion_products::all();

        return view('admin.product_list.fashion_product',['fashion_product'=>$fashion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fashion_products $fashion_products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fashion_products $fashion_products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fashion_products $fashion_products)
    {
        //
    }
}
