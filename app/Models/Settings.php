<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'enable_language_selection',
        'enable_phone_number',
        'language_selection_mode',
        'bot_token',
        'bot_username',
        'bot_full_name',
        'webhook_url',
        'webhook_was_set',

    ];

    public $timestamps = false;


    public function getRouteKeyName(): string
    {
        return 'key';
    }

}
