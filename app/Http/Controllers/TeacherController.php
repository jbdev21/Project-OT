<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherProfile;

class TeacherController extends Controller
{
    function index()
    {
    	$profiles = TeacherProfile::has('admin')->where('is_show', 1)->get();

    	return view(theme('teacher_profile.index'), compact('profiles'));
    }

    function show($username)
    {	
    	$profile = TeacherProfile::whereHas('admin', function($query) use ($username){
    		return $query->where('username', $username);
    	})->first();


    	return view( theme('teacher_profile.show'), compact('profile'));
    }
}
