<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| HALAMAN LANDING & AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('landing.index'); });
Route::get('/masuk', function () { return view('auth.masuk'); })->name('login.page');
Route::get('/daftar', function () { return view('auth.daftar'); })->name('register.page');

/*
|--------------------------------------------------------------------------
| PROSES AUTH (POST)
|--------------------------------------------------------------------------
*/
Route::post('/login', function (Request $request) {
    session([
        'login' => true,
        'user' => [
            'name' => 'User Login', // Bisa disesuaikan nanti
            'email' => $request->email,
            'username' => 'user_login',
            'avatar' => null
        ]
    ]);
    return redirect('/dashboard');
})->name('login');

Route::post('/register', function (Request $request) {
    session([
        'login' => true,
        'user' => [
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            'avatar'   => null
        ]
    ]);
    return redirect('/dashboard');
})->name('register.submit');

Route::post('/logout', function () {
    session()->forget(['login', 'user']);
    return redirect('/masuk');
})->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD & PROFIL
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (!session('login')) return redirect('/masuk');
    return view('dashboard.index'); 
})->name('dashboard');

Route::get('/profil', function () {
    if (!session('login')) return redirect('/masuk');
    return view('profil.index');
})->name('profil');

Route::get('/profil/edit', function () {
    if (!session('login')) return redirect('/masuk');
    return view('profil.edit');
})->name('profil.edit');

Route::post('/profil/update', function (Request $request) {
    if (!session('login')) return redirect('/masuk');
    
    $oldUser = session('user');
    
    session(['user' => [
        'name'     => $request->name,
        'username' => $request->username,
        'email'    => $oldUser['email'], // Email dikunci
        'avatar'   => $oldUser['avatar']
    ]]);
    
    return redirect('/profil')->with('success', 'Profil berhasil diupdate!');
})->name('profil.update');