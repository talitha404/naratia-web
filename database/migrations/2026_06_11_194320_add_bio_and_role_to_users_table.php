<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Menyisipkan kolom baru ke tabel yang sudah ada
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')->nullable();
            $table->string('role')->default('user');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bio', 'role']);
        });
    }
};