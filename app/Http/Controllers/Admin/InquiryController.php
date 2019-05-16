<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Inquiry;
use App\Reply;
use Auth;
use DB;
use Lang;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        $notis = Auth::user()->notifications()->where('type', 'App\Notifications\Admin\NewInquiryNotification')->get();
        foreach($notis as $noti)
        {
            $noti->markAsRead();
        }
        
        DB::table('inquiries')->update(array('seen' => 1));
        if (request()->ajax()) {
            $inquiriess = Inquiry::orderby('id','DESC');
            return DataTables::of($inquiriess)
                ->addColumn('action', function ($inquiry) {
                    return '<a href="' . route('admin.inquiry.show', $inquiry->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye"></i> '. Lang::get('button.show') .'</a>';
                })
                ->addColumn('check', function ($inquiry) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $inquiry->id . '" >';
                })
                ->addColumn('message', function ($inquiry) {
                    return str_limit($inquiry->message, 100);
                })
                ->addColumn('replies', function ($inquiry) {
                    return count($inquiry->replies);
                })
                ->addColumn('date_created', function ($inquiry) {
                    return date_formater('date_time_format', $inquiry->created_at);
                })
                ->rawColumns(['check', 'action', 'message','date_created'])
                ->make(true);
        }

        $html = $builder
            ->parameters([
                'language' => [
                    'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                ],
                'pageLength' => 25,
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
                'data' => 'name',
                'name' => 'name',
                'title' => Lang::get('label.name')
            ],
            [
                'data' => 'title',
                'name' => 'title',
                'title' => Lang::get('label.title')
            ],
            [
                'data' => 'message',
                'name' => 'message',
                'title' => Lang::get('label.message')
            ],
            [
                'data' => 'replies',
                'name' => 'replies',
                'title' => Lang::get('label.replies')
            ],
            [
                'data' => 'date_created',
                'name' => 'date_created',
                'title' => Lang::get('label.date')
            ],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
            ],

        ]);
        return view('admin.inquiry.index', compact('html'));
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

        return redirect()->route('admin.inquiry.show', $inquiry->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inquiry = Inquiry::find($id);
        return view('admin.inquiry.show', compact('inquiry'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ids = $request->item_checked;
        foreach($ids as $id)
        {
            Inquiry::find($id)->delete();
        }

        if(!$request->ajax())
        {
            return back();
        }
    }
}
