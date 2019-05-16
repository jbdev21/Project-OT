<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date_start' => 'required',
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $banner = new Banner;

        if($request->hasFile('image')){
            //for image upload 
            $image = $request->file('image');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            $destinationPath = www_path('banners');
            $img = Image::make($image->getRealPath());

            $img->resize(465, 135, function ($constraint) {
               // $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            $banner->path = $uploaded_image;
        
        }

        $banner->date_start = $request->date_start;
        $banner->date_end = $request->date_end;
        $banner->is_show = $request->is_show ? 1 : 0;
        $banner->save();

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        $banners = Banner::all();
        return view('admin.banner.edit', compact('banner', 'banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date_start' => 'required',
            'image'      => 'image|mimes:jpeg,png,jpg|max:2048|dimensions:width=465,height=135'
        ]);

        $banner = Banner::find($id);

        if($request->hasFile('image')){
            //for image upload 
            $image = $request->file('image');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            $destinationPath = www_path('banners');
            $img = Image::make($image->getRealPath());

            $img->resize(465, 135, function ($constraint) {
               // $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            $banner->path = $uploaded_image;
        
        }

        $banner->date_start = $request->date_start;
        $banner->date_end = $request->date_end;
        $banner->is_show = $request->is_show ? 1 : 0;
        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $path  = www_path('banners/'. $banner->path);
        
        if(file_exists($path)){
            unlink($path);
        }
        
        $banner->delete();
        return back();
       

        
    }
}
