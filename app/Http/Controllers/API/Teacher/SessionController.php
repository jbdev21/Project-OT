<?php

namespace App\Http\Controllers\API\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassSession;
use App\Mistake;

class SessionController extends Controller
{
    function all($id)
    {
       return  $mistakes = ClassSession::find($id)->mistake()->orderBy('id','DESC')->get();
    }

    function store(Request $request)
    {
        $correction = new Mistake;
        $correction->class_session_id = $request->session_id;
        $correction->mistake_body = $request->mistake;
        $correction->correction = $request->correction;
        $correction->save();
        return $correction;
    }

    function update(Request $request)
    {
        $correction = Mistake::find($request->session_id);
        $correction->mistake_body = $request->mistake;
        $correction->correction = $request->correction;
        $correction->save();
        return $correction;
    }

    function destroy(Request $request, $id)
    {
        $correction = Mistake::find($id);
        $correction->delete();

        if(!$request->ajax())
        {
            return back();
        }
    }
}
