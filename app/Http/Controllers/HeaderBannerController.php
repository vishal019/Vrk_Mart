<?php

namespace App\Http\Controllers;

use App\Models\header_banner;
use Illuminate\Http\Request;

class HeaderBannerController extends Controller
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
    public function create( Request $req)
    {
        $banner = new header_banner();
        $banner->banner_name=$req->input('banner_name');
        if($req->file('banner')){
            $file= $req->file('banner');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('img/products/'), $filename);
            $banner->banner= $filename;
        }
        $banner->description=$req->input('description');
        $banner->save();
        return redirect('admin.header_banner');
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
    public function show(header_banner $header_banner)
    {
        $h_banner=header_banner::all();

        return view('admin.banner.header_banner',['header_banner'=>$h_banner]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function frontend_show(header_banner $header_banner)
    {
        $h_banner=header_banner::all();

        return view('components.banner',['header_banner'=>$h_banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, header_banner $header_banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(header_banner $header_banner)
    {
        //
    }
}
