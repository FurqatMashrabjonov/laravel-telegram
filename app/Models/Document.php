<?php

namespace App\Models;

use App\Traits\FileSize;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use FileSize;

    protected $fillable = [
        'file_id',
        'file_unique_id',
        'file_name',
        'mime_type',
        'file_size',
        'thumbnail',
        'file_path',
        'thumbnail_file_path',
    ];

    protected $casts = [
        'thumbnail' => 'array',
    ];
}
