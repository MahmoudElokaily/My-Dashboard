<?php

namespace Elokaily\Dashboard\Providers;


use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider {

    public function boot() {

        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "dashboard");


        // public assets from my packages
        $this->publishes([
            __DIR__.'/../resources/assets/css' => public_path('dashboard/css'),
            __DIR__.'/../resources/assets/js' => public_path('dashboard/js'),
            __DIR__.'/../resources/assets/img' => public_path('dashboard/img'),
            __DIR__.'/../resources/assets/scss' => public_path('dashboard/scss'),
            __DIR__.'/../resources/assets/vendor' => public_path('dashboard/vendor'),
        ], 'public');
    }
}
