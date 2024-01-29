<?php


use App\Models\Settings;
use SergiX44\Nutgram\Nutgram;

if (!function_exists('lang')) {
    function text(string $key, string $lang = 'uz', array $params = [])
    {
        $texts = app('texts');

        if (!isset($texts[$key])) {
            return $key;
        }

        $text = $texts[$key];

        if (!isset($text[$lang])) {
            return $key;
        }

        $text = $text[$lang];

        foreach ($params as $param => $value) {
            $text = str_replace(":$param", $value, $text);
        }

        return $text;
    }
}


if (!function_exists('settings')) {

    //php doc for see accepted keys with variants
    /**
     * @param string|null $key
     * @param string|null $default
     * @return mixed
     */


    function settings(string $key = null, string $default = null): mixed
    {
        if ($key == null & $default == null) {
            return Settings::query()->first();
        }

        $settings = app('settings');

        if (!isset($settings[$key])) {
            return $default;
        }

        return $settings[$key];
    }
}


if (!function_exists('lang')) {
    function lang(string $chat_id)
    {
        return \DB::table('chats')->where('chat_id', $chat_id)->value('lang') ?? 'uz';
    }
}

if (!function_exists('bot')) {
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    function bot(string $token = null): Nutgram
    {
        return new Nutgram($token ?? settings('bot_token'));
    }
}


if (!function_exists('generateWebhookUrl')) {
    function generateWebhookUrl(string $url): string
    {
        return rtrim($url, '/');
    }
}
