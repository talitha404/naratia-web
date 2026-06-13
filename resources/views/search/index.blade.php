<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian - Naratia</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        
        .space-bg {
            background-color: #02040f; 
            background-image: 
                radial-gradient(white, rgba(255,255,255,.3) 1px, transparent 2px),
                radial-gradient(white, rgba(255,255,255,.2) 0.5px, transparent 1.5px),
                radial-gradient(white, rgba(255,255,255,.1) 1px, transparent 2px);
            background-size: 250px 250px, 150px 150px, 100px 100px;
            background-position: 0 0, 40px 60px, 130px 270px;
            background-attachment: fixed;
        }

        .text-shadow-md { text-shadow: 0 2px 4px rgba(0,0,0,0.8); }
    </style>
</head>
<body class="space-bg text-white min-h-screen">

    <header class="flex justify-between items-center p-6 sticky top-0 bg-black/20 backdrop-blur-xl z-20 border-b border-white/10 shadow-sm">
        <h1 class="text-2xl font-black tracking-tighter text-white">NARATIA</h1>
    </header>

    <div class="max-w-7xl mx-auto p-6 text-white pb-32 pt-10 px-6 sm:px-10">
        
        <!-- KOLOM PENCARIAN & TOMBOL BACK -->
        <div class="flex items-center gap-4 mb-10">
            <!-- Tombol Back -->
            <button id="back-to-grid-btn" class="hidden shrink-0 p-4 bg-white/5 hover:bg-white/20 transition rounded-full border border-white/20 backdrop-blur-md shadow-lg focus:outline-none">
                <img src="https://img.icons8.com/ios-filled/24/ffffff/left.png" class="w-5 h-5"/>
            </button>

            <!-- Form Search -->
            <form id="search-form" action="" method="GET" class="w-full relative text-black">
                <input type="text" 
                       id="main-search-input"
                       placeholder="Cari Novel, Genre, atau Penulis..." 
                       autocomplete="off"
                       class="w-full bg-white/10 border border-white/20 rounded-full py-4 px-6 pl-14 focus:ring-2 focus:ring-indigo-500 transition shadow-lg text-white placeholder-gray-400 focus:outline-none backdrop-blur-md text-sm">
                <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/search--v1.png" class="absolute left-5 top-4 w-6 h-6"/>
            </form>
        </div>

        <main id="search-content-area">

            <!-- TAMPILAN AWAL (GRID GENRE) -->
            <div id="state-initial-grid" class="space-y-6 transition-all duration-300">
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mb-5">Pencarian Populer</h2>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-5 mb-10">
                    @php
                        $genres = [
                            ['name' => 'Romantis', 'img' => 'https://picsum.photos/seed/romantis/300/300'],
                            ['name' => 'Fantasi', 'img' => 'https://picsum.photos/seed/fantasi/300/300'],
                            ['name' => 'Kehidupan', 'img' => 'https://picsum.photos/seed/kehidupan/300/300'],
                            ['name' => 'Horor', 'img' => 'https://picsum.photos/seed/horor/300/300'],
                            ['name' => 'FanFiction', 'img' => 'https://picsum.photos/seed/fanfic/300/300'],
                            ['name' => 'Drama', 'img' => 'https://picsum.photos/seed/drama/300/300'],
                            ['name' => 'Detektif', 'img' => 'https://picsum.photos/seed/detektif/300/300'],
                            ['name' => 'Petualangan', 'img' => 'https://picsum.photos/seed/petualangan/300/300']
                        ];
                    @endphp

                    @foreach($genres as $genre)
                        <div class="genre-card relative w-full h-40 overflow-hidden rounded-2xl border border-white/10 cursor-pointer group shadow-xl" data-genre="{{ $genre['name'] }}">
                            <img src="{{ $genre['img'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/60 group-hover:bg-indigo-900/60 transition duration-300"></div>
                            <div class="absolute inset-0 flex items-center justify-center p-4">
                                <span class="font-extrabold text-lg text-white group-hover:text-indigo-100 transition tracking-widest text-shadow-md">{{ $genre['name'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- TAMPILAN SARAN PENCARIAN -->
            <div id="state-search-history" class="space-y-6 hidden transition-all duration-300">
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Saran Pencarian</h2>
                <div class="space-y-3">
                    <div class="history-item flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/5 cursor-pointer hover:bg-white/10 transition">
                        <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/search--v1.png" class="w-5 h-5"/>
                        <span class="text-sm text-gray-300">Teori Mimpi</span>
                    </div>
                    <div class="history-item flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/5 cursor-pointer hover:bg-white/10 transition">
                        <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/search--v1.png" class="w-5 h-5"/>
                        <span class="text-sm text-gray-300">Misteri</span>
                    </div>
                    <div class="history-item flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/5 cursor-pointer hover:bg-white/10 transition">
                        <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/search--v1.png" class="w-5 h-5"/>
                        <span class="text-sm text-gray-300">Yier Xing</span>
                    </div>
                </div>
            </div>

            <!-- TAMPILAN HASIL PENCARIAN -->
            <div id="state-search-results" class="space-y-8 hidden transition-all duration-300">
                <h2 id="result-title" class="text-xs font-bold text-indigo-400 uppercase tracking-[0.2em]">Hasil untuk "..."</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="result-card flex gap-5 p-5 bg-white/5 border border-white/10 rounded-2xl shadow-xl backdrop-blur-md cursor-pointer hover:bg-white/10 transition group">
                        <img src="https://picsum.photos/seed/search_result1/300/400" class="w-24 h-36 object-cover rounded-xl border border-white/10 shrink-0 shadow-xl group-hover:scale-105 transition-transform duration-300">
                        <div class="flex-col flex justify-center">
                            <h3 class="font-bold text-xl mb-1 text-white line-clamp-1 group-hover:text-indigo-300 transition">Teori Mimpi</h3>
                            <p class="text-xs text-indigo-300 font-semibold mb-3">Aya Reid</p>
                            <div class="flex gap-2 mb-3">
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">ROMANTIS</span>
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">FANTASI</span>
                            </div>
                            <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">Freya menyimpan rahasia kutukan dunia masa lampau yang terlarang...</p>
                        </div>
                    </div>

                    <div class="result-card flex gap-5 p-5 bg-white/5 border border-white/10 rounded-2xl shadow-xl backdrop-blur-md cursor-pointer hover:bg-white/10 transition group">
                        <img src="https://picsum.photos/seed/search_result2/300/400" class="w-24 h-36 object-cover rounded-xl border border-white/10 shrink-0 shadow-xl group-hover:scale-105 transition-transform duration-300">
                        <div class="flex-col flex justify-center">
                            <h3 class="font-bold text-xl mb-1 text-white line-clamp-1 group-hover:text-indigo-300 transition">Alam Liar</h3>
                            <p class="text-xs text-indigo-300 font-semibold mb-3">Julyana</p>
                            <div class="flex gap-2 mb-3">
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">MISTERI</span>
                            </div>
                            <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">Kekuatan aneh di dalam hutan yang memanggil nama-nama mereka yang hilang.</p>
                        </div>
                    </div>

                    <div class="result-card flex gap-5 p-5 bg-white/5 border border-white/10 rounded-2xl shadow-xl backdrop-blur-md cursor-pointer hover:bg-white/10 transition group">
                        <img src="https://picsum.photos/seed/search_result3/300/400" class="w-24 h-36 object-cover rounded-xl border border-white/10 shrink-0 shadow-xl group-hover:scale-105 transition-transform duration-300">
                        <div class="flex-col flex justify-center">
                            <h3 class="font-bold text-xl mb-1 text-white line-clamp-1 group-hover:text-indigo-300 transition">Menuliskan Kenangan</h3>
                            <p class="text-xs text-indigo-300 font-semibold mb-3">Yier Xing</p>
                            <div class="flex gap-2 mb-3">
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">KEHIDUPAN</span>
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">DRAMA</span>
                            </div>
                            <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">Jika kamu bisa memutar waktu, kenangan mana yang ingin kamu hapus?</p>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- NAVBAR BAWAH -->
    <nav class="fixed bottom-0 w-full px-6 pb-8 pt-4 z-20">
        <div class="bg-indigo-600/40 backdrop-blur-xl h-16 rounded-2xl flex justify-around items-center shadow-[0_10px_40px_rgba(79,70,229,0.4)] border border-white/20">
            <a href="/dashboard" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png" class="w-6 h-6"/>
            </a>
            <a href="/library" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/book.png" class="w-6 h-6"/>
            </a>
            <a href="/search" class="p-3 bg-white/20 shadow-inner rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/search.png" class="w-6 h-6"/>
            </a>
            <a href="/write" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/edit.png" class="w-6 h-6"/>
            </a>
            <a href="/profil" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/user.png" class="w-6 h-6"/>
            </a>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('main-search-input');
            const searchForm = document.getElementById('search-form');
            const stateGrid = document.getElementById('state-initial-grid');
            const stateHistory = document.getElementById('state-search-history');
            const stateResults = document.getElementById('state-search-results');
            const resultTitle = document.getElementById('result-title');
            const backBtn = document.getElementById('back-to-grid-btn');
            
            const genreCards = document.querySelectorAll('.genre-card');
            const historyItems = document.querySelectorAll('.history-item');
            const resultCards = document.querySelectorAll('.result-card');

            // Fitur pengaman agar klik tombol tidak bentrok dengan hilangnya kursor
            let isClickingUI = false;

            function performSearch(keyword) {
                if (keyword.trim() === '') return;
                
                const lowerKeyword = keyword.toLowerCase();
                let foundAny = false;

                resultCards.forEach(card => {
                    const cardText = card.innerText.toLowerCase();
                    if (cardText.includes(lowerKeyword)) {
                        card.style.display = 'flex';
                        foundAny = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                stateGrid.classList.add('hidden');
                stateHistory.classList.add('hidden');
                stateResults.classList.remove('hidden');
                backBtn.classList.remove('hidden');
                
                if (foundAny) {
                    resultTitle.innerText = 'Hasil untuk "' + keyword + '"';
                } else {
                    resultTitle.innerText = 'TIDAK DITEMUKAN HASIL UNTUK "' + keyword.toUpperCase() + '"';
                }
            }

            // Fungsi mundur ke tampilan Paling Awal (Kotak Genre)
            function resetToInitial() {
                searchInput.value = '';
                stateHistory.classList.add('hidden');
                stateResults.classList.add('hidden');
                backBtn.classList.add('hidden');
                stateGrid.classList.remove('hidden');
                searchInput.blur();
            }

            searchInput.addEventListener('focus', function() {
                backBtn.classList.remove('hidden');
                if (this.value.trim() === '') {
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.remove('hidden');
                    stateResults.classList.add('hidden');
                }
            });

            // Saat klik di luar, cek dulu apakah lagi mencet tombol
            searchInput.addEventListener('blur', function() {
                if (isClickingUI) return; // Kalo lagi mencet tombol, jangan di-reset dulu
                setTimeout(() => {
                    if (this.value.trim() === '') {
                        resetToInitial();
                    }
                }, 200);
            });

            searchInput.addEventListener('input', function() {
                backBtn.classList.remove('hidden');
                if (this.value.trim() !== '') {
                    performSearch(this.value);
                } else {
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.remove('hidden');
                    stateResults.classList.add('hidden');
                }
            });

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault(); 
                performSearch(searchInput.value);
            });

            // LOGIKA KLIK TOMBOL BACK 
            backBtn.addEventListener('mousedown', () => isClickingUI = true);
            backBtn.addEventListener('mouseup', () => setTimeout(() => isClickingUI = false, 100));
            backBtn.addEventListener('click', function(e) {
                e.preventDefault(); 
                
                if (searchInput.value.trim() !== '') {
                    // Kalo lagi ngetik/nyari, hapus teks dan mundur selangkah ke Saran Pencarian
                    searchInput.value = ''; 
                    stateResults.classList.add('hidden');
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.remove('hidden');
                    searchInput.focus(); // Kursor langsung stand-by siap ngetik lagi
                } else {
                    // Kalo emang kolomnya kosong, mundur total ke Layar Awal
                    resetToInitial();
                }
            });

            // LOGIKA KLIK KARTU & SARAN
            genreCards.forEach(card => {
                card.addEventListener('mousedown', () => isClickingUI = true);
                card.addEventListener('mouseup', () => setTimeout(() => isClickingUI = false, 100));
                card.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    const genreName = this.getAttribute('data-genre');
                    searchInput.value = genreName; 
                    performSearch(genreName);
                    resultTitle.innerText = 'Buku Kategori: ' + genreName;
                });
            });

            historyItems.forEach(item => {
                item.addEventListener('mousedown', () => isClickingUI = true);
                item.addEventListener('mouseup', () => setTimeout(() => isClickingUI = false, 100));
                item.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    const historyText = this.querySelector('span').innerText;
                    searchInput.value = historyText;
                    performSearch(historyText);
                });
            });
        });
    </script>

</body>
</html>