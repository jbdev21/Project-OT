<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Message;
use App\Reply;
use Auth;
use Lang;

class MessageController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('admin_timezone'));
    }
    
    public function index(Builder $builder)
    {
        $admin = Auth::user();
        $noti = $admin->notifications()->where('type', 'App\Notifications\MessageNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

         if (request()->ajax()) {
                if(request()->recipient == "all"){
                    $messages = Message::whereHas("admin", function($q){
                        $q->where("type", 'teacher');
                    })->has("user")->orderBy('created_at','DESC')->get();
                }else{
                    $messages = Message::whereHas("admin", function($q){
                        $q->where("type", 'administrator');
                    })->has("user")->orderBy('created_at','DESC')->get();
                }

                return DataTables::of($messages)
                ->addColumn('check', function ($message) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $message->id . '" >';
                    })
                    ->addColumn('show', function ($message) {
                    return '<a href="' . route('admin.message.show', $message->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.show') .'</a> ';
                    })

                    //query for name
                    ->addColumn('student', function ($message) {
                        if($message->user){
                            return $message->user->username . '<br>' . $message->user->korean_name;
                        }else{
                            return "";
                        }
                    })

                    ->addColumn('message', function ($message) {
                    return  str_limit(strip_tags($message->message), 75);
                    })

                
                    ->addColumn('replies', function ($message) {
                    return  $message->replies()->count();
                    })

                
                ->rawColumns(['student', 'show', 'replies', 'check'])
                ->make(true);
        }
           $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                        ],
                        'pageLength' => 25,
                        'order' => [3 => 'DESC']
                    ])
                    ->columns([
                        [
                            'data' => 'check', 
                            'name' => '', 
                            'title' => '<input type="checkbox" id="checkAll" >',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => false,
                            'exportable'     => false,
                            'printable'      => true,
                        ],
                        [
                             'data' => 'student',
                             'name' => 'student', 
                             'title' => Lang::get('label.student')
                        ],
                         [
                             'data' => 'message',
                             'name' => 'message', 
                             'title' => Lang::get('label.message')
                        ],
                        [
                            'data' => 'created_at',
                             'name' => 'created_at', 
                             'title' => Lang::get('label.time')
                        ],
                        [
                            'data' => 'replies',
                             'name' => 'replies', 
                             'title' => Lang::get('label.replies')
                        ],
                        [
                            'defaultContent' => '',
                            'data'           => 'show',
                            'name'           => 'show',
                            'title'          => '',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => false,
                            'exportable'     => false,
                            'printable'      => true,
                            'footer'         => '',
                        ],
                ]);
        
       
         return view('admin.message.index', compact('html'));
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
        return view('admin.message.show', compact('message'));
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

        return redirect()->route('admin.message.show', $message->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        if($id)
        {
            Reply::find($id)->delete();
            return back();
        }
        
        $ids = $request->item_checked;
        foreach($ids as $id)
        {
            Message::find($id)->delete();
        }

        if(!$request->ajax())
        {
            return back();
        }
    }
}
