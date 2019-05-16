<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\AssignProofReadingNotification;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\ProofReading;
use App\Admin;
use Auth;
use Lang;

class ProofreadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
       
        $admin_id = Auth::user()->id;
        $notis = Admin::find($admin_id)->notifications()->where('type', 'App\Notifications\Admin\NewProofReadingNotification')->get();
        foreach($notis as $noti)
        {
            $noti->markAsRead();
        }

         if(request()->ajax()) {
            $proofreadings = ProofReading::query()->with('admin');

            return DataTables::of($proofreadings)
                ->addColumn('action', function ($proofreading) {
                    return '<a href="' . route('admin.proofreading.show', $proofreading->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>' . Lang::get('button.edit') . '</a>';
                })
                ->addColumn('check', function ($proofreading) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $proofreading->id . '" >';
                })
                ->addColumn('content', function ($proofreading) {
                    return str_limit($proofreading->message, 80);
                })
                
                ->addColumn('teacher', function ($proofreading) {
                    if($proofreading->admin)
                    {
                        return $proofreading->admin->name;
                    }
                })
                ->addColumn('replied', function ($proofreading) {
                    if($proofreading->replies()->count() > 0)
                    {
                        return "V :" . $proofreading->replies()->first()->created_at;;
                    }
                })
                ->addColumn('student', function ($proofreading) {
                    if($proofreading->user)
                    {
                         return $proofreading->user->username . ' / ' . $proofreading->user->korean_name  . ' / ' . $proofreading->user->name;
                    }
                })
                
                ->rawColumns(['check', 'action', 'content', 'author','created_at','replied'])
                ->make(true);
            }
            
        $html = $builder
             ->parameters([
                    'language' => [
                        'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                    ],
                    'order' => [ [4, 'DESC'] ],
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
                'data' => 'student',
                'name' => 'student',
                'title' => Lang::get('label.student')
            ],
            [
                'data' => 'content',
                'name' => 'content',
                'title' =>  Lang::get('label.content'),
                'width' => "20%"
            ],
           
            [
                'data' => 'teacher',
                'name' => 'teacher',
                'title' =>  Lang::get('label.teacher')
            ],
            [
                'data' => 'created_at',
                'name' => 'created_at',
                'title' =>  Lang::get('label.date')
            ],
            [
                'data' => 'replied',
                'name' => 'replied',
                'title' =>  Lang::get('label.reply')
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
        
        return view('admin.proofreading.index', compact('html'));
    
    }

    public function new()
    {   
        $admin_id = Auth::user()->id;
        Admin::find($admin_id)->notifications()->where('type', 'App\\Notifications\\Admin\\NewProofReadingNotification')->delete();

        $teachers = Admin::where('type', 'teacher')->where("is_active", 1)->get();
        $proofreadings = ProofReading::where('admin_id', Null)->orderBy('id','DESC')->paginate(10);
        return view('admin.proofreading.new', compact('proofreadings', 'teachers'));
    
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
        $proofreading = ProofReading::find($id);
        $teachers = Admin::where('type', 'teacher')->where("is_active", 1)->get();
        return view('admin.proofreading.show', compact('proofreading', 'teachers'));
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
            'admin_id' => 'required'
        ]);

        $proofreading = ProofReading::find($id);
        $proofreading->admin_id = $request->admin_id;
        $proofreading->save();
        
        //notify teacher
        $teacher = Admin::find($request->admin_id);
        $teacher->notify(new AssignProofReadingNotification($proofreading));
        
        return back()->with('message', Lang::get('label.item_updated'));
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
            ProofReading::find($id)->delete();
        }

        if(!$request->ajax())
        {
            return back();
        }
    }
}
