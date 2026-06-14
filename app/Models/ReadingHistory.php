<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingHistory extends Model
{
    // Tambahkan $fillable agar mass assignment (updateOrCreate) tidak error
    protected $fillable = ['user_id', 'story_id', 'updated_at'];
}