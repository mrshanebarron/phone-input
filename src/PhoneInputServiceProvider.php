<?php

namespace MrShaneBarron\PhoneInput;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\PhoneInput\Livewire\PhoneInput;
use MrShaneBarron\PhoneInput\View\Components\phone-input as BladePhoneInput;
use Livewire\Livewire;

class PhoneInputServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-phone-input.php', 'sb-phone-input');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-phone-input');

        Livewire::component('sb-phone-input', phone-input::class);

        $this->loadViewComponentsAs('ld', [
            BladePhoneInput::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-phone-input.php' => config_path('sb-phone-input.php'),
            ], 'sb-phone-input-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-phone-input'),
            ], 'sb-phone-input-views');
        }
    }
}
