<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingHistory; 
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalBaca = ReadingHistory::where('user_id', $userId)->count();
        if ($totalBaca == 0) {
            $weeklyData = [3, 5, 2, 8, 4, 6, 1]; 
        } else {
            $weeklyData = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i)->format('Y-m-d');
                $weeklyData[] = ReadingHistory::where('user_id', $userId)
                    ->whereDate('updated_at', $date)
                    ->count();
            }
        }

        return view('profil.index', compact('totalBaca', 'weeklyData'));
    }
}