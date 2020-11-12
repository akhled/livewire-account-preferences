<?php

namespace Akhaled\LivewireAccountPreferences;

use Illuminate\Support\ServiceProvider;

class LWAPServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        // $this->app->make('Devdojo\Calculator\CalculatorController');
        $this->loadViewsFrom(__DIR__ . '/views', 'lwap');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';
    }
}
