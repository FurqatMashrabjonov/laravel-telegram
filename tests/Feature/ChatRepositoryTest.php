<?php
$chatRepository = new \App\Repositories\ChatRepository();

test('chat exists', function () use ($chatRepository) {
    expect($chatRepository->exists('123456789'))->toBe(false);

    \App\Models\Chat::factory()->create(['chat_id' => '123456789']);

    expect($chatRepository->exists('123456789'))->toBe(true);
});

test('get lang', function () use ($chatRepository) {
    expect($chatRepository->getLang('123456789'))->toBeNull();

    \App\Models\Chat::factory()->create(['chat_id' => '123456789', 'lang' => 'uz']);

    expect($chatRepository->getLang('123456789'))->toBe('uz');
});
