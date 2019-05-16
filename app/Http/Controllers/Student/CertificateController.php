<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classer;
use Auth;

class CertificateController extends Controller
{
    function index()
    {
    	$classes = Auth::user()->classer()->where('status', '!=', 'pending')->where('status', '!=', 'postponed')->orderby('id','DESC')->get();
        return view('student.certificate.index', compact('classes'));
    }

    function show($id)
    {	
    	$class = Classer::find($id);
    	return view('student.certificate.show', compact('class'));
    }
}
