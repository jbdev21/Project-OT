<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;

class SettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!$request->session()->has('settings'))
        {
           $settings = Setting::pluck('value','key')->all();
           $request->session()->put("settings", $settings);
        }
        //$request->session()->forget('settings');
        return $next($request);
    }
}
