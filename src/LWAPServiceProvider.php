<?php

namespace Akhaled\LivewireAccountPreferences;

use Akhaled\Http\Livewire\AccountPreferences;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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

        Livewire::component('account-preferences', AccountPreferences::class);
    }
}
