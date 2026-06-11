<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriteController extends Controller
{
    // Simpan draft sederhana ke session lalu redirect ke editor
    public function store(Request $request)
    {
        $data = [
            'title' => $request->input('title', ''),
            'description' => $request->input('description', ''),
            'type' => $request->input('type', ''),
        ];

        $id = (string) time();

        $drafts = session('drafts', []);
        $drafts[$id] = array_merge(['id' => $id, 'created_at' => now()->toDateTimeString()], $data);
        session(['drafts' => $drafts]);

        return redirect()->route('write.editor', ['id' => $id]);
    }

    // Tampilkan editor dan berikan data draft jika ada
    public function editor($id)
    {
        $drafts = session('drafts', []);
        $story = $drafts[$id] ?? null;

        return view('write.editor', ['story' => $story]);
    }
}
