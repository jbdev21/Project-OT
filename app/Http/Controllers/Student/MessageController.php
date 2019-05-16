<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\MessageNotification;
use App\Message;
use App\Admin;
use App\Reply;
use Auth;
use Lang; 

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->from == "admin")
        {
            $messages = Auth::user()->messages()->whereHas('admin', function($query){
                $query->where('type', "administrator");
            })->orderBy('id','DESC')->paginate(10);
        }else{
            $messages = Auth::user()->messages()->whereHas('admin', function($query){
                $query->where('type', "teacher");
            })->orderBy('id','DESC')->paginate(10);
        }
        return view('student.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ids =  Auth::user()->teachers();

        if($request->to == "admin")
        {
            $teachers =  Admin::all()->first();
        }else{
            $teachers =  Admin::find($ids);
        }

        return view('student.message.create', compact('teachers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'admin_id' => 'required',
            'message' => 'required|string'
        ]);

        $message = new Message;
        $message->admin_id = $request->admin_id;
        $message->user_id = Auth::user()->id;
        $message->message = $request->message;
        $message->save();

        if($message->admin_id)
        {
            $teacher = Admin::find($message->admin_id);
            $teacher->notify(new MessageNotification($message));
        }
        if($teacher->type = "administrator")
        {
            return redirect()->route('dashboard.message.index', ['from' => 'admin'])->with('message', Lang::get('label.saved'));
        }else{
            return redirect()->route('dashboard.message.index',  ['from' => 'teacher'])->with('message', Lang::get('label.saved'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message =  Message::find($id);
        return view('student.message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $ids =  Auth::user()->teachers();

        if($request->from == "admin")
        {
            $teachers =  Admin::all()->first();
        }else{
            $teachers =  Admin::find($ids);
        }

        $message =  Message::find($id);
        return view('student.message.edit', compact('teachers', 'message'));
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
        //return $request->admin_id;
        $this->validate($request,[
            'admin_id' => 'required',
            'message' => 'required|string'
        ]);

        $message = Message::find($id);
        $message->admin_id = $request->admin_id;
        $message->message = $request->message;
        $message->save();
        
        if($request->admin_id)
        {
            $teacher = Admin::find($request->admin_id);

            if($teacher->type == "administrator")
            {
                return redirect()->route('dashboard.message.index', ['from' => 'admin'])->with('message', Lang::get('label.saved'));
            }else{
                return redirect()->route('dashboard.message.index', ['from' => 'teacher'])->with('message', Lang::get('label.saved'));
            }
        }else{
            return redirect()->route('dashboard.message.index', ['from' => 'teacher'])->with('message', Lang::get('label.saved'));
        }
       
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->replies()->delete();
        $message->delete();
        return redirect()->route('dashboard.message.index');
    }

    // public function reply(Request $request)
    // {
    //     $this->validate($request, [
    //         'message' => 'required',
    //         'message_id' => 'integer'
    //     ]);

    //     $message = Message::find($request->message_id);

    //     $reply = new Reply;
    //     $reply->message = $request->message;
    //     $reply->admin_id = Auth::user()->id;

    //     $message->replies()->save($reply);

    //     return redirect()->route('dashboard.message.show', $message->id);
    // }
}
