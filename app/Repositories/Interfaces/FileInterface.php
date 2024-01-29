<?php

namespace App\Repositories\Interfaces;

use SergiX44\Nutgram\Nutgram;

interface FileInterface
{

    public function store(string $type): bool;

}
