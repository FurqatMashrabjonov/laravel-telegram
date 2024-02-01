<?php

namespace App\Repositories\Interfaces;

interface ChatBanInterface
{
    public function setBan(string $chat): void;

    public function removeBan(string $chat): void;

    public function banned(string $chat): bool;
}
