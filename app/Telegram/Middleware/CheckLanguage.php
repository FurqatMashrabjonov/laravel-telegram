<?php

namespace App\Telegram\Middleware;

use App\Repositories\ChatRepository;
use App\Telegram\Actions\AskLanguage;
use SergiX44\Nutgram\Nutgram;

class CheckLanguage
{
    protected ChatRepository $chatRepository;

    public function __construct()
    {
        $this->chatRepository = new ChatRepository();
    }

    public function __invoke(Nutgram $bot, $next): void
    {

        if (!settings('enable_language_selection')) {
            $next($bot);
            return;
        }

        if ($this->chatRepository->getLang($bot->chat()->id) === null) {

            AskLanguage::ask($bot);

            return;
        }

        $next($bot);
    }
}
