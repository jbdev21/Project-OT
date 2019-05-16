<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    function index(Request $request)
    {
        //class
        if($request->year){
            $year = $request->year;
        }else{
            $year = date('Y');
        }

        if($request->teacher){
            $students = User::whereHas('classSession', function($query) use ($year,$request){
                        $query->whereYear('date_time', $year);
                        $query->whereHas('admin', function($teacher) use ($request){
                            $teacher->where('id',$request->teacher);
                        });
                    })
                    ->paginate(15);
        }else{
            $students = User::whereHas('classSession', function($query) use ($year){
                        $query->whereYear('date_time', $year);
                        $query->where('class_sessions.admin_id', '!=', Null);
                    })->paginate(15);
        }
        
        $teachers = Admin::where('type', 'teacher')->get();
        return view('admin.comment.index', compact('students', 'teachers'));
        
    }

    function show(Request $request, $id)
    {
        $student = User::find($id);
        return view('admin.comment.show', compact('student'));
    }


    function create(Request $request)
    {
        $student = User::find($request->student);
        return view('admin.comment.create', compact('student'));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'month' => 'required',
            'message' => 'required'
        ]);

        $comment = new Comment;
        $comment->user_id = $request->user_id;
        $comment->admin_id = Auth::user()->id;
        $comment->month = $request->month;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('admin.comment.show', [ 'id' => $request->user_id, 'month' => $request->month]);
    }

    function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.edit', compact('comment'));
    }

    function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'month' => 'required',
            'message' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('admin.comment.show', [ 'id' => $request->user_id, 'month' => $request->month]);
    }
    
    function destroy($id)
    {
        Comment::find($id)->delete();
        return back();
    }

}
