<?php

namespace App\Http\Controllers\Auth\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use DateTime;
use DateTimeZone;
use Config;

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
    protected $redirectTo = 'admin/dashboard';


    public function showLoginForm()
    {
        fixMissingSession();
        return view('admin.auth.login');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        if($request->user()->type == "teacher")
        {
            $url = '/teacher/login';

        }else{
            $url = '/admin/login';
        }

        $this->guard("admin")->logout();
        
        $request->session()->invalidate();

        return redirect($url);
    }

      public function login(Request $request)
    {
        $this->validateLogin($request);


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        
         return $this->sendFailedLoginResponse($request);
    }

     protected function authenticated(Request $request, $user)
    {   
        // \\Log::info("ahaha");
        // $user = User::find($user->id);
        if($user->type == "administrator")
        {
            date_default_timezone_set(setting('admin_timezone'));
            $date = new DateTime(); // USER's timezone
            $date->setTimezone(new DateTimeZone(setting('admin_timezone')));
            $user->last_login = $date->format('Y-m-d H:i:s');
            
        }else{
            
            date_default_timezone_set(setting('teacher_timezone'));
            $date = new DateTime(); // USER's timezone
            $date->setTimezone(new DateTimeZone(setting('teacher_timezone')));
            $user->last_login = $date->format('Y-m-d H:i:s');
        
        }

        $user->save();
        
    }

    public function username()
    {
        return 'username';
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }
}
