<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ChatInterface;
use Illuminate\Support\Facades\DB;
use SergiX44\Nutgram\Telegram\Types\Chat\Chat;
use SergiX44\Nutgram\Telegram\Types\User\User;
use function Pest\Laravel\json;

class ChatRepository implements ChatInterface
{

    public function exists(string $chat_id): bool
    {
        return DB::table('chats')->where('chat_id', $chat_id)->exists();
    }

    public function getLang(string $chat_id): ?string
    {
        return DB::table('chats')->where('chat_id', $chat_id)->value('lang');
    }

    public function store(Chat $chat, User $from): void
    {
        $from = collect($from->toArray())->filter(function ($value, $key){
            return !in_array($key, ['_bot', '_extra']);
        })->toArray();

        DB::table('chats')
            ->insert([
               'chat_id' => $chat->id,
                'first_name' => $chat->first_name,
                'last_name' => $chat->last_name,
                'username' => $chat->username,
                'type' => $chat->type,
                'from' => json_encode($from),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
