<?php

namespace App\Models;

use App\Traits\FileSize;
use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    use FileSize;

    protected $fillable = [
        'file_id',
        'file_unique_id',
        'mime_type',
        'duration',
        'file_size',
        'file_path'
    ];
}
