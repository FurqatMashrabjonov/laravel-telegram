<?php

namespace App\Repositories\Interfaces;

use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;

interface ChatInterface
{

    public function exists(string $chat_id): bool;

    public function store(Chat $chat, User $from): void;

}
