<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
         Auth::resolveUsersUsing(function ($guard = null) {
            if( is_null($guard) ){
                if( Auth::guard('admin')->check()) return Auth::guard('admin')->user();
                else if( Auth::guard('user')->check()) return Auth::guard('user')->user();
            }
            return Auth::guard($guard)->user();
        });
        //
    }
}
