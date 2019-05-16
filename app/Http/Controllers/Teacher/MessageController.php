<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\Reply;
use Auth;

class MessageController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }
    
    public function index()
    {
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\MessageNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

        $messages = Auth::user()->messages()->orderBy('id','DESC')->paginate(10);
         return view('teacher.message.index', compact('messages'));
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
        $message = Message::find($id);
        return view('teacher.message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'message' => 'required',
        ]);

        $message = Message::find($id);

        $reply = new Reply;
        $reply->message = $request->message;
        $reply->admin_id = Auth::user()->id;

        $message->replies()->save($reply);

        return redirect()->route('teacher.message.show', $message->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        $reply->delete();

        return back();
    }
}
