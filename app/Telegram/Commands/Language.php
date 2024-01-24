<?php

namespace App\Telegram\Commands;

use App\Telegram\Actions\AskLanguage;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class Language extends Command
{
    protected string $command = 'command';

    protected ?string $description = 'Update Language';

    public function handle(Nutgram $bot): void
    {
        AskLanguage::ask($bot);
    }
}
