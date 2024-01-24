<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class Start extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Start the bot';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: text('start', 'uz', ['name' => $bot->message()->from->first_name]),
        );

    }
}
