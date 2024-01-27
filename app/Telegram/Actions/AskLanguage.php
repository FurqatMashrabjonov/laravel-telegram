<?php

namespace App\Telegram\Actions;

use App\Telegram\Keyboards\InlineKeyboards;
use App\Telegram\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;

class AskLanguage
{

    public static function ask(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: text('lang.ask_language'),
            reply_markup: match (settings('language_selection_mode')) {
                'inline' => InlineKeyboards::language(),
                'markup' => ReplyMarkupKeyboards::language(),
                default => null
            }
        );
    }

}
