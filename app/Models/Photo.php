<?php

namespace App\Models;

use App\Traits\FileSize;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use FileSize;

    protected $fillable = [
        'file_id',
        'file_unique_id',
        'file_size',
        'width',
        'height',
        'file_path',
    ];

    protected $casts = [
        'thumbnail' => 'array',
    ];
}
