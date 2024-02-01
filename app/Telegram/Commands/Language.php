<?php

namespace App\Telegram\Commands;

use App\Telegram\Actions\AskLanguage;
use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Nutgram;

class Language extends Command
{
    protected string $command = 'command';

    protected ?string $description = 'Tilni yangilash';

    public function handle(Nutgram $bot): void
    {
        AskLanguage::ask($bot);
    }
}
