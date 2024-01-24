<?php


use App\Models\Chat;
use App\Telegram\Actions\SetLanguage;

test('language changed', function () {
    $chat = Chat::factory()->create();

    SetLanguage::set($chat->chat_id, 'en');

    expect(Chat::first()->lang)->toBe('en');
});
