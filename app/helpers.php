<?php

use Illuminate\Support\Facades\Log;

if (!function_exists('logger')) {
    function logger(): Log
    {
        return app(Log::class);
    }
}

if (!function_exists('settings')) {
    function settings(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return app('settings');
        }

        return app('settings')[$key] ?? $default;
    }
}

if (!function_exists('tt')) {
    function tt(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return app('telegram_text');
        }

        return app('telegram_text')[$key] ?? $default;
    }
}

if (!function_exists('icon')) {
    function icon(string $name): string
    {
        return 'heroicon-o-' . $name;
    }
}
