<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ChatInterface;
use App\Repositories\Interfaces\PhoneNumberInterface;
use Illuminate\Support\Facades\DB;
use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;
use function Pest\Laravel\json;

class PhoneNumberRepository implements PhoneNumberInterface
{

    public function getPhoneNumber(string $chat): ?string
    {
        return DB::table('chats')->where('chat_id', $chat)->value('phone_number');
    }

    public function setPhoneNumber(string $chat, string $phoneNumber): void
    {
        DB::table('chats')->where('chat_id', $chat)->update(['phone_number' => $phoneNumber]);
    }
}
