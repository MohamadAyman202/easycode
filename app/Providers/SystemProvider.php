<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SystemProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interface\SystemInterface',
            'App\Interface\SystemRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
