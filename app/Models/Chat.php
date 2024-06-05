<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'type',
        'first_name',
        'last_name',
        'username',
        'from',
    ];

    protected $casts = [
        'from' => 'array',
    ];
}
