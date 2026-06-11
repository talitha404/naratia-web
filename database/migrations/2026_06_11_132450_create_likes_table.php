<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            // FK dari tabel stories
            $table->foreignId('story_id')->constrained('stories')->onDelete('cascade');
            
            // FK dari tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // (Opsional) Menjadikan kombinasi keduanya sebagai Primary Key agar user tidak bisa like cerita yang sama 2x
            $table->primary(['story_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
