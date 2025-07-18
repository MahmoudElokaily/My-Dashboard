<?php

namespace Elokaily\Dashboard\Providers;


use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider {

    public function boot() {

        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "dashboard");
        $this->loadMigrationsFrom(__DIR__ . "/../database/migration");
        $this->loadSeedsFrom(__DIR__ . '/../database/Seeders');

        // public assets from my packages
        $this->publishes([
            __DIR__.'/../resources/assets/css' => public_path('dashboardAssets/css'),
            __DIR__.'/../resources/assets/js' => public_path('dashboardAssets/js'),
            __DIR__.'/../resources/assets/img' => public_path('dashboardAssets/img'),
            __DIR__.'/../resources/assets/scss' => public_path('dashboardAssets/scss'),
            __DIR__.'/../resources/assets/vendor' => public_path('dashboardAssets/vendor'),
            __DIR__.'/../resources/assets/images' => public_path('dashboardAssets/images'),
        ], 'public');
    }

    protected function loadSeedsFrom(string $path): void
    {
        foreach (glob($path.'/*.php') as $filename) {
            require_once $filename;
        }
    }

}
