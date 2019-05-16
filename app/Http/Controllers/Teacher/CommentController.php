<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $student_ids = Auth::user()->students();
        //return $student_ids;
        if(count($student_ids)){
            $ids = $student_ids;
        }else{
             $ids = [0];
        }
        
        $students = User::whereIn('id',$ids)->paginate(10);
        return view('teacher.comment.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $student = User::where('username', $request->student)->first();
        $month = $request->month;

        //check 
        $user_comment_with_logged_teacher = $student->comments()->where('month', $month)->where('admin_id', Auth::user()->id)->first();

        if(count($user_comment_with_logged_teacher))
        {   
            $comment = $user_comment_with_logged_teacher;
            return redirect()->route('teacher.comment.edit', $comment->id);
        }else{
            return view('teacher.comment.create', compact('student'));
        }
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
            'user_id' => 'required',
            'message' => 'required',
            'month' => 'required'
        ]);

        $comment = new Comment;
        $comment->user_id =  $request->user_id;
        $comment->message =  $request->message;
        $comment->month =  $request->month;
        $comment->admin_id =  Auth::user()->id;
        $comment->save();

        return redirect()->route('teacher.comment.index')->with('message', ' Comment Save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $comment = Comment::find($id);
        return view('teacher.comment.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('teacher.comment.edit', compact('comment'));
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
            'user_id' => 'required',
            'message' => 'required',
            'month' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->user_id =  $request->user_id;
        $comment->message =  $request->message;
        $comment->month =  $request->month;
        $comment->save();

        return redirect()->route('teacher.comment.index')->with('message', ' Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('teacher.comment.index')->with('message', ' Comment Deleted!');
    }
}
