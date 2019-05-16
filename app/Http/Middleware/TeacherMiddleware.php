<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class TeacherMiddleware
{
     protected  $auth;


    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if($request->ajax()) {
                return response('Unauthorize.', 401);
            }else {
                return redirect()->guest('admin/login');
            }
        }else{
            if($this->auth->user()->type == "teacher"){
                return $next($request);
            }else{
                //die('Not Accreditor');
                if($this->auth->user()->type == "teacher") {
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect('admin/login');
                }   
            }
        }
    }
}
