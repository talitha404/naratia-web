<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WriteController;
use App\Http\Controllers\ChapterController;

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

    // === TAMBAHAN UNTUK ROLE PENULIS (CUMA 2 BARIS INI) ===
    Route::get('/nulis/join', [WebController::class, 'showJoinPage'])->name('nulis.join');
    Route::post('/update-role', [WebController::class, 'becomeWriter'])->name('user.become-writer');
    // ==

    // Profil Group
    Route::prefix('profil')->group(function () {
        Route::get('/', fn() => view('profil.index'))->name('profil');
        Route::get('/edit', fn() => view('profil.edit'))->name('profil.edit');
        Route::post('/update', [WebController::class, 'updateProfil'])->name('profil.update');
        Route::post('/switch-role', [WebController::class, 'switchRole'])->name('user.switch-role');
        Route::get('/cetak-report', [WebController::class, 'cetakReport'])->name('pembaca.cetak-report');
    });

    // Write Group
    Route::prefix('write')->group(function () {
        
        // --- INI ROUTE YANG KITA UBAH UNTUK MENCEGAT PEMBACA ---
        Route::get('/', function () {
            $user = session('user');
            $role = is_array($user) ? ($user['role'] ?? 'pembaca') : ($user->role ?? 'pembaca');
            
            // Kalau dia pembaca, arahkan ke view penawaran
            if ($role !== 'penulis') {
                return view('write.offer');
            }
            // Kalau penulis, masuk dashboard biasa
            return view('write.index');
        })->name('write.index');
        
        // Route::get('/buatcerita', fn() => view('write.buatcerita'))->name('write.buatcerita'); entah ini apa gunanya
        Route::get('/write/buatcerita', [WriteController::class, 'create'])->name('write.buatcerita'); //kuncinya disini untuk akses ke halaman buat cerita
        Route::post('/write', [WriteController::class, 'store'])->name('write.store');
        Route::get('/chapters/create', [ChapterController::class, 'create'])->name('chapters.create');
        Route::post('/chapters', [ChapterController::class, 'store'])->name('chapters.store');
        Route::delete('/chapters/{id}', [ChapterController::class, 'destroy'])->name('chapters.destroy');
        Route::get('/write/preview/{id}', [WriteController::class, 'preview'])->name('write.preview');
        Route::put('/chapters/{id}', [ChapterController::class, 'update'])->name('chapters.update'); // route untuk update
        Route::get('/chapters/{id}/editor', [ChapterController::class, 'editor'])->name('chapters.editor'); // route arah ke editor
        Route::get('/write/editor/{id}', [WriteController::class, 'editor'])->name('write.editor');
        Route::get('/editor/{id}', [WriteController::class, 'editor'])->name('write.editor'); //route lama kunci chapter
        Route::get('/buat-cerita', [WriteController::class, 'create']);
        // Save draft and open editor
        Route::post('/', [WriteController::class, 'store'])->name('write.store');
        // Route::get('/editor/{id}', [WriteController::class, 'editor'])->name('write.editor');
        // Pratinjau (preview) route for drafts
        // Route::get('/pratinjau/{id}', [WriteController::class, 'preview'])->name('write.preview');
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