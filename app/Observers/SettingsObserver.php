<?php

namespace App\Observers;

use App\Models\Settings;
use App\Telegram\Services\Webhook;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Telegram\Exceptions\TelegramException;

class SettingsObserver
{
    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws JsonException
     * @throws TelegramException
     * @throws GuzzleException
     */
    public function updated(Settings $settings): void
    {
        if (
            settings('webhook_url') != $settings->webhook_url ||
            settings('bot_token') != $settings->bot_token ||
            settings('webhook_was_set') != $settings->webhook_was_set
        ) {
            if ($settings->webhook_was_set) {
                bot($settings->bot_token)->setWebhook(generateWebhookUrl($settings->webhook_url) . route('webhook', [], false));
            } else {
                bot($settings->bot_token)->deleteWebhook();
            }
        }
    }
}
