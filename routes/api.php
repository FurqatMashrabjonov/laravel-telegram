<?php

use App\Http\Controllers\Telegram\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post('webhook', [WebhookController::class, 'handle']);
