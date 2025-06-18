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
        Schema::create('song_suggestions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->boolean('added_by_admin')->nullable();
            $table->string('album')->nullable();
            $table->string('cover')->nullable();
            $table->string('username')->nullable();
            $table->string('spotify_id')->nullable();
            $table->string('spotify_url')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('song_suggestions');
    }
};
