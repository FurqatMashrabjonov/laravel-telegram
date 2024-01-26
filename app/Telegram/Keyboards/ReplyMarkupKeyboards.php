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

    public static function phone(): ReplyKeyboardMarkup
    {
        return ReplyKeyboardMarkup::make(
            resize_keyboard: true,
            one_time_keyboard: true
        )->addRow(
            KeyboardButton::make(
                text: '📱Send my phone number',
                request_contact: true
            )
        );
    }

}
