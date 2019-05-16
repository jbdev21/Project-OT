<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NotificationAutoDeleteMiddleware
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
        //get the last 15
        $lastest = $request->user()->notifications()->orderBy('created_at','DESC')->take(100)->pluck('id');
        
        //delete all notification what was not on those 15 above
        $request->user()->notifications()->whereNotIn('id', $lastest)->delete();
        
        return $next($request);
    }
}
