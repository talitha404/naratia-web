<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WriteController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('landing.index'));
Route::get('/masuk', fn() => view('auth.login'))->name('login.page');
Route::get('/daftar', fn() => view('auth.register'))->name('register.page');

Route::post('/login', [WebController::class, 'login'])->name('login');
Route::post('/register', [WebController::class, 'register'])->name('register.submit');
Route::post('/logout', [WebController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (Memerlukan Login)
|--------------------------------------------------------------------------
*/
Route::middleware('check.login')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');
    Route::get('/search', fn() => view('search.index'))->name('search');

    // Profil Group
    Route::prefix('profil')->group(function () {
        Route::get('/', fn() => view('profil.index'))->name('profil');
        Route::get('/edit', fn() => view('profil.edit'))->name('profil.edit');
        Route::post('/update', [WebController::class, 'updateProfil'])->name('profil.update');
    });

    // Write Group
    Route::prefix('write')->group(function () {
        Route::get('/', fn() => view('write.index'))->name('write.index');
        // Route::get('/buatcerita', fn() => view('write.buatcerita'))->name('write.buatcerita'); entah ini apa gunanya
        Route::get('/write/buatcerita', [WriteController::class, 'create'])->name('write.buatcerita'); //kuncinya disini untuk akses ke halaman buat cerita
        Route::post('/write', [WriteController::class, 'store'])->name('write.store');
        Route::get('/buat-cerita', [WriteController::class, 'create']);
        // Save draft and open editor
        Route::post('/', [WriteController::class, 'store'])->name('write.store');
        Route::get('/editor/{id}', [WriteController::class, 'editor'])->name('write.editor');
        // Pratinjau (preview) route for drafts
        Route::get('/pratinjau/{id}', [WriteController::class, 'preview'])->name('write.preview');
        Route::get('/write/create', [WriteController::class, 'create'])->name('write.create');
        Route::get('/write/{id}/edit', [WriteController::class, 'edit'])->name('write.edit');
    });
});

/*
|--------------------------------------------------------------------------
| PUBLIC CONTENT ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/library', fn() => view('library.index'))->name('library');
Route::get('/story/{id}', fn($id) => view('stories.show', ['id' => $id]))->name('story.show');
Route::get('/read/{chapter_id}', fn($chapter_id) => view('stories.read', ['chapter_id' => $chapter_id]))->name('story.read');
Route::get('/stories/read/{id}', function ($id) {
    return view('stories.read');
});