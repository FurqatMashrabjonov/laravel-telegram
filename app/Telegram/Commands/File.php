<?php

namespace App\Telegram\Commands;

use App\Telegram\Conversations\FileConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class File extends Command
{
    protected string $command = 'command';

    protected ?string $description = 'Receive file from admin';

    public function handle(Nutgram $bot): void
    {
        FileConversation::begin($bot);
    }
}
