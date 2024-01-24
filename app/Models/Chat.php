<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'chat_id',
        'first_name',
        'last_name',
        'username',
        'type',
        'from'
    ];


    protected $casts = [
      'form' => 'array'
    ];

}
