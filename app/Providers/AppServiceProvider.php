<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        Livewire::listen('file.upload:validation', function ($validator) {
            $validator->setRules(['file' => 'file|max:512000']); // 500 MB в KB
        });
    }
}
