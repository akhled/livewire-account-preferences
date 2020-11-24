<?php

namespace Akhaled\LivewireAccountPreferences;

use Akhaled\LivewireAccountPreferences\Http\Livewire\AccountPreferencesEdit;
use Akhaled\LivewireAccountPreferences\Http\Livewire\AccountPreferencesShow;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ServiceProvider extends ServiceProvider
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

        // load views
        $this->loadViewsFrom(__DIR__ . '/views', 'livewire-account-preferences');

        // publish config
        $this->publishes([__DIR__ . '/config/livewire-account-preferences.php' => config_path('livewire-account-preferences.php')], 'livewire-account-preferences');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // register routes
        // include __DIR__ . '/routes.php';

        // register livewire components
        Livewire::component('account-preferences-edit', AccountPreferencesEdit::class);
        Livewire::component('account-preferences-show', AccountPreferencesShow::class);

        // merge configurations
        $this->mergeConfigFrom(__DIR__ . '/config/livewire-account-preferences.php', 'livewire-account-preferences');
    }
}