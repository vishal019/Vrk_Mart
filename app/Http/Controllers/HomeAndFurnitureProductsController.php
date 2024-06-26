<?php

namespace App\Http\Controllers;

use App\Models\home_and_furniture_products;
use Illuminate\Http\Request;

class HomeAndFurnitureProductsController extends Controller
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
        $homeandfurniture = new home_and_furniture_products();
        $homeandfurniture->product_name=$req->input('product_name');
        $homeandfurniture->product_type=$req->input('product_type');

        if($req->file('image')){
            $file= $req->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $homeandfurniture->image= $filename;
        }
        $homeandfurniture->price=$req->input('price');
        $homeandfurniture->qunatity=$req->input('qunatity');
        $homeandfurniture->description=$req->input('description');
        $homeandfurniture->save();

        return redirect('product.home_and_furniture_product_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function display_homeandfurniture_frontend(Request $request)
    {
      $home_and_furniture=home_and_furniture_products::all();
      return view('frontend.home_and_furniture',['handf'=>$home_and_furniture]);
    }

    /**
     * Display the specified resource.
     */
    public function show(home_and_furniture_products $home_and_furniture_products)
    {
        $homeandfurniture=home_and_furniture_products::all();
        return view('admin.product_list.home_and_furniture_product_admin',['handf'=>$homeandfurniture]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(home_and_furniture_products $home_and_furniture_products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, home_and_furniture_products $home_and_furniture_products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(home_and_furniture_products $home_and_furniture_products)
    {
        //
    }
}
