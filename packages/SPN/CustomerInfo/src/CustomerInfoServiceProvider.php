<?php

namespace SPN\CustomerInfo;

use Illuminate\Support\ServiceProvider;

class CustomerInfoServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'spn');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'customer');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/customerinfo.php', 'customerinfo');

        // Register the service the package provides.
        $this->app->singleton('customerinfo', function ($app) {
            return new CustomerInfo;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['customerinfo'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/customerinfo.php' => config_path('customerinfo.php'),
        ], 'customerinfo.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/spn'),
        ], 'customerinfo.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/spn'),
        ], 'customerinfo.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/spn'),
        ], 'customerinfo.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
