<?php

namespace App\Repositories\Interfaces;

interface LanguageInterface
{
    public function set(string $chat, string $lang): void;
}
