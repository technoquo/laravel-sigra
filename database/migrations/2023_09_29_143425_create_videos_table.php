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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('age_id')
                ->nullable()
                ->constrained('ages')
                ->cascadeOnDelete();
            $table->foreignId('subcategory_id')
                ->nullable()
                ->constrained('subcategories')
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('vimeo');
            $table->enum('type', ['publique', 'privé'])
                ->default('publique');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
