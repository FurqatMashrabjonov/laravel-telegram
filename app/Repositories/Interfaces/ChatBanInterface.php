<?php

namespace App\Repositories\Interfaces;

use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;

interface ChatBanInterface
{

    public function setBan(string $chat): void;

    public function removeBan(string $chat): void;

    public function banned(string $chat): bool;

}
