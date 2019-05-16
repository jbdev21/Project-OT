<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProofReading;
use App\Admin;
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
        $proofreadings = Auth::user()->proofreading()->orderBy('id','DESC')->paginate(10);
        return view('student.proofreading.index', compact('proofreadings'));
    }

    public function create()
    {

        return view('student.proofreading.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'message' => 'required|string'
        ]);

        $proofreading = new ProofReading;
        $proofreading->user_id = Auth::user()->id;
        $proofreading->message = $request->message;
        $proofreading->save();

        return redirect()->route('dashboard.proofreading.index')->with('message', 'Proof Reading is Set');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proofreading =  proofreading::find($id);
        return view('student.proofreading.show', compact('proofreading'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proofreading =  proofreading::find($id);
        return view('student.proofreading.edit', compact('teachers', 'proofreading'));
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
        $this->validate($request,[
            'proofreading' => 'required|string'
        ]);

        $proofreading = proofreading::find($id);
        $proofreading->message = $request->proofreading;
        $proofreading->save();

        return redirect()->route('dashboard.proofreading.index')->with('message', 'Proof Reading Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proofreading = proofreading::find($id);
        $proofreading->replies()->delete();
        $proofreading->delete();
        return redirect()->route('dashboard.proofreading.index');
    }
}
