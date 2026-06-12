<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            // Menambahkan kolom timestamps bawaan Laravel
            $table->timestamps(); 
            
            // ATAU jika hanya ingin 1 kolom kustom gunakan kode di bawah ini:
            // $table->timestamp('liked_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::table('likes', function (Blueprint $table) {
            // Menghapus kembali kolom jika migration di-rollback
            $table->dropTimestamps();
            
            // JIKA menggunakan kolom kustom liked_at gunakan kode ini:
            // $table->dropColumn('liked_at');
        });
    }
};