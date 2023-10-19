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
        Schema::create('category_video', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();
            $table->foreignId('video_id')
                ->constrained('videos')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_video');
    }
};