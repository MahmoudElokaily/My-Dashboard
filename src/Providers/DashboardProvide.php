<?php

namespace Elokaily\Dashboard\Providers;


use Illuminate\Support\ServiceProvider;

class DashboardProvide extends ServiceProvider {

    public function boot() {
        $this->loadJsonTranslationsFrom(__DIR__ . "../routes/web.php");
        $this->loadViewsFrom(__DIR__ . "./resources/views", "dashboard");
    }
}
