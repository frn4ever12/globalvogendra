<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteSettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\View\Composers\SiteSettingComposer::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['*'], \App\View\Composers\SiteSettingComposer::class);
        View::composer(['Frontend.includes.navbar'], \App\View\Composers\MenuComposer::class);
    }
}
