<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Curriculum;
use App\Book;
use Image;
use Auth;
use Lang;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {
            $curriculums = Curriculum::orderby('id','DESC')->get();
            return DataTables::of($curriculums)
                ->addColumn('action', function ($curriculum) {
                    return '<a href="' . route('admin.curriculum.edit', $curriculum->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> ' . Lang::get('button.edit') . '</a>';
                })
                ->addColumn('check', function ($curriculum) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $curriculum->id . '" >';
                })
                 ->addColumn('message', function ($curriculum) {
                    return str_limit($curriculum->message, 150);
                })
                ->addColumn('books', function ($curriculum) {
                    return $curriculum->books ? $curriculum->books()->count() : "";
                })
                ->rawColumns(['check', 'action', 'message'])
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
                'title' => Lang::get('label.title')
            ],
            [
                'data' => 'books', 
                'name' => 'books', 
                'title' => Lang::get('label.books')
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
        return view('admin.curriculum.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books =  Book::all();
        return view('admin.curriculum.create', compact('books'));
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
            'name' => 'required',
        ]);

        $curriculum =  new Curriculum;
        $curriculum->name = $request->name;
        
          if($request->hasFile('picture')){
            //for image upload 
            $image = $request->file('picture');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            $destinationPath = www_path('curriculum');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$input['imagename']);
            $uploaded_image = $input['imagename'];
            
            $curriculum->picture = 'curriculum/'. $uploaded_image;
        
        }else{
            $curriculum->picture = Null;
        }

        $curriculum->save();

        $curriculum->books()->attach($request->books);

        return redirect()->route('admin.curriculum.index')->with('message', Lang::get('label.item_saved'));
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
        $curriculum = Curriculum::find($id);
        $books =  Book::all();
        return view('admin.curriculum.edit', compact('curriculum', 'books'));
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
            'name' => 'required',
        ]);

        $curriculum =  Curriculum::find($id);
        $curriculum->name = $request->name;
        
          if($request->hasFile('picture')){
            //for image upload 
            $image = $request->file('picture');

            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
         
            $destinationPath = www_path('curriculum');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$input['imagename']);
            $uploaded_image = $input['imagename'];
            
            $curriculum->picture = 'curriculum/'. $uploaded_image;
        
        }

        $curriculum->save();

        $curriculum->books()->detach();

        $curriculum->books()->attach($request->books);

        return redirect()->route('admin.curriculum.index')->with('message', Lang::get('label.item_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->item_checked;
        if(count($ids)){
            foreach($ids as $id){
                $curriculum = Curriculum::find($id);
                $curriculum->delete();
            }
        }
        return redirect()->back()->with('message', Lang::get('label.item_deleted'));
    }
}
