<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['genre_name' => 'Fantasi', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Fiksi Ilmiah', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Romantis', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Misteri', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Thrilller', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Horor', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Sejarah', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Komedi', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Drama', 'created_at' => now(), 'updated_at' => now()],
            ['genre_name' => 'Aksi', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('genres')->insert($genres);
    }
}