<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function story() {
        return $this->belongsTo(Story::class);
    }

    protected $fillable = [
        'story_id', 'title', 'content', 'chapter_number', 'status'
    ];
}