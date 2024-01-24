<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ChatInterface;
use Illuminate\Support\Facades\DB;
use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;

class ChatRepository implements ChatInterface
{

    public function exists(string $chat_id): bool
    {
        return DB::table('chats')->where('chat_id', $chat_id)->exists();
    }

    public function store(Chat $chat, User $from): void
    {

    }
}
