<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Faq;
use Lang;

class FaqController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Builder $builder)
    {

        if (request()->ajax()) {
            $faqs = Faq::orderby('id','DESC')->get();
            return DataTables::of($faqs)
                ->addColumn('action', function ($faq) {
                    return '<a href="' . route('admin.faq.edit', $faq->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') . '</a>';
                })
                ->addColumn('check', function ($faq) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $faq->id . '" >';
                })
                ->addColumn('content', function ($faq) {
                    return str_limit($faq->content, 100);
                })
                ->rawColumns(['check', 'action', 'content'])
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
                'data' => 'content',
                'name' => 'content',
                'title' => Lang::get('label.content')
            ],
            [
                'data' => 'category',
                'name' => 'category',
                'title' => Lang::get('label.category')
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
        return view('admin.faq.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            'category' => 'required'
        ]);

        $faq = new faq;
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->category = $request->category;

        $faq->save();

        return redirect()->route('admin.faq.index')->with('message', Lang::get('label.item_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.edit', compact('faq'));
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
            'category' => 'required'
        ]);

        $faq = Faq::find($id);
        $faq->title = $request->title;
        $faq->content = $request->content;
        $faq->category = $request->category;

        $faq->save();

        return redirect()->route('admin.faq.index')->with('message', Lang::get('label.item_updated'));
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
                $class = Faq::find($id)->delete();
            }

            return redirect()->back()->with('message', Lang::get('label.item_deleted')); 
        
        }else{

            return redirect()->back();
        
        }
        
    }
}
