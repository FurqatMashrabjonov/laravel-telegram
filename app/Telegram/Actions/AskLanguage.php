<?php

namespace App\Telegram\Actions;

use App\Telegram\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;

class AskLanguage
{

    public static function ask(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: lang('ask_language', 'uz'),
            reply_markup: ReplyMarkupKeyboards::language()
        );
    }

}
