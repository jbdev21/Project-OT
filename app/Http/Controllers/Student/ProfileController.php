<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Lang;

class ProfileController extends Controller
{
    function index()
    {
    	$user = Auth::user();
    	return view('student.profile.index', compact('user'));
    }

    function update(Request $request, $id)
    {

    	$this->validate($request, [
    		'dob' => 'required|date',
    		'korean_name' => 'required',
    		'contact_number' => 'required',
    		'gender' => 'required',
    		'email' => 'nullable|unique:users,email,'. $id 
    	]);

    	$user = User::find($id);
    	$user->name = $request->name;
    	$user->korean_name = $request->korean_name;
    	$user->gender = $request->gender;
    	$user->dob = $request->dob;
    	$user->contact_number = $request->contact_number;
    	$user->contact_number1 = $request->contact_number1;
    	$user->email = $request->email;

        $user->save();
        
        

    	return redirect()->back()->with('message', Lang::get('label.item_updated'));
    }

    function changePassword()
    {
    	return view('student.profile.change_password');
    }

    function validatePassword(Request $request)
    {
    	 $this->validate($request,[
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (\Hash::check($request->old_password, \Auth::user()->password))
        {
            $user = User::find(\Auth::user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
            \Session::flash('message', '변경이 완료 되었습니다.');
            \Session::flash('alert-class', 'alert-success');
        }else{
            \Session::flash('message', Lang::get('auth.failed'));
            \Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->back();
    }

    function deleteaccount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->is_deleted = 1;
        $user->save();

        //loggin out user
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
