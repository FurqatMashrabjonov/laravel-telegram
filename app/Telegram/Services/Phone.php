<?php

namespace App\Telegram\Services;

use Illuminate\Support\Facades\DB;

class Phone
{

    public static function get(string $chat_id){
        return DB::table('chats')->where('chat_id', $chat_id)->value('phone');
    }

    public static function set(string $chat_id, string $phone): void
    {
        DB::table('chats')->where('chat_id', $chat_id)->update(['phone' => $phone]);
    }

}
