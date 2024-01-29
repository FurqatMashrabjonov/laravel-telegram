<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'first_name',
        'last_name',
        'username',
        'type',
        'from',
        'lang',
        'role'
    ];


    protected $casts = [
      'form' => 'array'
    ];

}
