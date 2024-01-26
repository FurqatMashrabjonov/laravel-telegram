<?php

namespace App\Repositories\Interfaces;

use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;

interface PhoneNumberInterface
{

    public function getPhoneNumber(string $chat): ?string;


    public function setPhoneNumber(string $chat, string $phoneNumber): void;

}
