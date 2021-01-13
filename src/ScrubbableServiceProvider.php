<?php

namespace JacobGardiner\Scrubbable;

use Illuminate\Support\ServiceProvider;

class ScrubbableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'scrubbable');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'scrubbable');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('scrubbable.php'),
            ], 'scrubbable');

            // Registering package commands.
             $this->commands([
                 ScrubDatabase::class
             ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'scrubbable');
    }
}
