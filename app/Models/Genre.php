<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Tentukan kolom apa saja yang bisa diisi
    protected $fillable = ['name', 'slug'];

    // Relasi ke Story (Jika nanti dibutuhkan)
    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}