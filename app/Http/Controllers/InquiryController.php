<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;

class InquiryController extends Controller
{
    function index(Request $request)
    {
    	 $request->session()->forget('inquiry_id');

      //  return $request->input('by');
        if($request->input('key') != ""){

            $inquiries = Inquiry::where($request->input('by'),  'like', '%' . $request->input('key') . '%')->orderby('id','DESC')->paginate(5);
        
        }else{
        
            $inquiries = Inquiry::orderby('id','DESC')->paginate(6);

        }
        return view(theme('inquiry.index'), compact('inquiries'));
    }

   

    function create()
    {
    	return view(theme('inquiry.create'));
    }

    function show($id)
    {

        $inquiry = Inquiry::find($id);
        
        if($inquiry->password == "")
            {

            return view(theme('inquiry.show'), compact('inquiry'));

        }else{
            if($inquiry->id == session('inquiry_id')){
                return view(theme('inquiry.show'), compact('inquiry'));
            }else{
                return redirect()->back();
            }
        }
    }




    function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'message' => 'required|string',
            'password' => 'confirmed',
    		'type' => 'required'
    	]);

    	$inquiry = new Inquiry;
        $inquiry->type = $request->type;
    	$inquiry->name = $request->name;
    	$inquiry->title = $request->title;
    	$inquiry->message = $request->message;

    	if($request->password)
    	{
    		$inquiry->password = $request->password;
    	}

        $inquiry->save();
        
        return redirect(url('inquiry'));

    }



    public function verify(Request $request)
    {
        $this->validate($request, [
            'password' => 'required'
        ]);

        $inquiry = Inquiry::find($request->inquiry_id);
      //  return $inquiry;
        if($inquiry->password == $request->password){
            session(['inquiry_id' => $inquiry->id]);
            return redirect(route('inquiry.show', $inquiry->id));
        }else{
            \Session::flash('message', '비밀번호를 확인해 주세요');
            \Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }

        
    }


     public function reply(Request $request)
    {   
        $this->validate($request, [
            'message' => 'required',
            'inquiry_id' => 'integer'
        ]);

        $inquiry = Inquiry::find($request->inquiry_id);

        $reply = new Reply;
        $reply->message = $request->message;
        $reply->admin_id = Auth::user()->id;

        $inquiry->replies()->save($reply);

        return redirect()->route('inquiry.show', $inquiry->id);

    }


}
