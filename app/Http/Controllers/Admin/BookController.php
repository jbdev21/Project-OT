<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Book;
use App\BookPage;
use Lang;
use DB;

class BookController extends Controller
{
    public function index(Builder $builder)
    {
         if (request()->ajax()) {
            $books = DB::table('books');
            return DataTables::of($books)
                ->addColumn('action', function ($book) {
                    return '<a href="' . route('admin.book.show', $book->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> '. Lang::get('button.preview') .'</a>
                    <a href="' . route('admin.book.edit', $book->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') .'</a>
                    ';
                })

                ->addColumn('check', function ($book) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $book->id . '" >';
                })
                ->addColumn('pages', function ($book) {
                    return $book->starting . "-" . $book->number_of_pages;
                })

                ->addColumn('page_code', function ($book) {
                    return '<code>' . $book->page_code . '</code>';
                })

                ->addColumn('availability', function ($book) {
                    return $book->available == 1 ? '<i class="fa fa-check"></i>' : "";
                })

                ->rawColumns(['check', 'action','page_code','pages', 'availability'])
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
                'data' => 'location', 
                'name' => 'location', 
                'title' => Lang::get('label.location')
            ],
            [
                'data' => 'pages', 
                'name' => 'pages', 
                'title' => Lang::get('label.pages')
            ],
            [
                'data' => 'page_code', 
                'name' => 'page_code', 
                'title' => Lang::get('label.page_code')
            ],
            
            [
                'data' => 'type', 
                'name' => 'type', 
                'title' => Lang::get('label.type')
            ],
            [
                'data' => 'availability', 
                'name' => 'availability', 
                'title' => Lang::get('label.available')
            ],
            [
                'data'           => 'action',
                'name'           => 'action',
                'title'          => Lang::get('label.action'),
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
            
        
        return view('admin.book.index', compact('html'));
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
            'title' => 'required|max:255',
            'location' => 'required|max:200|url',
            'page_code' => 'required:max:25',
            'starting'  => 'required',
            'number_of_pages' => 'required'
        ]);

        $location = $request->location;
        $page_code = $request->page_code;
        $starting = $request->starting;
        $number_of_pages = $request->number_of_pages;
        $type  = $request->type;

        $book = new Book;
        $book->title = $request->title;
        $book->location = $location;
        $book->page_code = $page_code;
        $book->starting = $starting;
        $book->available = $request->available ? 1 : 0;
        $book->number_of_pages = $number_of_pages;
        $book->type = $type;

       $book->save();

        $page_number = 1;
        $code_start = $starting;
        for($i = 1; $i <= $number_of_pages; $i++){

             $code = str_pad($code_start, 3, '0', STR_PAD_LEFT);
             $path = $location . '/' . $page_code . $code .'.' . $type;


             $code_start++;

             $page = new BookPage;
             $page->book_id = $book->id;
             $page->page_number = $page_number;
             $page->url = $path;
             $page->save();
            $page_number++;
        }

        return redirect('admin/book')->with('message', Lang::get('label.item_saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', compact('book'));
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
            'title' => 'required|max:255',
            'location' => 'required|max:200',
            'page_code' => 'required:max:25',
            'starting'  => 'required',
            'number_of_pages' => 'required'
        ]);

        $location = $request->location;
        $page_code = $request->page_code;
        $starting = $request->starting;
        $number_of_pages = $request->number_of_pages;
        $type  = $request->type;

        $book = Book::find($id);
        $book->title = $request->title;
        $book->location = $location;
        $book->page_code = $page_code;
        $book->starting = $starting;
        $book->available = $request->available ? 1 : 0;
        $book->number_of_pages = $number_of_pages;
        $book->type = $type;

       $book->save();
       $book->page()->delete();

        $page_number = 1;
        $code_start = $starting;
        for($i = 1; $i <= $number_of_pages; $i++){

             $code = str_pad($code_start, 3, '0', STR_PAD_LEFT);
             $path = $location . '/' . $page_code . $code .'.' . $type;


             $code_start++;

             $page = new BookPage;
             $page->book_id = $book->id;
             $page->page_number = $page_number;
             $page->url = $path;
             $page->save();
            $page_number++;
        }

        return redirect('admin/book')->with('message', Lang::get('label.item_updated'));
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
                $book = Book::find($id);
                $book->page()->delete();
                $book->delete();
            }
        }
        return redirect()->back()->with('message', Lang::get('label.item_deleted'));

    }
}
