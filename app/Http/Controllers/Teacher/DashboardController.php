<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\LevelTest;
use App\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        date_default_timezone_set(setting('teacher_timezone'));
    }

    public function index(Builder $builder)
    {   
        $today_sessions = Auth::user()->session()->whereHas('classer', function($query){
                            $query->where('status', 'ongoing')->has("user");
                        })  
                        ->whereDate('date_time', date('Y-m-d'))->orderby('date_time','ASC')->get();
        $today_leveltest = LevelTest::where('admin_id', Auth::user()->id)->whereDate('date', date('Y-m-d'))->orderBy('time','DESC')->get();
        return view('teacher.dashboard', compact('today_sessions','today_leveltest'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
