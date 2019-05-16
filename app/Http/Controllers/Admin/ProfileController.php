<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Lang;
use Image;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'email' => 'required|unique:admins,email,'. $id,
            'name'  => 'required|string',
       ]); 

       $admin = Admin::find($id);
       $admin->email = $request->email;
       $admin->name = $request->name;
       $admin->gender = $request->gender;
       $admin->contact_number = $request->contact_number;

       
        if($request->hasFile('profile_image'))
        {
            $image = $request->file('profile_image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            
            $destinationPath = www_path('profile');
            $img = Image::make($image->getRealPath());

           
            //return $old_image;
            $img->resize(100, 100, function ($constraint) {
                //$constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $uploaded_image = $input['imagename'];
            
            
            $admin->image = $uploaded_image;
        }

       $admin->save();

       return redirect()->back()->with('message', Lang::get('label.item_updated'));

    }

    function changePassword()
    {
        return view('admin.profile.change_password');
    }

    function validatePassword(Request $request)
    {
         $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (\Hash::check($request->old_password, \Auth::user()->password))
        {
            $user = Admin::find(\Auth::user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
            \Session::flash('message', '변경이 완료 되었습니다.');
            \Session::flash('alert-class', 'alert-success');
        }else{
            \Session::flash('message', 'Old Password not Match!');
            \Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
