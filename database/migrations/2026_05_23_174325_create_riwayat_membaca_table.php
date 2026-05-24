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
        Schema::create('riwayat_membaca', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel users (jika user dihapus, riwayatnya ikut terhapus)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Menghubungkan ke tabel katalog_novel (jika novel dihapus, riwayatnya ikut terhapus)
            $table->foreignId('novel_id')->constrained('katalog_novel')->onDelete('cascade');
            // Menandakan status buku: 'disimpan' (di rak) atau 'riwayat' (baru dibaca)
            $table->string('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_membaca');
    }
};