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
        Schema::table('reading_histories', function (Blueprint $table) {
            // Menambahkan foreignId untuk user_id dan story_id setelah kolom 'id' asli
            $table->foreignId('user_id')->after('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('story_id')->after('user_id')->constrained('stories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reading_histories', function (Blueprint $table) {
            // Menghapus foreign key dan kolom jika database di-rollback
            $table->dropForeign(['user_id']);
            $table->dropForeign(['story_id']);
            $table->dropColumn(['user_id', 'story_id']);
        });
    }
};