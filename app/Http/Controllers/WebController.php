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
            'password'       => Hash::make($request->password), // Password harus di-hash!
        ]);

        return redirect()->route('login.page')
                         ->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }

    // 2. Proses Login
    public function login(Request $request) 
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // simpan user_id ke session
            session(['login' => $user->id, 'user' => $user]);
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

    // 4. Proses Update Profil
    public function updateProfil(Request $request) 
    {
        $request->validate([
            'username'       => 'required|max:255',
            'bio'            => 'nullable|max:1000',
            'character_name' => 'required|max:255',
        ]);

        $user = session('user');

        // Data yang akan diupdate
        $dataUpdate = [
            'username'       => $request->username,
            'character_name' => $request->character_name,
            'bio'            => $request->bio,
        ];

        // Proses simpan gambar (jika ada)
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $dataUpdate['avatar'] = $path;
        }

        // Melakukan update ke database
        User::where('id', $user->id)->update($dataUpdate);

        // Refresh session dengan data terbaru agar tampil di UI
        session(['user' => User::find($user->id)]);

        return redirect()->route('profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // === 5. FUNGSI UNTUK SWITCH ROLE (PEMBACA <-> PENULIS) ===
    public function switchRole()
    {
        $userId = session('user')->id; 
        $user = \App\Models\User::find($userId);

        if ($user) {
            // Logika bolak-balik (toggle) role
            if ($user->role === 'penulis') {
                $user->role = 'pembaca';
                $user->save();
                session(['user' => $user]); // Refresh session

                // Jika dari Penulis ubah ke Pembaca (lewat icon profil), arahkan ke profil
                return redirect('/profil');
            } else {
                $user->role = 'penulis';
                $user->save();
                session(['user' => $user]); // Refresh session

                // Jika dari Pembaca setuju jadi Penulis (lewat popup penawaran), masuk ke dashboard nulis
                return redirect('/write');
            }
        }

        return back();
    }
}