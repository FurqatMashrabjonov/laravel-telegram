<?php

namespace App\Telegram\Keyboards;

use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;

class ReplyMarkupKeyboards
{

    public static function language(): ReplyKeyboardMarkup
    {
        return ReplyKeyboardMarkup::make(
            resize_keyboard: true,
            one_time_keyboard: true,
        )->addRow(
            KeyboardButton::make('🇺🇿O\'zbekcha'),
            KeyboardButton::make('🇷🇺Русский'),
            KeyboardButton::make('🇬🇧English'),
        );
    }

    public static function phone(string $lang = null): ReplyKeyboardMarkup
    {
        return ReplyKeyboardMarkup::make(
            resize_keyboard: true,
            one_time_keyboard: true
        )->addRow(
            KeyboardButton::make(
                text: text('phone.send_my_phone', lang($lang)),
                request_contact: true
            )
        );
    }

}
