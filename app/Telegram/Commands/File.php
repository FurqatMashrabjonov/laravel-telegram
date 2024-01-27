<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class File extends Command
{
    protected string $command = 'command';

    protected ?string $description = 'A lovely description.';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage('This is a command!');
    }
}
