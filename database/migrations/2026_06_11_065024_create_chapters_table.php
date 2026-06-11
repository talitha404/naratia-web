<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('story_id')->constrained('stories')->onDelete('cascade'); // Nyambung ke novel
            $table->string('title');
            $table->longText('content'); // Tempat isi cerita
            $table->integer('chapter_number');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('chapters');
    }
};