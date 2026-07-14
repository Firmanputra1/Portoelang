<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Share settings globally with all views
        if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
            try {
                $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
                view()->share('settings', $settings);
            } catch (\Exception $e) {
                // Prevent migration errors if settings table is empty or has issues
            }
        }
    }
}
