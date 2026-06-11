<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            // Menghapus kolom genre (varchar) lama
            $table->dropColumn('genre');
        });
    }

    public function down(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            // Jika di-rollback, kolom genre varchar akan dikembalikan
            $table->string('genre')->nullable();
        });
    }
};
