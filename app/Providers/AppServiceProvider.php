<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use App\Models\ProjectSetting;



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
        //
        View::composer('*', function ($view) {
        $projectSettings = ProjectSetting::firstOrFail(); // Retrieve the project settings
        $view->with('siteName', $projectSettings->site_name);
        $view->with('siteLogo', $projectSettings->site_logo);
        $view->with('siteFavicon', $projectSettings->site_favicon);
    });
    }
}
