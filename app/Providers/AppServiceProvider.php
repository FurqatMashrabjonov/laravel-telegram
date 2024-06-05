<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\TelegramText;
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
        if (!Schema::hasTable('settings') and !Schema::hasTable('telegram_texts')) {
            return;
        }

        $this->app->singleton('settings', function () {
            return Settings::pluck('value', 'key')->toArray();
        });

        $this->app->singleton('telegram_text', function () {
            return TelegramText::pluck('value', 'key')->toArray();
        });

        app()->setLocale(settings('locale', config('app.default_locale', 'uz')));
    }
}
