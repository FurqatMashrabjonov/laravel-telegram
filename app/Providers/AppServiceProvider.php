<?php

namespace App\Providers;

use App\Models\Settings;
use App\Models\Text;
use App\Observers\SettingsObserver;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
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
        Settings::observe(SettingsObserver::class);

        $texts = Text::query()->pluck('text', 'key')->toArray();
        $settings = Settings::query()->first();

        $this->app->singleton('texts', function () use ($texts) {
            return $texts;
        });

        $this->app->singleton('settings', function () use ($settings) {
            return collect($settings)->filter(fn($value, $key) => $key !== 'id')->toArray();
        });

        //Set global config token
        Config::set('nutgram.token', settings('bot_token'));

        //Localization for Admin panel
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['uz', 'ru', 'en']); // also accepts a closure
        });
    }

}
