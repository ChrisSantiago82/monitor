<?php

namespace Chrissantiago82\Monitor;

use Illuminate\Support\ServiceProvider;

class MonitorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        //$this->mergeConfigFrom(__DIR__.'/../config/config.php', 'monitor');
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'krebsmonitor');
        $this->app->make('Chrissantiago82\Monitor\MonitorController');

        /*
        // Register the main class to use with the facade
        $this->app->singleton('monitor', function () {
            return new Monitor;
        });
        */
    }
}
