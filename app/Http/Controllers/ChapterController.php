<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Story;

class ChapterController extends Controller
{
    // ✅ Form untuk buat chapter baru
    public function create(Request $request)
    {
        $storyId = $request->query('story_id'); // ambil story_id dari query string
        $story   = Story::findOrFail($storyId);

        return view('write.editor', compact('story'));
    }

    // ✅ Simpan chapter baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'story_id' => 'required|exists:stories,id',
            'title'    => 'required|max:255',
            'content'  => 'required',
            'status'   => 'required|in:draft,published',
        ]);

        // generate nomor chapter otomatis
        $lastChapter = Chapter::where('story_id', $request->story_id)
                            ->orderBy('chapter_number', 'desc')
                            ->first();
        $validated['chapter_number'] = $lastChapter ? $lastChapter->chapter_number + 1 : 1;

        $chapter = Chapter::create($validated);

        if ($request->status === 'published') {
            return redirect()->route('write.preview', ['id' => $request->story_id])
                            ->with('success', 'Chapter berhasil dipublikasikan!');
        }

        return redirect()->route('write.editor', ['id' => $chapter->story_id])
                        ->with('success', 'Chapter berhasil disimpan!')
                        ->with('chapter_id', $chapter->id);
    }

    public function destroy(int $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();

        return redirect()->route('write.index')
                        ->with('success', 'Chapter berhasil dihapus!');
    }

}
