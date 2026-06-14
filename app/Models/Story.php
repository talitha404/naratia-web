<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Tambahan perbaikan di sini

class Story extends Model
{
    use HasFactory;    

    protected $fillable = ['user_id', 'genre_id', 'title', 'description', 'cover_image'];
        
    public function chapters() {
        return $this->hasMany(Chapter::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }
}