<?php

namespace App\Telegram\Middleware;

use App\Repositories\Telegram\ChatRepository;
use SergiX44\Nutgram\Nutgram;

class ChatHandle
{
    protected ChatRepository $chatRepository;

    public function __construct()
    {
        $this->chatRepository = new ChatRepository();
    }

    public function __invoke(Nutgram $bot, $next): void
    {
        $chat = $bot->chat();
        $this->chatRepository->createOrUpdate([
            'type' => $chat->type,
            'first_name' => $chat->first_name,
            'last_name' => $chat->last_name,
            'username' => $chat->username,
            'from' => $bot->message()->from,
        ], [
            'chat_id' => $chat->id,
        ]);

        $next($bot);
    }
}
