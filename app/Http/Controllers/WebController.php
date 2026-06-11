<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebController extends Controller
{
    // 1. Proses Pendaftaran
    public function register(Request $request) 
    {
        $request->validate([
            'username'       => 'required|unique:users|max:255',
            'character_name' => 'required|max:255',
            'email'          => 'required|email|unique:users|max:255',
            'password'       => 'required|min:6',
        ]);

        User::create([
            'username'       => $request->username,
            'character_name' => $request->character_name,
            'email'          => $request->email,
            'password'       => $request->password, 
        ]);

        return redirect()->route('login.page')
                         ->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }

    // 2. Proses Login
    public function login(Request $request) 
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['login' => true, 'user' => $user]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    // 3. Proses Logout
    public function logout() 
    {
        session()->flush();
        return redirect()->route('login.page');
    }

    // 4. Proses Update Profil (Wajib ada agar tidak error!)
    public function updateProfil(Request $request) 
    {
        $request->validate([
            'username'       => 'required|max:255',
            'character_name' => 'required|max:255',
        ]);

        $user = session('user');

        User::where('id', $user->id)->update([
            'username'       => $request->username,
            'character_name' => $request->character_name,
        ]);

        // Refresh session dengan data terbaru
        session(['user' => User::find($user->id)]);

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
    }
}