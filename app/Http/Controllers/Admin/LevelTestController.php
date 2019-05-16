<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Lang;
use App\Book;
use App\Admin;
use App\LevelTest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\Notifications\AssignLevelTestNotification;

class LevelTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $noti = Auth::user()->notifications()->where('type', 'App\Notifications\Admin\NewLeveltestNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

        $teachers = Admin::where('type', 'teacher')->where("is_active", 1)->get();
        $leveltests = LevelTest::where('admin_id', null)->orderby('id','DESC')->paginate(10);
        return view('admin.leveltest.new', compact('leveltests', 'news', 'teachers'));
    }
    
    public function index(Builder $builder)
    {
        
         if (request()->ajax()) {
                $leveltests = LevelTest::with('user')->where('admin_id', '!=', NULL)->orderBy('date', 'DESC')->get();
                    return DataTables::of($leveltests)
                     ->addColumn('show', function ($leveltest) {
                        return '<a href="' . route('admin.leveltest.show', $leveltest->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') .'</a> ';
                     })

                     //query for name
                     ->addColumn('name', function ($leveltest) {
                        return $leveltest->name . '<br>' . $leveltest->korean_name;
                     })

                     ->addColumn('check', function ($leveltest) {
                        return '<input type="checkbox" name="item_checked[]" value="' . $leveltest->id . '" >';
                     })
                     ->addColumn('date', function ($leveltest) {
                        return  date_formater('date_format', $leveltest->date);
                     })

                     ->addColumn('time', function ($leveltest) {
                        return  date_formater('time_format', $leveltest->time);
                     })

                     ->addColumn('teacher', function ($leveltest) {
                        return $leveltest->admin ? $leveltest->admin->name : "";
                     })
                     
                     ->addColumn('status', function ($leveltest) {
                        
                        if($leveltest->status == "present")
                        {
                            $color = "green";
                        }else if($leveltest->status == "absent")
                        {
                            $color = "red";
                        }else{
                            $color = "";
                        }

                        return "<span style='color:$color'>" . Lang::get('label.' . $leveltest->status) . "</span>";
                     })

                    ->rawColumns(['name', 'show', 'check', 'date_time', 'teacher', 'status'])
                    ->make(true);
        }
           $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                        ],
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
                             'title' => Lang::get('label.student')
                        ],
                         [
                             'data' => 'mobile',
                             'name' => 'mobile', 
                             'title' => Lang::get('label.mobile')
                        ],
                        [
                            'data' => 'type',
                             'name' => 'type', 
                             'title' => Lang::get('label.type')
                        ],
                        [
                            'data' => 'time', 
                            'name' => 'time', 
                            'title' => Lang::get('label.time')
                        ],
                        [
                            'data' => 'date', 
                            'name' => 'date', 
                            'title' => Lang::get('label.date')
                        ],
                        [
                            'data' => 'self_assesment',
                            'name' => 'self_assesment',
                            'title' => '연령대'
                        ],
                        [
                            'data' => 'age_group',
                            'name' => 'age_group',
                            'title' => '자가레벨'
                        ],
                        
                        [
                            'data' => 'teacher', 
                            'name' => 'teacher', 
                            'title' => Lang::get('label.teacher')
                        ],
                        [
                            'data' => 'status', 
                            'name' => 'status', 
                            'title' => Lang::get('label.status')
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
                
        return view('admin.leveltest.index', compact('html'));
    }

    public function assign(Request $request)
    {
        $this->validate($request, [
            'leveltest_id' => 'required',
            'teacher_id' => 'required'
        ]);
        ///return $request->teacher_id;
        $id = $request->leveltest_id;
        $leveltest = LevelTest::find($id);
        $leveltest->admin_id = $request->teacher_id;
        $leveltest->is_new = 0;
        $leveltest->save();

        $teacher = Admin::find($request->teacher_id);
        $teacher->notify(new AssignLevelTestNotification($leveltest)); 

        return redirect()->back()->with('message', Lang::get('label.item_updated'));
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


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request, $id)
    {
        
        $leveltest = LevelTest::find($id);

        if($request->read)
        {
            if(!$leveltest)
            {
                Auth::user()->notifications()->where('id', $request->read)->first()->delete();
                return redirect()->route('admin.leveltest.index');
            }    
        }

        $teachers = Admin::where('type', 'teacher')->where("is_active")->get();
        $books = Book::where('available', 1)->get();
        return view('admin.leveltest.show', compact('leveltest', 'teachers', 'books'));
    }

 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        $leveltest = Leveltest::findOrFail($id);
        $leveltest->status = $request->status;
        $leveltest->comment = $request->comment;
        $leveltest->comprehension = $request->comprehension;
        $leveltest->comprehension_comment = $request->comprehension_comment;
        $leveltest->pronounciation = $request->pronounciation;
        $leveltest->pronounciation_comment = $request->pronounciation_comment;
        $leveltest->fluency = $request->fluency;
        $leveltest->fluency_comment = $request->fluency_comment;
        $leveltest->vocabulary = $request->vocabulary;
        $leveltest->vocabulary_comment = $request->vocabulary_comment;
        $leveltest->grammar = $request->grammar;
        $leveltest->grammar_comment = $request->grammar_comment;
        $leveltest->type = $request->type;
        $leveltest->admin_id = $request->teacher;
        $leveltest->is_new = 0;
        $leveltest->book_id = $request->book_id;
        $leveltest->date = $request->date;
        $leveltest->time = $request->time;
        $leveltest->self_assesment = $request->self_assesment;
        $leveltest->save();

        return redirect()->route('admin.leveltest.index')->with('message', '저장완료');
    }

 
    public function destroy(Request $request, $id)
    {
       $ids = $request->item_checked;
        if($request->to_not_new)
        {   
            if(count($ids) > 0){
                foreach($ids as $id){
                    $leveltest = LevelTest::find($id);
                    $leveltest->delete();
                }
    
                return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
            
            }else{
                return redirect()->back();
            }
        }else{

            if(count($ids) > 0){
                foreach($ids as $id){
                    $leveltest = LevelTest::find($id);
                    $leveltest->delete();
                }
    
                return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
            
            }else{
                return redirect()->back();
            }
        }
    }
}
