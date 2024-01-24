<?php

namespace App\Repositories;


use App\Repositories\Interfaces\LanguageInterface;
use Illuminate\Support\Facades\DB;

class LanguageRepository implements LanguageInterface
{


    public function set(string $chat, string $lang): void
    {
        DB::table('chats')->update(['lang' => $lang]);
    }
}
