<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;
use Config;
use DateTime;
use DateTimeZone;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/class';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected function authenticated(Request $request, $user)
    {   
        
        $date = new DateTime(); // USER's timezone
        $date->setTimezone(new DateTimeZone(setting('student_timezone')));
        $user->last_login = $date->format('Y-m-d H:i:s');
        
        $user->save();
    }


     public function showLoginForm()
    {
        return view(theme('auth.login'));
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
