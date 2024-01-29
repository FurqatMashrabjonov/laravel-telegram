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
    {   //it should contain telegram photoSize
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('file_id');
            $table->string('file_unique_id');
            $table->string('file_size')->nullable();
            $table->string('width');
            $table->string('height');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
