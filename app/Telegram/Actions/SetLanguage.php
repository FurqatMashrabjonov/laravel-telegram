<?php

namespace App\Telegram\Actions;

use App\Repositories\LanguageRepository;

class SetLanguage
{

    public static function set(string $chat_id, string $lang): void
    {
        (new LanguageRepository())->set($chat_id, $lang);
    }

}
