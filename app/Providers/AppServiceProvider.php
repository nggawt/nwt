<?php

namespace App\Providers;

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
      
      
        view()->composer(
            ['wellcome','pages.web','dashboard.admin','articles.blog','pages.portfolio','pages.about','pages.contact'],
            'App\Http\ViewComposers\RedisComposer@compose'
        );

        view()->composer(
            ['dashboard.edit-page','dashboard.create-page'],
            'App\Http\ViewComposers\PagesComposer@compose'
        );
        
        // view()->composer('wellcome', function ($view) {

        //     $view->with('userinc', 'App/Http/Controller/Dashboard@test');
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
