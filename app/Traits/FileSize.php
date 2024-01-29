<?php

namespace App\Traits;

use Illuminate\Support\Number;

trait FileSize
{

    public function getFileSizeAttribute(): string
    {
        return Number::fileSize($this->attributes['file_size']);
    }

}
