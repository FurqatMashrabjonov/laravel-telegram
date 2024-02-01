<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Nutgram $bot)
    {
        try {

            $bot->run();

        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return response()->noContent();
    }
}
