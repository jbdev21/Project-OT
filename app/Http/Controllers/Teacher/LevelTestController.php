<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\LevelTest;
use App\LevelTestMistake;
use App\Book;
use Auth;

class LevelTestController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('teacher_timezone'));
    }
    
    public function index(Builder $builder)
    {
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\AssignLevelTestNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }
         // return $leveltests = LevelTest::with('user')->with('admin')->get();
         if (request()->ajax()) {
            $leveltests = Auth::user()->leveltest()->orderby('date', 'ASC')->get();
                    
            return DataTables::of($leveltests)
             ->addColumn('show', function ($leveltest) {
                return '<a href="' . route('teacher.leveltest.show', $leveltest->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a>';
             })

             ->addColumn('name', function ($leveltest) {
                return $leveltest->name . '<br>' . $leveltest->korean_name;
             })

             ->addColumn('date', function ($leveltest) {
                return  date_formater('date_format', $leveltest->date);
             })

             ->addColumn('status', function ($leveltest) {
                return  strtoupper($leveltest->status);
             })

             ->addColumn('time', function ($leveltest) {
                return  date_formater('time_format', $leveltest->time);
             })

            ->rawColumns(['name','mobile', 'type', 'time', 'date', 'show', 'status'])
            ->make(true);

        }

           $html = $builder->columns([
                      
                        [
                             'data' => 'name',
                             'name' => 'name', 
                             'title' => 'Student',
                        ],
                         [
                             'data' => 'mobile',
                             'name' => 'mobile', 
                             'title' => 'Mobile',
                        ],
                        [
                            'data' => 'type',
                             'name' => 'type', 
                             'title' => 'Type',
                        ],
                        [
                            'data' => 'time', 
                            'name' => 'time', 
                            'title' => 'Time',
                        ],
                        [
                            'data' => 'date', 
                            'name' => 'date', 
                            'title' => 'Date',
                        ],
                        [
                            'data' => 'self_assesment',
                            'name' => 'self_assesment',
                            'title' => 'Assesment'
                        ],
                        [
                            'data' => 'age_group',
                            'name' => 'age_group',
                            'title' => 'Group'
                        ],
                        [
                            'data' => 'status', 
                            'name' => 'status', 
                            'title' => 'Status',
                        ],
                        [
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
        return view('teacher.leveltest.index', compact('html', 'todays'));
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
    public function show(Request $request, $id)
    {
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\AssignLevelTestNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }
        
        $leveltest = Auth::user()->leveltest()->where('id', $id)->first();
        
        if($request->read)
        {
            if(!$leveltest)
            {
                Auth::user()->notifications()->where('id', $request->read)->first()->delete();
                return redirect()->route('teacher.leveltest.index');
            }    
        }

        $books = Book::where('available', '1')->orderBy('title')->get();
        if($leveltest)
        {
            return view('teacher.leveltest.show', compact("leveltest", 'books'));
        }else{
            return redirect()->route('teacher.leveltest.index');
        }
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

    public function addMistake(Request $request, $id)
    {
        $this->validate($request,[
            'mistake' => 'required',
            'correction' => 'required',
        ]);

        $mistake = new LevelTestMistake;
        $mistake->mistake = $request->mistake;
        $mistake->correction = $request->correction;
        $mistake->admin_id = Auth::user()->id;
        $mistake->level_test_id = $id;

        $mistake->save();

        return back();
    }   

    public function deleteMistake($id)
    {
        LevelTestMistake::find($id)->delete();
        return back();
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
            'status' => 'required'
        ]);

        $leveltest = Leveltest::find($id);
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
        $leveltest->book_id = $request->book_id;
        $leveltest->self_assesment = $request->self_assesment;

        $leveltest->rate = 0;
        
        $leveltest->status = $request->status;

        $leveltest->save();


        return back();
        return redirect()->route('teacher.leveltest.index')->with('message', 'Leveltest Changes Saved');
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
