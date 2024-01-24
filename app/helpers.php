<?php



if (!function_exists('lang')){
    function lang(string $key, string $lang, array $params = []){
        $texts = app('texts');

        if (!isset($texts[$key])){
            return $key;
        }

        $text = $texts[$key];

        if (!isset($text[$lang])){
            return $key;
        }

        $text = $text[$lang];

        foreach ($params as $param => $value){
            $text = str_replace(":$param", $value, $text);
        }

        return $text;
    }
}
