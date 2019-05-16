<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
     function index()
    {
        $topblogs = Blog::orderby('id','desc')->where('is_published', 1)->where('on_top', 1)->get();
    	$blogs = Blog::orderby('id','desc')->where("is_published", 1)->where('on_top', 0)->paginate(20);
    	return view('template.bernas.blog.index', compact('blogs', 'topblogs'));
    }

    function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $next = Blog::where('id', '<', $blog->id)->orderby('id','DESC')->first();
        $previous = Blog::where('id', '>', $blog->id)->first();
        $this->updateHit($blog);
    	return view('template.bernas.blog.show', compact('blog', 'next', 'previous'));
    }
    

    function updateHit(Blog $blog)
    {
        $old  = $blog->hits; 
        $blog->hits = $old + 1;
        $blog->save();
    }
}
