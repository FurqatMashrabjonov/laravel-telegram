<?php

namespace App\Telegram\Services;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Exceptions\TelegramException;

class Webhook
{

    /**
     * @throws TelegramException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws GuzzleException
     * @throws JsonException
     */
    public static function set(string $url = null, string $token = null): ?bool
    {
           if ($url === null) {
               $url = settings('webhook_url');
           }

              if ($token === null) {
                $token = settings('bot_token');
              }

                $url = $url . route('webhook', [], false);

              return (new Nutgram($token))->setWebhook($url);

    }

    /**
     * @throws TelegramException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws GuzzleException
     * @throws JsonException
     */
    public static function unset(string $token = null): ?bool
    {
        if ($token === null) {
            $token = settings('bot_token');
        }

        return (new Nutgram($token))->deleteWebhook();
    }

}
