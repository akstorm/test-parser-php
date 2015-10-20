<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Parser\ParserProcessor;

class ParserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ParserProcessor', function ($app) {
            return new ParserProcessor;
        });
    }
}
