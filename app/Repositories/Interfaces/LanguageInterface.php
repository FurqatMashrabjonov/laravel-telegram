<?php

namespace App\Repositories\Interfaces;

use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;

interface LanguageInterface
{

    public function set(string $chat, string $lang): void;

}
