<?php

namespace App\Http\Controllers;

use App\Models\others_banner;
use Illuminate\Http\Request;

class OthersBannerController extends Controller
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
    public function create()
    {
        $other_banner = new others_banner();
        $banner->product_name=$req->input('banner_name');
        if($req->file('banner')){
            $file= $req->file('banner');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $banner->banner= $filename;
        }
        $banner->description=$req->input('description');
        $banner->save();
        return redirect('admin.other_banner');
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
    public function show(others_banner $others_banner)
    {
        $o_banner=others_banner::all();

        return view('admin.banner.others_banner',['other_banner'=>$o_banner]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(others_banner $others_banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, others_banner $others_banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(others_banner $others_banner)
    {
        //
    }
}
