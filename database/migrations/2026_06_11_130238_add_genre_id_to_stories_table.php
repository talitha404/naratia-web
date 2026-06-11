<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            // Menambahkan kolom genre_id dan menghubungkannya sebagai Foreign Key
            // constrained() otomatis mendeteksi bahwa kolom ini merujuk ke tabel 'genres'
            $table->foreignId('genre_id')->nullable()->after('id')->constrained()->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            // Untuk membatalkan (rollback) jika diperlukan
            $table->dropForeign(['genre_id']);
            $table->dropColumn('genre_id');
        });
    }
};
