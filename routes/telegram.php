<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\Language;
use App\Telegram\Commands\Start;
use App\Telegram\Middleware\ChatExists;
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

//Global Middlewares
$bot->middleware(ChatExists::class);


//Commands
$bot->onCommand('start', Start::class);
$bot->onCommand('lang', Language::class);

