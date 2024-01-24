<?php

namespace App\Telegram\Actions;

use App\Telegram\Keyboards\InlineKeyboards;
use App\Telegram\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;

class AskLanguage
{

    public static function ask(Nutgram $bot, bool $inline = false): void
    {
        $bot->sendMessage(
            text: text('ask_language', 'uz'),
            reply_markup: $inline ?  InlineKeyboards::language() : ReplyMarkupKeyboards::language()
        );
    }

}
