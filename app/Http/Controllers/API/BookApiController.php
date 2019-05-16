<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Classer;

class BookApiController extends Controller
{
    function preview(Request $request,$id)
    {
        if($id){
            return Book::find($id)->page()->paginate(1);
        }
    }

    function all()
    {
        return Book::where('available', 1)->get();
    }

    function updateClassBook(Request $request)
    {
        $class = Classer::find($request->class_id);
        $class->book_id = $request->book_id;
        $class->page = $request->page;
        $class->save();
    }
}
