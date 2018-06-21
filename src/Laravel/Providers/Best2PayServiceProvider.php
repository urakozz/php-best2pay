<?php

namespace App\Providers;

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
            __DIR__ . '/Best2Pay/config/best2pay.php' => config_path('best2pay.php'),
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Kozz\Best2Pay\Best2Pay', function ($app) {
            return new Best2Pay($app['config']['best2pay']);
        });
    }
}
