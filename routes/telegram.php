<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Actions\SetLanguage;
use App\Telegram\Commands\Language;
use App\Telegram\Commands\Phone;
use App\Telegram\Commands\Start;
use App\Telegram\Commands\File;
use App\Telegram\Middleware\ChatExists;
use App\Telegram\Middleware\CheckBanned;
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
$bot->middleware(CheckBanned::class);

//Commands
$bot->onCommand('start', Start::class);
$bot->onCommand('lang', Language::class);
$bot->onCommand('phone', Phone::class);
$bot->onCommand('file', File::class);


//Test command
$bot->onCommand('test', function (Nutgram $bot) {
    $bot->sendMessage('test' . \Illuminate\Support\Number::percentage(microtime(true) - LARAVEL_START));
});


//Set Language
$bot->onText('🇺🇿O\'zbekcha', function (Nutgram $bot) {
    SetLanguage::set($bot->chat()->id, 'uz');
    $bot->sendMessage('uzbek!');
});
$bot->onText('🇷🇺Русский', function (Nutgram $bot) {
    SetLanguage::set($bot->chat()->id, 'ru');
    $bot->sendMessage('russian!');
});
$bot->onText('🇬🇧English', function (Nutgram $bot) {
    SetLanguage::set($bot->chat()->id, 'en');
    $bot->sendMessage('english!');
});


$bot->onCallbackQueryData('set_lang:uz', function(Nutgram $bot){
    SetLanguage::set($bot->chat()->id, 'uz');
    $bot->deleteMessage($bot->chat()->id, $bot->message()->message_id);
    $bot->answerCallbackQuery(text: 'uzbekcha');
});
$bot->onCallbackQueryData('set_lang:ru', function(Nutgram $bot){
    SetLanguage::set($bot->chat()->id, 'ru');
    $bot->deleteMessage($bot->chat()->id, $bot->message()->message_id);
    $bot->answerCallbackQuery(text: 'russian');
});
$bot->onCallbackQueryData('set_lang:en', function(Nutgram $bot){
    SetLanguage::set($bot->chat()->id, 'en');
    $bot->deleteMessage($bot->chat()->id, $bot->message()->message_id);
    $bot->answerCallbackQuery(text: 'english');
});
