<?php

namespace App\Providers;

use App\Models\Feature;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class SettingsServicesProvider extends ServiceProvider
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
        $settings = Setting::findOrFail(1);
        $services = Service::all();
        $features = Feature::all();
        View::share('settings', $settings);
        View::share('services', $services);
        View::share('features', $features);
    }
}
