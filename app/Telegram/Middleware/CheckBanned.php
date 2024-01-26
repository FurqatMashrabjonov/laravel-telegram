<?php

namespace App\Telegram\Middleware;

use App\Repositories\ChatBanRepository;
use SergiX44\Nutgram\Nutgram;

class CheckBanned
{
    protected ChatBanRepository $chatBanRepository;

    public function __construct()
    {
        $this->chatBanRepository = new ChatBanRepository();
    }

    public function __invoke(Nutgram $bot, $next): void
    {
        if ($this->chatBanRepository->banned($bot->chat()->id)) {
            return;
        }

        $next($bot);
    }
}
