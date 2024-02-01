<?php

namespace App\Telegram\Commands;

use App\Telegram\Conversations\PhoneConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class Phone extends Command
{
    protected string $command = 'command';

    protected ?string $description = 'Telefon raqamni yangilash';

    public function handle(Nutgram $bot): void
    {
        PhoneConversation::begin($bot);
    }
}
