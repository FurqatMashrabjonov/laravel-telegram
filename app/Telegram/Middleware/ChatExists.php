<?php

namespace App\Telegram\Middleware;

use App\Repositories\ChatRepository;
use SergiX44\Nutgram\Nutgram;

class ChatExists
{
    protected ChatRepository $chatRepository;

    public function __construct()
    {
        $this->chatRepository = new ChatRepository();
    }

    public function __invoke(Nutgram $bot, $next): void
    {
        if (!$this->chatRepository->exists($bot->chat()->id))
            $this->chatRepository->store($bot->chat(), $bot->message()->from);

        $next($bot);
    }
}
