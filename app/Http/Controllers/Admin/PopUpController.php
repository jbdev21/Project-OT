<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\PopUp;
use Lang;

class PopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {

        if (request()->ajax()) {
            $popups = PopUp::orderBy('id', 'DESC')->get();
            return DataTables::of($popups)
                ->addColumn('action', function ($popup) {
                    return '<a href="' . route('admin.popup.edit', $popup->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') .'</a>
                    ';
                })

                ->addColumn('check', function ($popup) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $popup->id . '" >';
                })

                 ->addColumn('position', function ($popup) {
                    return Lang::get('label.'. $popup->position);
                })

                ->addColumn('description', function ($popup) {
                    return  str_limit($popup->description, 60);
                })

                ->addColumn('show', function ($popup) {
                    return  $popup->show ? "<i class='fa fa-check'></i>" : "<i class='fa fa-remove'></i>";
                })

                ->rawColumns(['check', 'action','description', 'show'])
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
                'data' => 'description', 
                'name' => 'description', 
                'title' => Lang::get('label.description')
            ],
            [
                'data' => 'position', 
                'name' => 'position', 
                'title' => Lang::get('label.position')
            ],
            [
                'data' => 'show', 
                'name' => 'show', 
                'title' => Lang::get('label.active')
            ],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
            ],

        ])->parameters([
                'buttons' => ['export'],
                "iDisplayLength" => 50
            ]);
            
        
        return view('admin.popup.index', compact('html'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.popup.create');
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
            'title' => 'required',
            'description' => 'required',
            'position' => "required",
            'title_color' => 'required',
            'text_color' => 'required',
            'background_color' => 'required',
            'date_start' => 'required'
        ]);

    
        $popup = new PopUp;
        $popup->title = $request->title;
        $popup->description = $request->description;
        $popup->position = $request->position;
        $popup->title_color = $request->title_color;
        $popup->text_color = $request->text_color;
        $popup->background_color = $request->background_color;
        $popup->button_text = $request->button_text;
        $popup->button_link = $request->button_link;
        $popup->button_color = $request->button_color;
        $popup->button_text_color = $request->button_text_color;
        $popup->date_start = $request->date_start;
        $popup->date_end = $request->date_end;
        $popup->show = $request->show ? 1 : 0;
        $popup->display_load = $request->display_load;

        $popup->save();

        return redirect()->route('admin.popup.index');
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
        $popup = PopUp::find($id);
        return view('admin.popup.edit', compact('popup'));
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
            'title' => 'required',
            'description' => 'required',
            'position' => "required",
            'title_color' => 'required',
            'text_color' => 'required',
            'background_color' => 'required',
            'date_start' => 'required'
        ]);

    
        $popup = PopUp::find($id);
        $popup->title = $request->title;
        $popup->description = $request->description;
        $popup->position = $request->position;
        $popup->title_color = $request->title_color;
        $popup->text_color = $request->text_color;
        $popup->background_color = $request->background_color;
        $popup->button_text = $request->button_text;
        $popup->button_link = $request->button_link;
        $popup->button_color = $request->button_color;
        $popup->button_text_color = $request->button_text_color;
        $popup->date_start = $request->date_start;
        $popup->date_end = $request->date_end;
        $popup->show = $request->show ? 1 : 0;
        $popup->display_load = $request->display_load;

        $popup->save();

        return redirect()->route('admin.popup.index');
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
                $class = PopUp::find($id)->delete();
            }
            return redirect()->back()->with('message',Lang::get('label.item_deleted')); 
        }else{
            return redirect()->back();
        }
    }
}
