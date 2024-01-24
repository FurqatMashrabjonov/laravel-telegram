<?php

namespace App\Telegram\Keyboards;

use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardMarkup;

class InlineKeyboards
{

    public static function language()
    {
        return InlineKeyboardMarkup::make()
            ->addRow(
                InlineKeyboardButton::make('🇺🇿O\'zbekcha', callback_data: 'set_lang:uz'),
                InlineKeyboardButton::make('🇷🇺Русский', callback_data: 'set_lang:ru'),
                InlineKeyboardButton::make('🇬🇧English', callback_data: 'set_lang:en')
            );
    }

}
