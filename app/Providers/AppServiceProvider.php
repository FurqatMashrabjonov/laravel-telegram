<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\Text;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('texts')) {
            $texts = Text::query()->pluck('text', 'key')->toArray();

            $this->app->singleton('texts', function () use ($texts) {
                return $texts;
            });
        }

//        if (Schema::hasTable('settings')) {
//            $settings = Settings::query()->pluck('value', 'key')->toArray();
//
//            $this->app->singleton('languages', function () use ($settings) {
//                return $settings;
//            });
//        }
    }
}
