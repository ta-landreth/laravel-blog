<?php

namespace App\Providers;

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
        //Register a View Composer for the sidebar
            //view() = helper
            //\View::composer() = facade
        //Anywhere this VIEW is loaded, bind something to that view
        //  1. Register a composer
        //      - first argument is name of view that is loaded
        //  2. Bind something to the view   $view
        view()->composer('partials.sidebar', function($view) {
            $view->with('archives', \App\Post::archives());
        });
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
