<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Admin;
use App\Team;
use Lang;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // $teachers = Admin::where('type', 'teacher')->orderby('id', 'DESC')->paginate(10);
        // return view('admin.teacher.index', compact('teachers'));
        if (request()->ajax()) {
                $teachers = Admin::where('type', 'teacher')->get(); 
                    return DataTables::of($teachers)
                     ->addColumn('action', function ($user) {
                        return '<a href="' . route('admin.teacher.edit', $user->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') .'</a>';
                     })
                     ->addColumn('check', function ($user) {
                        return '<input type="checkbox" name="item_checked[]" value="' . $user->id . '" >';
                     })
                     ->addColumn('last_login', function ($user) {
                        return $user->last_login ? date_formater('date_time_format', $user->last_login)  : "--- -- --";
                     })
                     ->addColumn('is_active', function ($user) {
                        return $user->is_active ? "<i class='fa fa-check'></i>" : "";
                     })
                    ->rawColumns(['check', 'action', 'last_login', 'is_active'])
                   ->make(true);
            }

            $html = $builder
                        ->parameters([
                            'language' => [
                                'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                            ],
                            'pageLength' => 25,
                            'order' => [[1, 'ASC']]
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
                            'data' => 'username', 
                            'name' => 'username', 
                            'title' => Lang::get('label.username')
                        ],
                        [
                            'data' => 'name', 
                            'name' => 'name', 
                            'title' => Lang::get('label.name')
                        ],
                        [
                            'data' => 'email', 
                            'name' => 'email', 
                            'title' => Lang::get('label.email')
                        ],
                        [
                            'data' => 'gender', 
                            'name' => 'gender', 
                            'title' => Lang::get('label.gender')
                        ],
                        [
                            'data' => 'dob', 
                            'name' => 'dob', 
                            'title' => Lang::get('label.birth_date')
                        ],
                        [
                            'data' => 'is_active', 
                            'name' => 'is_active', 
                            'title' => "근무상태"
                        ],
                         [
                            'data' => 'last_login',
                            'name' => 'last_login',
                            'title' => '최종접속',
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

            return view('admin.teacher.index', compact('html'));
    }

    public function datatable(Builder $builder)
    {
       // $teachers = Admin::where('type', 'teacher')->get(); 
       // return Datatables::of($teachers)
       //  ->addColumn('action1', function ($user) {
       //          $checkbox =  '<input type="checkbox" name="item_checked[]" value="' . $user->id . '" >';

       //      })
       //  ->addColumn('action', function ($user) {
       //          return '<a href="' . route('admin.teacher.edit', $user->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
       //      })
       //  ->make(true); 

            if (request()->ajax()) {
                $teachers = Admin::where('type', 'teacher')->get(); 
                    return Datatables::of($teachers)
                     ->addColumn('action', function ($user) {
                        return '<a href="' . route('admin.teacher.edit', $user->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                     })
                    
                   ->make(true);
            }

            $html = $builder->columns([
                       
                        ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
                        ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
                        ['data' => 'gender', 'name' => 'gender', 'title' => 'Gender'],
                        ['data' => 'dob', 'name' => 'dob', 'title' => 'BirthDate At'],
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

            return view('admin.teacher.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.teacher.create');
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
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'contact_number' => 'nullable|unique:admins',
            'gender' => 'required',
            'dob' => 'date|required',
            'email'=> 'unique:admins|nullable',
            'password' => 'required|confirmed|min:6'
        ]);

        $teacher = new Admin;
        $teacher->name = $request->name;
        $teacher->username = $request->username;
        $teacher->contact_number = $request->contact_number;
        $teacher->type = "teacher";
        $teacher->gender = $request->gender;
        $teacher->dob = $request->dob;
        $teacher->email = $request->email;
        $teacher->is_active = $request->is_active ? 1 : 0;
        $teacher->password = bcrypt($request->password);
        $teacher->save();

        return redirect()->route('admin.teacher.index')->with('message', Lang::get('label.item_saved'));
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
        $teacher = Admin::find($id);
        return view('admin.teacher.edit', compact('teacher'));
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
            'name' => 'required|string|max:100',
            'username' => 'required|string|max:100',
            'contact_number' => 'nullable|unique:admins,contact_number,' . $id,
            'gender' => 'required',
            'dob' => 'date|required',
            'email'=> 'nullable|email|unique:admins,email,' . $id,
        ]);

        $teacher = Admin::find($id);
        $teacher->name = $request->name;
        $teacher->username = $request->username;
        $teacher->contact_number = $request->contact_number;
        $teacher->type = "teacher";
        $teacher->gender = $request->gender;
        $teacher->dob = $request->dob;
        $teacher->email = $request->email;
        $teacher->is_active = $request->is_active ? 1 : 0;

        if($request->password){
            $teacher->password = bcrypt($request->password);
        }

        $teacher->save();

        return redirect()->route('admin.teacher.index')->with('message', Lang::get('label.item_updated'));
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
                $teacher = Admin::find($id);
                $teacher->note()->delete();
                $teacher->delete();
            }

            return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
        
        }else{
            return redirect()->back();
        }
        
    }

     function messenger(Request $request)
     {
        if($request->sample){
             return view('admin.teacher.chat');
        }else{
             $teams = Team::all();
             $teachers = Admin::where('type', 'teacher')->orderby('name')->get();
             return view('admin.teacher.messenger', compact('teachers', 'teams'));
        }
     }
}
