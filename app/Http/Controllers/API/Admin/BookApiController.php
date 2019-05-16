<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Classer;

class BookApiController extends Controller
{
    function index()
    {
        return Book::all();
    }

    function show($id)
    {

    }


    function updateClassBook(Request $request, $class_id)
    {
        //get class info for book
        $class = Classer::find($class_id);
        $class->book_id = $request->book_id;
        $class->save();

        //get number pages of books
        $book = Book::find($request->book_id);
        $pages = $book->number_of_pages - $book->starting;
        return $pages;
    }

    function updateClassBookPage(Request $request, $class_id)
    {
        //get class info for book
        $class = Classer::find($class_id);
        $class->page = $request->page;
        $class->save();

        // //get number pages of books
        // $book = Book::find($request->book_id);
        // $pages = $book->number_of_pages - $book->starting;
        // return $pages;
    }
}
