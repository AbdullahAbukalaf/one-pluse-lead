<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('layouts.site.*', function ($view) {
            $settings = SiteSetting::query()->first();
            $categories = Categories::query()->where('is_active', true)->get();
            $view->with('categories', $categories);
            $view->with('settings', $settings);
        });
    }
}
