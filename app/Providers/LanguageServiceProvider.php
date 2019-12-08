<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//         App::setLocale(session('lang', 'en'));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        App::setLocale(session('lang', 'en'));
    }
}
