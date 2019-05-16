<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Auth;

class SubClassController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('teacher_timezone'));
    }
    
    public function index(Builder $builder)
    {
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\AssignSubClassNotification')->get();
        
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

        if (request()->ajax()) {
            $classes = Auth::user()->subclass()->where('status', 'ready')->orderby('id','DESC')->get();
            return DataTables::of($classes)
                ->addColumn('show', function ($class) {
                        return '<a href="' . route('teacher.session.show', $class->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
                })
                ->addColumn('name', function ($class) {
                        return $class->classer->user->name . '<br>' . $class->classer->user->korean_name;
                })
                ->addColumn('type', function ($class) {
                    return ucfirst($class->classer->type);
                })
                ->addColumn('date_time', function ($class) {
                     return date_formater('date_time_format',$class->date_time);
                })
                ->addColumn('minute', function ($class) {
                    return $class->classer->minutes .' Min.';
                })
                ->addColumn('teacher', function ($class) {
                    return $class->admin->name;
                })
                ->rawColumns(['show','name','type', 'date_time', 'minute', 'teacher'])
                ->make(true);
        }

        $html = $builder->columns([
                        [
                             'data' => 'name',
                             'name' => 'name', 
                             'title' => 'Name',
                        ],
                        [
                            'data' => 'date_time', 
                            'name' => 'date_time', 
                            'title' => 'Date/Time',
                        ],
                        [
                             'data' => 'minute',
                             'name' => 'minute', 
                             'title' => 'Minute',
                        ],
                        [
                            'data' => 'teacher',
                             'name' => 'teacher', 
                             'title' => 'Original Teacher',
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
       
        return view('teacher.subclass.index', compact('html'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}
