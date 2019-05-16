<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\ClassSession;
use App\User;

class DashboardController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }
    
    function index()
    {
    	return view('student.dashboard');
    }
}
