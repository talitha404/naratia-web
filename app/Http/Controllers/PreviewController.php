<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Story;

class PreviewController extends Controller
{
    public function preview(int $id)
    {
        $story = Story::findOrFail($id);
        $chapters = Chapter::where('story_id', $id)
                        ->orderBy('chapter_number')
                        ->get();

        return view('write.preview', compact('story', 'chapters'));
    }
}
