<?php

namespace App\Providers;

//use View;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //dd(auth()->user()->first_name);
        //View::share('buzzi', Auth::user());
//         view()->composer('pages/web', function ($view) {
//            $view->with('buzzi', auth()->user()->first_name);
//        });
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
