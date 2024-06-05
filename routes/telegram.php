<?php

/** @var Nutgram $bot */

use App\Telegram\Middleware\ChatHandle;
use SergiX44\Nutgram\Nutgram;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

$bot->middleware(ChatHandle::class);

$bot->onCommand('start', function (Nutgram $bot) {
    $bot->sendMessage('Salom, '.$bot->chat()->username.'!');
})->description('The start command!');
