<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story; 
use App\Models\Genre; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // === 1. LOGIKA PENCEGAT PEMBACA (Dipindahkan dari Route) ===
        // Menggunakan session seperti di route lama kamu
        $user = session('user');
        $role = is_array($user) ? ($user['role'] ?? 'pembaca') : ($user->role ?? 'pembaca');

        // Kalau dia bukan penulis, arahkan ke view penawaran (popup)
        if ($role !== 'penulis') {
            return view('write.offer');
        }

        // Ambil ID user dari session (antisipasi format array atau object)
        $userId = is_array($user) ? ($user['id'] ?? Auth::id()) : ($user->id ?? Auth::id());


        // === 2. PENGAMBILAN DATA UTAMA & STATISTIK ===
        // Ambil data cerita milik user untuk daftar tulisan biasa
        $stories = Story::where('user_id', $userId)->latest()->get();

        // Ambil statistik jumlah cerita per genre khusus milik user yang login
        $genreStats = DB::table('stories')
            ->join('genres', 'stories.genre_id', '=', 'genres.id')
            // Di sini kita ambil kolom asli 'genres.genre_name' 
            ->select('genres.genre_name as genre_name', DB::raw('count(stories.id) as total'))
            ->where('stories.user_id', $userId)
            // Pastikan di bagian groupBy ini juga diubah menjadi 'genres.genre_name'
            ->groupBy('genres.id', 'genres.genre_name') 
            ->get();

        // Pecah data menjadi array terpisah untuk chart
        $chartLabels = $genreStats->pluck('genre_name')->toArray();
        $chartData = $genreStats->pluck('total')->toArray();

        // Kirimkan semua variabel lengkap ke halaman write.index
        return view('write.index', compact('stories', 'chartLabels', 'chartData'));
    }
}