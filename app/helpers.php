<?php


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
     * @param string $key
     * @param string|null $default
     * @return mixed
     */


    function settings(string $key, string $default = null): mixed
    {
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
       return \Illuminate\Support\Facades\DB::table('chats')->where('chat_id', $chat_id)->value('lang') ?? 'uz';
    }
}
