<?php

namespace App\Telegram\Conversations;

use App\Repositories\PhoneNumberRepository;
use App\Telegram\Keyboards\ReplyMarkupKeyboards;
use Psr\SimpleCache\InvalidArgumentException;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;

class PhoneConversation extends Conversation
{
    public function __construct(protected PhoneNumberRepository $phoneNumberRepository)
    {
    }

    public function start(Nutgram $bot): void
    {
        $this->ask($bot);
        $this->next('receivePhone');
    }

    /**
     * @throws InvalidArgumentException
     */
    public function receivePhone(Nutgram $bot): void
    {
        $phoneNumber = $bot->message()->text;

        if ($bot->message()->contact) {
            $phoneNumber = $bot->message()->contact->phone_number;
        }

        if (! preg_match('/^998\d{9}$/', $phoneNumber)) {
            $this->ask($bot);

            return;
        }

        $this->phoneNumberRepository->setPhoneNumber($bot->chat()->id, $phoneNumber);

        $bot->sendMessage(text('phone.selected', lang($bot->chat()->id)));

        $this->end();
    }

    public function ask(Nutgram $bot): void
    {
        $bot->sendMessage(
            text: text('phone.ask_phone'),
            parse_mode: ParseMode::HTML,
            reply_markup: ReplyMarkupKeyboards::phone(),
        );
    }
}
