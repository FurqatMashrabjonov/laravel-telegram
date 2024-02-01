<?php

namespace App\Repositories\Interfaces;

interface PhoneNumberInterface
{
    public function getPhoneNumber(string $chat): ?string;

    public function setPhoneNumber(string $chat, string $phoneNumber): void;
}
