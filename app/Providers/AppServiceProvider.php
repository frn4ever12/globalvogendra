<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Only apply MenuComposer to frontend views
        View::composer(['*', '!admin*'], MenuComposer::class);
        
        // Register admin component paths
        View::addNamespace('admin-components', resource_path('views/Admin/components'));
    }
}
