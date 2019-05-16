<?php

namespace App\Http\Controllers\API\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class TeacherApiController extends Controller
{
    function index()
    {
        return Admin::select('name', 'id', 'username')->where('type', 'teacher')->where("is_active", 1)->get();
    }
}
