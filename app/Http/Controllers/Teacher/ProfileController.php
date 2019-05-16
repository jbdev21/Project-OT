<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

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
        return view('teacher.profile.edit', compact('user'));
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
            'email' => 'nullable|unique:users,email,'. $id,
            'name'  => 'required|string',
            'gender'=> 'required',
       ]); 

       $teacher = Admin::find($id);
       $teacher->email = $request->email;
       $teacher->name = $request->name;
       $teacher->gender = $request->gender;
       $teacher->contact_number = $request->contact_number;
       $teacher->save();

       return redirect()->back()->with('message', 'Changes Saved');

    }

    function changePassword()
    {
        return view('teacher.profile.change_password');
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
