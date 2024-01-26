<?php

namespace App\Telegram\Middleware;

use App\Repositories\PhoneNumberRepository;
use App\Telegram\Actions\AskPhone;
use SergiX44\Nutgram\Nutgram;

class CheckPhone
{

    protected PhoneNumberRepository $phoneNumberRepository;

    public function __construct()
    {
        $this->phoneNumberRepository = new PhoneNumberRepository();
    }

    public function __invoke(Nutgram $bot, $next): void
    {
        if (settings('enable_phone_number')) {
            if ($this->phoneNumberRepository->getPhoneNumber($bot->chat()->id) === null) {

                AskPhone::ask($bot);

                return;
            }
        }
        $next($bot);
    }
}
