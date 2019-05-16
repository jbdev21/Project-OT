<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProofReading;
use App\Reply;
use Auth;

class ProofReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\AssignProofReadingNotification')->get();

        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

         $proofreadings = Auth::user()->proofreading()->orderBy('id','DESC')->paginate(10);
         return view('teacher.proofreading.index', compact('proofreadings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proofreading = ProofReading::find($id);
        return view('teacher.proofreading.show', compact('proofreading'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'message' => 'required',
        ]);

        $proofreading = ProofReading::find($id);

        $reply = new Reply;
        $reply->message = $request->message;
        $reply->admin_id = Auth::user()->id;

        $proofreading->replies()->save($reply);

        return redirect()->route('teacher.proofreading.show', $proofreading->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $reply = Reply::find($id);
        $reply->delete();

        return back();
    }
}
