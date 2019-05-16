<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Curriculum;

class CurriculumController extends Controller
{
    //use App\Curriculum;

 public function index()
    {
        $curriculums = Curriculum::all();
        return view(theme('curriculum.index'), compact('curriculums'));
    }
}
