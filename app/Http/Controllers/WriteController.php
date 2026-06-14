<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Story;
use App\Models\Genre;
use App\Models\Chapter;

class WriteController extends Controller
{
    // ✅ Menampilkan daftar cerita milik user
    public function index() {
        $stories = Story::where('user_id', Auth::id())->latest()->get();
        $genres = Genre::all();
        return view('write.index', compact('stories','genres'));
    }

    // ✅ Menampilkan form buat cerita baru
    public function create() {
        $genres = Genre::all();
        return view('write.buatcerita', compact('genres'));
    }

    // ✅ Membuat cerita baru
    public function store(Request $request) {
        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'genre_id'    => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120'
        ]);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        $story = Story::create([
            'user_id'     => Auth::id(),
            'genre_id'    => $request->genre_id,
            'title'       => $request->title,
            'description' => $request->description,
            'cover_image' => $coverPath,
            'status'      => 'draft',
        ]);

        return redirect()->route('chapters.create', ['story_id' => $story->id])
                         ->with('success', 'Cerita berhasil dibuat!');
    }

    // ✅ Edit cerita
    public function edit(int $id) {
        $story  = Story::findOrFail($id);
        $genres = Genre::all();
        return view('write.buatcerita', compact('story', 'genres'));
    }

    // ✅ Update cerita
    public function update(Request $request, int $id) {
        $story = Story::findOrFail($id);

        $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'genre_id'    => 'nullable',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120'
        ]);

        if ($request->hasFile('cover_image')) {
            // Hapus gambar lama kalau ada
            if ($story->cover_image) {
                Storage::disk('public')->delete($story->cover_image);
            }
            // Simpan gambar baru
            $story->cover_image = $request->file('cover_image')->store('covers', 'public');
        }

        $story->title       = $request->title;
        $story->description = $request->description;
        if ($request->genre_id) {
            $story->genre_id = $request->genre_id;
        }
        $story->save();

        return redirect()->route('write.index')->with('success', 'Cerita berhasil diperbarui!');
    }

    // ✅ Menampilkan editor untuk chapter baru
    public function createChapter(Story $story) {
        return view('write.editor', compact('story'));
    }

    // ✅ Simpan chapter baru
    // public function storeChapter(Request $request, Story $story) {
    //     $validated = $request->validate([
    //         'title'          => 'required|max:255',
    //         'content'        => 'required',
    //         'chapter_number' => 'required|integer'
    //     ]);

    //     Chapter::create([
    //         'story_id'       => $story->id,
    //         'title'          => $validated['title'],
    //         'content'        => $validated['content'],
    //         'chapter_number' => $validated['chapter_number'],
    //     ]);

    //     return redirect()->route('write.index')->with('success', 'Chapter berhasil disimpan!');
    // }

    public function editor(int $id)
    {
        $story = Story::findOrFail($id);
        $chapters = Chapter::where('story_id', $id)->get();

        // ambil chapter terakhir yang baru saja dibuat
        $activeChapter = session('chapter_id')
            ? Chapter::find(session('chapter_id'))
            : $chapters->last();

        return view('write.editor', compact('story', 'chapters', 'activeChapter'));
    }

    public function preview(int $id)
    {
        $story = Story::findOrFail($id);
        $chapters = Chapter::where('story_id', $id)
                        ->orderBy('chapter_number')
                        ->get();

        return view('write.pratinjau', compact('story', 'chapters'));
    }

    // ✅ Hapus cerita dan semua bab-nya
    public function destroy(int $id) {
        $story = Story::findOrFail($id);
        
        // Hapus file gambar cover jika ada
        if ($story->cover_image) {
            Storage::disk('public')->delete($story->cover_image);
        }
        
        // Hapus cerita (bab-babnya akan ikut terhapus kalau di database di-set cascade)
        $story->delete();
        
        return redirect()->route('write.index')->with('success', 'Cerita berhasil dihapus!');
    }
}
