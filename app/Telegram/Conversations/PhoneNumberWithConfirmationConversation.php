<?php

namespace App\Telegram\Conversations;

use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;

class PhoneNumberWithConfirmationConversation extends Conversation
{
    public function start(Nutgram $bot)
    {
        $bot->sendMessage('This is the first step!');
        $this->next('start');
    }

    public function secondStep(Nutgram $bot)
    {
        $bot->sendMessage('Bye!');
        $this->end();
    }
}
