<?php

namespace App\Repositories\Interfaces;

interface FileInterface
{
    public function store(string $type): bool;
}
