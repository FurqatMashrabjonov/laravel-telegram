<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\Start;
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

//Middlewares

//$bot->middleware(function (Nutgram $bot, $next) {
//    Log::debug('bu middleware ');
//});


//Commands
$bot->onCommand('start', Start::class)->description('The start command!')
->middleware(\App\Telegram\Middleware\ChatExists::class);
