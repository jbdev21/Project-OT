<?php

namespace App\Http\Controllers\API\Student;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    function validateUsername(Request $request)
    {
        $username = $request->username;
        $student = User::where('username', $username)->where('email', $email)->first();
        if($student)
        {
            return $student->id;
        }else{
            return 0;
        }
    }

    function saveNewPassword(Request $request)
    {

        $student = User::find($request->student_id);
        $student->password = bcrypt($request->password);
        $student->save();
        return $student;
        
    }
}
