<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ProjectSetting;


class ProjectSettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind('project_settings', function () {
            return ProjectSetting::firstOrFail();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
