<?php

namespace App\Telegram\Commands;

use SergiX44\Nutgram\Handlers\Type\Command;
use SergiX44\Nutgram\Nutgram;

class Start extends Command
{
    protected string $command = 'start';

    protected ?string $description = 'Botni ishga tushirish';

    public function handle(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: text('main.start', 'uz', [
                'name' => $bot->message()->from->first_name ?? $bot->message()->from->username,
            ]),
        );

    }
}
