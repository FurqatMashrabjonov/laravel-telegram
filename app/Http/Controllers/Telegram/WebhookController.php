<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    public function handle(Nutgram $bot): Response
    {
        try {
            $bot->run();
        } catch (\Throwable $e) {
            logger()->error($e->getMessage());
        } finally {
            return response()->noContent();
        }
    }
}
