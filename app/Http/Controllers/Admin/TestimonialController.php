<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Lang;
use App\Reply;
use App\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        $notis = Auth::user()->notifications()->where('type', 'App\Notifications\Admin\NewTestimonialNotification')->get();
        foreach($notis as $noti)
        {
            $noti->markAsRead();
        }
        if (request()->ajax()) {
            $testimonials = Testimonial::orderby('id','DESC')->has('user');
            return DataTables::of($testimonials)
                ->addColumn('action', function ($testimonial) {
                    return '<a href="' . route('admin.testimonial.show', $testimonial->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> '. Lang::get('button.show') .'</a>';
                })
                ->addColumn('check', function ($testimonial) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $testimonial->id . '" >';
                })
                ->addColumn('message', function ($testimonial) {
                    return str_limit($testimonial->message, 150);
                })
                ->addColumn('user', function ($testimonial) {
                    return $testimonial->user->name;
                })
                ->addColumn('teacher', function ($testimonial) {
                    return $testimonial->admin ? $testimonial->admin->name : "";
                })
                ->addColumn('is_show', function ($testimonial) {
                    return $testimonial->is_show ? "<i class='fa fa-check'></i>" : "";
                })
                ->rawColumns(['check', 'action', 'message', 'user', 'is_show'])
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
                'data' => 'user',
                'name' => 'user',
                'title' => Lang::get('label.student')
            ],
            [
                'data' => 'message',
                'name' => 'message',
                'title' => Lang::get('label.message')
            ],
            [
                'data' => 'teacher',
                'name' => 'teacher',
                'title' => Lang::get('label.teacher')
            ],
            [
                'data' => 'is_show',
                'name' => 'is_show',
                'title' => Lang::get('label.showing')
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
        return view('admin.testimonial.index', compact('html'));
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.show', compact('testimonial'));
    }

     public function reply(Request $request)
    {   
        $this->validate($request, [
            'message' => 'required',
            'testimonial_id' => 'integer'
        ]);

        $testimonial = Testimonial::find($request->testimonial_id);

        $reply = new Reply;
        $reply->message = $request->message;
        $reply->admin_id = Auth::user()->id;

        $testimonial->replies()->save($reply);

        return redirect()->route('admin.testimonial.show', $testimonial->id);

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
        $testimonial = Testimonial::find($id);
        if($testimonial->is_show)
        {
            $testimonial->is_show = 0;
        }else{
            $testimonial->is_show = 1;
        }
        $testimonial->save();

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  $id)
    {
        $ids = $request->item_checked;
        if(count($ids)){
            foreach($ids as $id){
                $class = Testimonial::find($id)->delete();
            }

            return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
        
        }else{
            return redirect()->back();
        }
    }
}
