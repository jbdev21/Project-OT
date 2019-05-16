<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classer;
use App\Book;
use Auth;

class BookController extends Controller
{

    function index()
    {
      $items = array();

      $classer = Auth::user()->classer()->where('status', 'ongoing')->where('book_id', '!=', Null)->groupBy('book_id')->get();

      foreach($classer as $class){
        if($class->book_id){
          array_push($items,array(
            'book' => $class->book,
            'class' => $class,
            'default_page' => $class->page
          ) 
        );
        }
      }

      if($items){
        
        $havebook = true;
      
      }else{

        array_push($items,array(
            'book' => Book::find(2),
            'default_page' => 1,
            'class' => Null
        ));

        $havebook = false;
      }

    // return compact('items', 'havebook');
      
      return view('student.book.index', compact('items', 'havebook'));
    }

    function show($id)
    {
      $book = Book::find($id);
       return view('student.book.show', compact('book'));
    }


}
