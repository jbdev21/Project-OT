<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Notifications\StudentEnrolled;
use App\PopUp;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popup = PopUp::whereDate('date_start','=>', date('Y-m-d'))->first();
        return view('home', compact('popup'));
    }

    public function sendnoti()
    {
        $admin_to_notify = Admin::find(1);
        $user = User::find(Auth::user()->id);
        $admin_to_notify->notify(new StudentEnrolled($user));
    }

    

}
