<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
     function index(Request $request){
    	$categories = Faq::orderby('id', 'DESC')->groupBy('category')->having('id', '>', 0)->get();
    	if($request->category){
    		if($request->category == "전체보기"){
    			 $faq = Faq::orderby('id', 'DESC')->get();
    		}else{
    			$faq = Faq::orderby('id', 'DESC')->where('category', $request->category)->get();
    		}
    	}else{
    		$faq = Faq::orderby('id', 'DESC')->get();
    	}
    	return view(theme('faq.index'), compact('categories','faq'));
    }
}
