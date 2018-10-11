<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Stripe;

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

        //  1. Register a composer
        //      - first argument is name of view that is loaded
        //  2. Bind something to the view "$view"

        //Here, we assume all of Laravel has booted.

        //Anywhere this VIEW is loaded, bind something to that view
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
        //Register any KEY into the container, and associate it with some value.

        \App::bind('App\Stripe', function() {
            return new \App\Stripe(config('services.stripe.secret'));
        });
            //or App::singleton
    }
}
