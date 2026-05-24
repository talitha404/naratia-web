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
        Schema::create('katalog_novel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');      // Tambah kolom judul
            $table->string('penulis');    // Tambah kolom penulis
            $table->string('genre');      // Tambah kolom genre (Romance/Fantasy/Magic)
            $table->text('sinopsis');     // Tambah kolom sinopsis
            $table->text('isi_bab');      // Tambah kolom isi bab cerita
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_novel');
    }
};