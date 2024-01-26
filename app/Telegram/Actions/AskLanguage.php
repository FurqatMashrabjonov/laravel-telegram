<?php

namespace App\Telegram\Actions;

use App\Telegram\Keyboards\InlineKeyboards;
use App\Telegram\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;

class AskLanguage
{

    public static function ask(Nutgram $bot, string $mode = 'markup'): void
    {
        $bot->sendMessage(
            text: text('ask_language'),
            reply_markup: $mode == 'inline' ?  InlineKeyboards::language() : ReplyMarkupKeyboards::language()
        );
    }

}
