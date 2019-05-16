<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\User;
use DateTime;
use DateTimeZone;


class LoginController extends Controller
{


    use AuthenticatesUsers;
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $redirectTo = '/dashboard/class';

    
    public function showLoginForm()
    {
        fixMissingSession();
        return view(theme('auth.login'));
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function authenticated(Request $request, $user)
    {   
        //date_default_timezone_set(setting('student_timezone'));
        $date = new DateTime(); // USER's timezone
        $date->setTimezone(new DateTimeZone(setting('student_timezone')));
        $user->last_login = $date->format('Y-m-d H:i:s');

        $user->save();
    }

    
    public function username()
    {
        return 'username';
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        if ($request->ajax()) {
            if($this->authenticated($request, $this->guard()->user())){
                $date = new DateTime(); // USER's timezone
                $date->setTimezone(new DateTimeZone(setting('student_timezone')));
                $user->last_login = $date->format('Y-m-d H:i:s');
                $user->save();
            }

            return response()->json($this->guard()->user(), 200);
        }
        
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
