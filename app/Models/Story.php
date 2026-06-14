<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['user_id', 'genre_id', 'title', 'description', 'cover_image'];
        
    public function chapters() {
        return $this->hasMany(Chapter::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}