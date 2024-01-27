<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->boolean('enable_language_selection')->default(true);
            $table->boolean('enable_phone_number')->default(false);
            $table->string('language_selection_mode')->default('markup');

            //bot configurations
            $table->string('bot_token')->nullable();
            $table->string('bot_username')->nullable();
            $table->string('bot_full_name')->nullable();
            $table->string('webhook_url')->nullable();
            $table->boolean('webhook_was_set')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
