<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::dropIfExists('story_contents');
    }

    public function down(): void {
        // Logika untuk membuat kembali jika di-rollback (opsional untuk MVP)
    }
};
