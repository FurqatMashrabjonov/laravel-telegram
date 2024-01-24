<?php

namespace App\Telegram\Actions;

use App\Telegram\Keyboards\ReplyMarkupKeyboards;
use SergiX44\Nutgram\Nutgram;

class AskPhone
{

    public static function ask(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: text('phone.ask_phone',  lang($bot->chat()->id)),
            reply_markup: ReplyMarkupKeyboards::phone()
        );
    }

}
