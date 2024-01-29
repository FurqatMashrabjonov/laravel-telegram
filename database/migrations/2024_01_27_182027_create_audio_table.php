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
    { //it contains telegram audio files
        Schema::create('audio', function (Blueprint $table) {
            $table->id();
            $table->string('file_id');
            $table->string('file_unique_id');
            $table->string('file_name');
            $table->string('mime_type');
            $table->integer('file_size');
            $table->integer('duration');
            $table->string('performer')->nullable();
            $table->string('title')->nullable();
            $table->string('thumb_file_id')->nullable();
            $table->string('thumb_file_unique_id')->nullable();
            $table->integer('thumb_file_size')->nullable();
            $table->json('thumbnail')->nullable();
            $table->string('file_path')->nullable();
            $table->string('thumbnail_file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
};
