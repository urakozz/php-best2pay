<?php

namespace Kozz\Best2Pay\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use Kozz\Best2Pay\Best2Pay;

class Best2PayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/best2pay.php' => config_path('best2pay.php'),
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Best2Pay::class, function ($app) {
            return new Best2Pay($app['config']['best2pay']);
        });
    }
}
