<?php

namespace App\Telegram\Commands;

use App\Telegram\Actions\AskPhone;
use App\Telegram\Conversations\PhoneNumberWithConfirmationConversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Handlers\Type\Command;

class Phone extends Command
{
    protected string $command = 'command';

    protected ?string $description = 'Ask phone number';

    public function handle(Nutgram $bot): void
    {
//        AskPhone::ask($bot);
        PhoneNumberWithConfirmationConversation::begin($bot);
    }
}
