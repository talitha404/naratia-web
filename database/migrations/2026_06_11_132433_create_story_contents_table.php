<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('story_contents', function (Blueprint $table) {
            $table->id(); // id (BigInteger, Primary Key)
            $table->integer('chapter_number'); // chapter_number (int)
            $table->string('title'); // title (varchar)
            $table->longText('content'); // content (longtext)
            
            // story_id sebagai FK dari tabel stories
            $table->foreignId('story_id')->constrained('stories')->onDelete('cascade');
            
            $table->timestamps(); // otomatis membuat created_at dan updated_at (timestamp)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('story_contents');
    }
};
