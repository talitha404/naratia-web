<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ (isset($story) && is_object($story)) ? 'Edit Cerita' : 'Buat Cerita' }} - Naratia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Keadaan tombol saat normal (tidak dipilih) */
        .genre-btn-custom {
            background-color: #1e293b !important; /* bg-slate-800 */
            color: #cbd5e1 !important;           /* text-slate-300 */
            border: 1px solid #334155 !important;/* border-slate-700 */
            cursor: pointer;
        }

        /* Efek HOVER ungu saat kursor mendekat */
        .genre-btn-custom:hover {
            border-color: #a855f7 !important;    /* border-purple-500 */
            color: #c084fc !important;           /* text-purple-400 */
            background-color: #1e293b99 !important;
        }

        /* Keadaan AKTIF saat tombol dipilih */
        .genre-btn-custom.active-genre {
            background-color: #9333ea !important; /* bg-purple-600 */
            color: #ffffff !important;           /* text-white */
            border-color: #a855f7 !important;    /* border-purple-500 */
            box-shadow: 0 4px 6px -1px rgba(168, 85, 247, 0.2) !important;
            font-weight: 800 !important;
        }
    </style>
</head>
<body class="text-slate-200 font-sans antialiased min-h-screen bg-slate-950">

    <header class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-slate-950/40 backdrop-blur-md border-b border-slate-800">
        <div class="flex items-center gap-4">
            <div>
                <p class="text-xs text-slate-400 font-medium tracking-wide">
                    {{ (isset($story) && is_object($story)) ? 'Perbarui Informasi Cerita' : 'Tambahkan Informasi Cerita' }}
                </p>
                @if(isset($story) && is_object($story))
                    <h1 class="text-lg font-bold text-white tracking-tight">{{ $story->title }}</h1>
                @endif
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button 
                type="button" 
                onclick="window.history.back()" 
                class="px-5 py-2 text-sm font-semibold text-slate-300 hover:text-white rounded-full bg-transparent hover:bg-slate-800/50 transition-all">
                Batalkan
            </button>
            <!-- SAMPAI SINI, EROR DI TOMBOL BAWAH -->
            <!-- <button form="create-story-form" type="submit" class="px-5 py-2 text-sm font-semibold text-slate-950 bg-white hover:bg-slate-200 rounded-full transition-all shadow-md shadow-white/5">
                {{ (isset($story) && is_object($story)) ? 'Simpan Perubahan' : 'Simpan & Lanjutkan' }}
            </button> -->
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-4 gap-10">
        
        <div class="md:col-span-1 flex flex-col items-center">
            <div id="cover-zone" class="w-full max-w-44 aspect-2/3 bg-slate-900/60 border-2 border-dashed border-slate-700 hover:border-slate-500 rounded-xl flex flex-col items-center justify-center p-4 cursor-pointer group transition-all backdrop-blur-sm relative overflow-hidden">
                
                @if(isset($story) && is_object($story) && $story->cover_image)
                    <img id="cover-preview" src="{{ asset('storage/' . $story->cover_image) }}" class="absolute inset-0 w-full h-full object-cover">
                @else
                    <img id="cover-preview" src="" class="absolute inset-0 w-full h-full object-cover hidden">
                @endif

                <div id="cover-placeholder" class="flex flex-col items-center justify-center text-center {{ (isset($story) && is_object($story) && $story->cover_image) ? 'hidden' : '' }}">
                    <div class="p-3 bg-slate-800/50 rounded-full text-slate-400 group-hover:text-slate-200 transition-colors mb-3">
                        <i data-lucide="image" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-medium text-slate-400 group-hover:text-slate-200 transition-colors">
                        Tambahkan sampul
                    </span>
                </div>
                
                <div class="absolute bottom-3 right-3 text-slate-500 z-10">
                    <i data-lucide="info" class="w-4 h-4"></i>
                </div>
            </div>
            @error('cover_image')
                <p class="text-xs text-red-500 mt-2 text-center">{{ $message }}</p>
            @enderror
        </div>

        <div class="md:col-span-3 space-y-8 bg-slate-900/20 p-6 md:p-8 rounded-2xl backdrop-blur-sm border border-slate-800/50">
            
            <div class="border-b border-slate-800 pb-2">
                <span class="text-sm font-bold text-purple-500 border-b-2 border-purple-500 pb-2.5 tracking-wide">
                    Detail Cerita
                </span>
            </div>

            <form id="create-story-form" action="{{ (isset($story) && is_object($story)) ? route('write.update', $story->id) : route('write.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if(isset($story) && is_object($story))
                    @method('PUT')
                @endif

                @if ($errors->any())
                    <div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 6px; border: 1px solid #f5c6cb;">
                        <p style="margin-top: 0; font-weight: bold;">Ups! Cerita gagal disimpan karena beberapa hal berikut:</p>
                        <ul style="margin-bottom: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <input type="file" name="cover_image" id="cover_image" class="hidden" accept="image/*">
                
                <div class="space-y-2">
                    <label class="block text-sm font-bold tracking-wide">
                        Judul<span class="text-red-500 ml-0.5">*</span>
                    </label>
                    <input name="title" type="text" value="{{ old('title', is_object($story ?? null) ? $story->title : ($story['title'] ?? '')) }}" placeholder="Cerita Tak Berjudul" required
                        class="w-full px-4 py-3 bg-slate-950/50 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-white placeholder-slate-600 transition-all">
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex items-center gap-1.5">
                        <label class="block text-sm font-bold tracking-wide">
                            Deskripsi<span class="text-red-500 ml-0.5">*</span>
                        </label>
                        <i data-lucide="info" class="w-4 h-4 text-slate-400 cursor-help" title="Tuliskan sinopsis singkat ceritamu"></i>
                    </div>
                    <textarea name="description" rows="6" required placeholder="Tulis sinopsis ceritamu di sini..."
                        class="w-full px-4 py-3 bg-slate-950/50 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-white placeholder-slate-600 transition-all resize-y">{{ old('description', is_object($story ?? null) ? $story->description : ($story['description'] ?? '')) }}</textarea>
                    @error('description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @if(isset($story) && is_object($story))
                <div class="space-y-2">
                    <div class="flex items-center gap-1.5">
                        <label class="block text-sm font-bold tracking-wide">Chapter</label>
                        <i data-lucide="info" class="w-4 h-4 text-slate-400 cursor-help" title="Pilih bab yang ingin diubah atau tambahkan bab baru"></i>
                        
                        <a href="{{ route('chapters.create', $story->id) }}" class="ml-auto px-3 py-1 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Tambah chapter
                        </a>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-2xl">
                        Untuk edit chapter, pilih chapter yang akan diedit lalu klik tombol muat/pilih.
                    </p>
                    <div class="flex gap-2">
                        <select id="chapter-select" class="w-full px-4 py-3 bg-slate-950/50 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-white transition-all">
                            @if(isset($story->chapters) && count($story->chapters) > 0)
                                @foreach($story->chapters as $ch)
                                    <option value="{{ $ch->id }}">Chapter {{ $ch->chapter_number }}: {{ $ch->title }}</option>
                                @endforeach
                            @else
                                <option value="">Belum ada chapter dibuat</option>
                            @endif
                        </select>
                        <button type="button" onclick="editSelectedChapter()" class="px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-xl hover:bg-indigo-500 transition-all">
                            Edit
                        </button>
                    </div>
                </div>
                @endif

                <div class="flex flex-wrap gap-2.5 pt-1"> 
                    @foreach($genres as $genre) 
                        @php
                            $currentGenreId = is_object($story ?? null) ? ($story->genre_id ?? '') : ($story['genre_id'] ?? '');
                            $isChosen = old('genre_id', $currentGenreId) == $genre->id;
                        @endphp
                        <button type="button" 
                                class="genre-btn-custom px-4 py-2 text-xs rounded-full transition-all duration-200 {{ $isChosen ? 'active-genre' : '' }}"
                                onclick="selectGenre(this, '{{ $genre->id }}')">
                            {{ $genre->name ?? $genre->genre_name ?? 'Tanpa Nama' }}
                        </button>
                    @endforeach
                </div>

                <!-- Hidden input untuk menyimpan genre yang dipilih -->
                <input type="hidden" id="selected-genre-id" name="genre_id" value="{{ old('genre_id', $currentGenreId) }}">

            </form>
        </div>
    </main>

    <script>
        // Inisialisasi Lucide Icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        const coverZone = document.getElementById('cover-zone');
        const coverInput = document.getElementById('cover_image'); // Diperbaiki id pemanggil objek
        const coverPreview = document.getElementById('cover-preview');
        const coverPlaceholder = document.getElementById('cover-placeholder');

        if(coverZone && coverInput) {
            coverZone.addEventListener('click', () => coverInput.click());
            coverInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        coverPreview.src = e.target.result;
                        coverPreview.classList.remove('hidden');
                        coverPlaceholder.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        function selectGenre(buttonElement, genreId) {
            // 1. Isi hidden input
            const hiddenInput = document.getElementById('selected-genre-id');
            if (hiddenInput) {
                hiddenInput.value = genreId;
            }

            // 2. Reset semua tombol genre
            document.querySelectorAll('.genre-btn-custom').forEach(btn => {
                btn.classList.remove('active-genre');
            });

            // 3. Aktifkan tombol yang diklik
            buttonElement.classList.add('active-genre');
}


        function editSelectedChapter() {
            const selectEl = document.getElementById('chapter-select');
            if(selectEl) {
                const chapterId = selectEl.value;
                if (chapterId) {
                    window.location.href = "/write/chapters/" + chapterId + "/edit";
                } else {
                    alert('Belum ada chapter yang dipilih atau dibuat.');
                }
            }
        }
    </script>
</body>
</html>