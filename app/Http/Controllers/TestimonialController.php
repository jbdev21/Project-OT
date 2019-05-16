<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    function index()
    {
    	$testimonials = Testimonial::has('user')->where('is_show','1')->orderBy('created_at','DESC')->paginate(10);
    	return view(theme('testimonial.index'), compact('testimonials'));
    }

    function show($id)
    {
    	$testimonial = Testimonial::find($id);
    	return view(theme('testimonial.show'), compact('testimonial'));
    }
}
