<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Blog;
use Auth;
use Lang;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Builder $builder)
    {

        if (request()->ajax()) {
            $blogs = Blog::has('admin')->orderby('id','DESC');
            return DataTables::of($blogs)
                ->addColumn('action', function ($blog) {
                    return '<a href="' . route('admin.blog.edit', $blog->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '.Lang::get('button.edit').'</a>
                            <a href="' . route('blog.show', $blog->slug) . '" target="_blank" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '.Lang::get('button.view').'</a>';
                })
                ->addColumn('check', function ($blog) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $blog->id . '" >';
                })
                // ->addColumn('content', function ($blog) {
                //     return str_limit($blog->content, 200);
                // })
                // ->addColumn('author', function ($blog) {
                //     return $blog->admin->name;
                // })
                ->addColumn('feature', function ($blog) {
                    if($blog->on_top){
                        return '<a href="' . route('admin.blog.totop', $blog->id) . '"><i class="fa fa-star"></i></a>';
                    }else{
                        return '<a href="' . route('admin.blog.totop', $blog->id) . '"><i class="fa fa-star-o"></i></a>';
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
        return view('admin.blog.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'title' => 'required|string',
            'content' => 'required',
        ]);

        $blog = new Blog;
        $blog->admin_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->is_published = $request->is_published;
        $blog->slug = time();

        $blog->save();

        return redirect()->route('admin.blog.index')->with('message', Lang::get('label.item_saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.show', compact('blog'));
    }


    public function updateTop($id)
    {
        $blog = Blog::find($id);
        $blog->on_top =  !$blog->on_top;
        $blog->save();
        return back();
    }

    
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
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
            'title' => 'required|string',
            'content' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->is_published = $request->is_published;

        $blog->save();

        return redirect()->route('admin.blog.index')->with('message', Lang::get('label.item_updated'));
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
                $class = Blog::find($id)->delete();
            }

            return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
        
        }else{
            return redirect()->back();
        }
        
    }
}
