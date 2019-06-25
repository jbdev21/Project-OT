<?php

namespace App\Providers;

use App\User;
use App\Classer;

//for Observers
use App\Holiday;
use App\Inquiry;

use App\LevelTest;
use App\ProofReading;

use App\Observers\UserObserver;
use App\Observers\ClasserObserver;

use App\Observers\HolidayObserver;
use App\Observers\InquiryObserver;
use Illuminate\Support\Collection;
use App\Observers\LevelTestObserver;
use Illuminate\Pagination\Paginator;
use App\Observers\ProofReadingObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema; /// copy this


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); /// copy this

        //for Observers
        LevelTest::observe(LevelTestObserver::class);
        Classer::observe(ClasserObserver::class);
        Inquiry::observe(InquiryObserver::class);
        ProofReading::observe(ProofReadingObserver::class);
        Holiday::observe(HolidayObserver::class);
        User::observe(UserObserver::class);

        if (!Collection::hasMacro('paginate')) {
            Collection::macro('paginate', 
                function ($perPage = 25, $page = null, $options = []) {
                $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
                return (new LengthAwarePaginator(
                    $this->forPage($page, $perPage), $this->count(), $perPage, $page, $options))
                    ->withPath('');
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
