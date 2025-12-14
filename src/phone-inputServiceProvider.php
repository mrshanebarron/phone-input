<?php

namespace MrShaneBarron\phone-input;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\phone-input\Livewire\phone-input;
use MrShaneBarron\phone-input\View\Components\phone-input as Bladephone-input;
use Livewire\Livewire;

class phone-inputServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-phone-input.php', 'ld-phone-input');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-phone-input');

        Livewire::component('ld-phone-input', phone-input::class);

        $this->loadViewComponentsAs('ld', [
            Bladephone-input::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-phone-input.php' => config_path('ld-phone-input.php'),
            ], 'ld-phone-input-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-phone-input'),
            ], 'ld-phone-input-views');
        }
    }
}
