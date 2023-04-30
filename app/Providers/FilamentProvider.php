<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Filament::serving(function () {
            // Using Vite

            Filament::registerNavigationGroups([
                __('course.title'),
                __('nav.options'),
                __('filament-shield::filament-shield.nav.group')
            ]);

        });
    }
}
