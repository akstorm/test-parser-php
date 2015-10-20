<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \PHPHtmlParser\Dom;

class HtmlParserServiceProvider extends ServiceProvider
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
        $this->app->bind('HtmlParserProcessor', function ($app) {
            return new Dom;
        });
    }
}
