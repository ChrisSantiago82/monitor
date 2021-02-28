<?php

namespace chrissantiago82\monitor;

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
        $this->app->make('chrissantiago82\monitor\MonitorController');

        /*
        // Register the main class to use with the facade
        $this->app->singleton('monitor', function () {
            return new Monitor;
        });
        */
    }
}
