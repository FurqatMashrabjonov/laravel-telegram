<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ChatBanInterface;
use Illuminate\Support\Facades\DB;

class ChatBanRepository implements ChatBanInterface
{


    public function setBan(string $chat): void
    {
        DB::table('chats')->where('chat_id', $chat)->update(['banned' => true]);
    }

    public function removeBan(string $chat): void
    {
        DB::table('chats')->where('chat_id', $chat)->update(['banned' => false]);
    }

    public function banned(string $chat): bool
    {
        return DB::table('chats')->where('chat_id', $chat)->value('banned');
    }
}
