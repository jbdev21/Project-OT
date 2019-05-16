<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseType;
use Lang;

class CourseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coursetypes = CourseType::orderby('id', 'DESC')->get();
        return view('admin.course_type.index', compact('coursetypes'));
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
        $this->validate($request, [
            'name' => 'required|string|unique:course_types',
            'description' => 'string',
        ]);

        $coursetype = New CourseType;
        $coursetype->name = $request->name;
        $coursetype->description = $request->description;
        $coursetype->save();

        return redirect()->route('admin.coursetype.index')->with('message', Lang::get('label.item_saved'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $coursetype = CourseType::find($id);
        return view('admin.course_type.edit', compact('coursetype'));
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
            'name' => 'required|string|unique:course_types,name,'. $id,
            'description' => 'string',
        ]);

        $coursetype = CourseType::find($id);
        $coursetype->name = $request->name;
        $coursetype->description = $request->description;
        $coursetype->save();

        return redirect()->route('admin.coursetype.index')->with('message', Lang::get('label.saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coursetype = CourseType::find($id);
        $coursetype->delete();

        return redirect()->back()->with('message', Lang::get('label.item_deleted'));
    }
}
