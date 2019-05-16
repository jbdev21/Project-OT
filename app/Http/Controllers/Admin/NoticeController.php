<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Notice;
use Auth;
use Lang;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $notices = Notice::query()->has('admin')->orderby('id','DESC');
            return DataTables::of($notices)
                ->addColumn('action', function ($notice) {
                    $buttons = '<a href="' . route('admin.notice.edit', $notice->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> ' . Lang::get('button.edit') . '</a>';
                    $buttons .= '<a target="_blank" href="' . url('notice', $notice->slug) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> ' . Lang::get('button.view') . '</a>';
                    return $buttons;
                })
                ->addColumn('check', function ($notice) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $notice->id . '" >';
                })
                ->addColumn('feature', function ($notice) {
                    if($notice->on_top){
                        return '<a href="' . route('admin.notice.totop', $notice->id) . '"><i class="fa fa-star"></i></a>';
                    }else{
                        return '<a href="' . route('admin.notice.totop', $notice->id) . '"><i class="fa fa-star-o"></i></a>';
                    }
                })
                ->rawColumns(['check', 'action', 'feature'])
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
                'data' => 'title', 
                'name' => 'title', 
                'title' => Lang::get('label.title')
            ],
            // [
            //     'data' => 'message', 
            //     'name' => 'message', 
            //     'title' => Lang::get('label.message')
            // ],
            [
                'data' => 'created_at', 
                'name' => 'created_at', 
                'title' => Lang::get('label.date')
            ],
            [
                'data' => 'hits', 
                'name' => 'hits', 
                'title' => Lang::get('label.hits')
            ],
            [
                'data' => 'feature', 
                'name' => 'feature', 
                'title' => "고정"
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
        return view('admin.notice.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'message' => 'required',
            'admin_id' => 'integer'
        ]);

        $notice = new Notice;
        $notice->title = $request->title;
        $notice->message = $request->message;
        $notice->admin_id = Auth::user()->id;
        $notice->slug = time();
        $notice->save();
        return redirect()->route('admin.notice.index')->with('message', Lang::get('label.item_saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function updateTop($id)
    {
        $notice = Notice::find($id);
        $notice->on_top =  !$notice->on_top;
        $notice->save();
        return back();
    }

    public function edit($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.edit', compact('notice'));
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
            'title' => 'required|string|max:255',
            'message' => 'required'
        ]);

        $notice = Notice::find($id);
        $notice->title = $request->title;
        $notice->message = $request->message;
        $notice->save();
        return redirect()->route('admin.notice.index')->with('message', Lang::get('label.item_updated'));
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
        if(count($ids)){
            foreach($ids as $id){
                $class = Notice::find($id)->delete();
            }

            return redirect()->back()->with('message',Lang::get('label.item_deleted')); 
        
        }else{
            return redirect()->back();
        }
        
    }
}
