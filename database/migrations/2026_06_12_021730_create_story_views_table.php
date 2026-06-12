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
        Schema::create('story_views', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel stories
            $table->foreignId('story_id')->constrained()->onDelete('cascade');
            // Menghubungkan ke tabel users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Timestamp untuk mencatat waktu view
            $table->timestamp('viewed_at')->useCurrent(); 
            
            // Opsional: Mencegah user yang sama tercatat double untuk story yang sama
            $table->unique(['story_id', 'user_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('story_views');
    }
};
