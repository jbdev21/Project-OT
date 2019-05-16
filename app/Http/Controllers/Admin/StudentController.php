<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Lang;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // $students = User::orderby('id','DESC')->paginate(10);
        // return view('admin.student.index', compact('students'));

         if (request()->ajax()) {
                $users = User::where('id', '>', 0); 
                    return DataTables::of($users)
                     ->addColumn('action', function ($user) {
                        return '<a href="' . route('admin.student.edit', $user->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit').'</a>';
                     })
                     ->addColumn('check', function ($user) {
                        return '<input type="checkbox" name="item_checked[]" value="' . $user->id . '" >';
                     })
                    //  ->addColumn('name', function ($user) {
                    //     return $user->name . '<br>'. $user->korean_name;
                    //  })
                     
                    //  ->addColumn('gender', function ($user) {
                    //     return strtoupper($user->gender);
                    //  })
                    //  ->addColumn('created_at', function ($user) {
                    //     return date_formater('date_time_format', $user->created_at);
                    //  })
                    //   ->addColumn('contacts', function ($user) {
                    //     return $user->contact_number . '<br>' . $user->contact_number1;
                    //  })
                    //  ->addColumn('last_login', function ($user) {
                    //     return $user->last_login ? date_formater('date_time_format', $user->last_login)  : "--- -- --";
                    //  })
                     ->rawColumns(['action', 'check'])
                   ->make(true);
            }

         $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                        ],
                        'order' => [[10, "DESC"]]
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
                            'data' => 'korean_name', 
                            'name' => 'korean_name', 
                            'title' => Lang::get('label.korean_name')
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
                            'data' => 'contact_number', 
                            'name' => 'contact_number', 
                            'title' => Lang::get('label.contact_number')
                        ],
                        [
                            'data' => 'contact_number1', 
                            'name' => 'contact_number1', 
                            'title' => ""
                        ],
                        [
                            'data' => 'gender', 
                            'name' => 'gender', 
                            'title' => Lang::get('label.gender')
                        ],
                        [
                            'data' => 'dob', 
                            'name' => 'dob', 
                            'title' => Lang::get('label.date_of_birth')
                        ],
                        [
                            'data' => 'created_at', 
                            'name' => 'created_at', 
                            'title' => "등록일"
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
         return view('admin.student.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.student.create');
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
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'korean_name' => 'required', 
            //'contact_number' => 'required|unique:users',
           // 'dob' => 'required|date',
            'gender' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $student = new User;
        $student->username = $request->username;
        $student->name = $request->name;
        $student->korean_name =  $request->korean_name;
        $student->contact_number =  $request->contact_number;
        $student->contact_number1 =  $request->contact_number1;
        $student->dob =  $request->dob;
        $student->gender =  $request->gender;
        $student->email =  $request->email;
        $student->password =  bcrypt($request->password);

        $student->save();

        return redirect()->route('admin.student.index')->with('message',Lang::get('label.item_saved'));
    }

    function importTestimonial()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes

        $json = file_get_contents(config_path('testimonials.json'));
        $array = array();
        foreach( json_decode($json) as $data)
        {
            $testimonial = new \App\Testimonial;
            $testimonial->user_id = rand(1, 4511);
            $testimonial->message = '<h2>'. $data->subject . '</h2>' . $data->content;
            $testimonial->is_show = 1;
            $testimonial->created_at = $data->created_at;
            $testimonial->save();
        }

        return "okay";
    }

    function json(Request $request)
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes

        $json = file_get_contents(config_path('student'. $request->no .'.json'));
        $array = array();
        //return json_decode($json);
        foreach( json_decode($json) as $data)
        {
            
            if($data->username == "ontalkman" || strpos($data->username, 'teacher') !== false){
                    // no code for this
            }else{
                $check = User::where('username', $data->username)->exists();
                if(!$check){
                    $student = new User;
                    $student->username = $data->username;
                    $student->name = $data->name;
                    $student->korean_name = $data->korean_name;
                    $student->email = $data->email;
                    $student->contact_number = $data->contact_number;
                    $student->contact_number1 = $data->contact_number1;
                    $student->dob = '2000-05-01';
                    $student->gender =  $data->gender == "F" ? 'female'  : 'male';
                    $student->remarks =  $data->remarks;
                    
                    $student->password = Hash::make($data->username . '1234');
                    $student->save();
                }
            }

        }

        return redirect()->route('admin.student.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::findorFail($id);
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        return view('admin.student.edit', compact('student'));
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
       $this->validate($request,[
            'username' => 'required|string|max:255|unique:users,username,' .$id,
            'name' => 'required|string|max:255',
            //'email' => 'nullable|string|email|max:255|unique:users,email,' .$id,
            'korean_name' => 'required', 
            //'contact_number' => 'required|unique:users,contact_number,' . $id,
           // 'dob' => 'required|date',
            'gender' => 'required',
        ]);

        $student = User::find($id);
        $student->username = $request->username;
        $student->name = $request->name;
        $student->korean_name =  $request->korean_name;
        $student->contact_number =  $request->contact_number;
        $student->contact_number1 =  $request->contact_number1;
        $student->dob =  $request->dob;
        $student->gender =  $request->gender;
        $student->email =  $request->email;
        $student->remarks =  $request->remarks;
        $student->discount_amount =  $request->discount_amount;
        $student->discount_type =  $request->discount_type;
        $student->discount_reason =  $request->discount_reason;

        if($request->password){
            $student->password =  bcrypt($request->password);
        }

        $student->save();

        return redirect()->route('admin.student.index')->with('message', Lang::get('label.item_updated'));
    }

    function updateremarks(Request $request, $id)
    {
        $student = User::find($id);
        $student->remarks = $request->remarks;
        $student->save();

        return redirect()->back()->with('message', Lang::get('label.item_updated'));
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
                $class = User::find($id)->delete();
            }

            return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
        
        }else{
            return redirect()->back();
        }
        
    }

}
