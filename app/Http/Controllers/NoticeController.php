<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    function index()
    {
        $topnotices = Notice::orderby('id','desc')->where('on_top', 1)->get();
    	$notices = Notice::orderby('id','desc')->where('on_top', 0)->paginate(20);
    	return view(theme('notice.index'), compact('notices', 'topnotices'));
    }

    function show($slug)
    {   
        $notice = Notice::where('slug', $slug)->first();
        $this->updateHit($notice);

        $next = Notice::where('id', '<', $notice->id)->orderby('id','DESC')->first();
        $previous = Notice::where('id', '>', $notice->id)->first();

    	return view(theme('notice.show'), compact('notice', 'next', 'previous'));
    }

    function updateHit(Notice $notice)
    {
        \Log::info("add");   
        $old  = $notice->hits; 
        $notice->increment('hits', 1);
        $notice->save();
    }
}
