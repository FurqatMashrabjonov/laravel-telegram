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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('file_id');
            $table->string('file_unique_id');
            $table->string('file_name');
            $table->string('mime_type');
            $table->integer('file_size');
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
        Schema::dropIfExists('documents');
    }
};
