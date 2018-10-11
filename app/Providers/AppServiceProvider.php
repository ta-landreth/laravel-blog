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
        //
        // EX:  KEY = instance of Stripe, VALUE = instance of Stripe w/ any dependencies (i.e. keys)

        $this->app->singleton('App\Stripe', function() {
            return new \App\Stripe(config('services.stripe.secret'));

            //you can pass in an argument to closure ($app argument) in case you need to resolve something inside of the container
        });
            //or $this->app->singleton... etc. - b/c this is a service provider, it has an 'app' property 'on the object'(?)
            //or App::singleton - single instance of class (same class, for as many times as you resolve fm container)
            //or App::instance - swap out current instance with something else
            //or App::bind

        //Another example:
        //  Import the class, and reformat request:
            // $this->app->bind(Stripe::class, function() {
            //     return new Stripe(config('services.stripe.secret'));
            // });
    }
}
