<?php

namespace Elokaily\Dashboard\Providers;


use Illuminate\Support\ServiceProvider;

class DashboardProvide extends ServiceProvider {

    public function boot() {

        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "dashboard");


        // public assets from my packages
        $this->publishes([
            __DIR__.'/../resources/assets/css' => public_path('elokaily/css'),
            __DIR__.'/../resources/assets/js' => public_path('elokaily/js'),
            __DIR__.'/../resources/assets/img' => public_path('elokaily/img'),
            __DIR__.'/../resources/assets/scss' => public_path('elokaily/scss'),
        ], 'public');
    }
}
