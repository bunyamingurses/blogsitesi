<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::useBootstrap();

        if (app()->environment('remote') || env('FORCE_HTTPS',true)) {
            URL::forceScheme('https');
        }

    }
}
