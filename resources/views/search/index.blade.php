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
        
        <div class="relative mb-10 text-black">
            <form id="search-form" action="" method="GET">
                <input type="text" 
                       id="main-search-input"
                       placeholder="Cari Novel, Genre, atau Penulis..." 
                       autocomplete="off"
                       class="w-full bg-white/10 border border-white/20 rounded-full py-4 px-6 pl-14 focus:ring-2 focus:ring-indigo-500 transition shadow-lg text-white placeholder-gray-400 focus:outline-none backdrop-blur-md text-sm">
                <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/search--v1.png" class="absolute left-5 top-4 w-6 h-6"/>
            </form>
        </div>

        <main id="search-content-area">

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

            <div id="state-search-history" class="space-y-6 hidden transition-all duration-300">
                <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Pencarian Sebelumnya</h2>
                <div class="space-y-3">
                    <div class="history-item flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/5 cursor-pointer hover:bg-white/10 transition">
                        <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/history.png" class="w-5 h-5"/>
                        <span class="text-sm text-gray-300">kisah cinta masa sekolah</span>
                    </div>
                    <div class="history-item flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/5 cursor-pointer hover:bg-white/10 transition">
                        <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/history.png" class="w-5 h-5"/>
                        <span class="text-sm text-gray-300">A Theory Dreaming</span>
                    </div>
                    <div class="history-item flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/5 cursor-pointer hover:bg-white/10 transition">
                        <img src="https://img.icons8.com/ios-glyphs/30/9ca3af/history.png" class="w-5 h-5"/>
                        <span class="text-sm text-gray-300">misteri lab komputer</span>
                    </div>
                </div>
            </div>

            <div id="state-search-results" class="space-y-8 hidden transition-all duration-300">
                <h2 id="result-title" class="text-xs font-bold text-indigo-400 uppercase tracking-[0.2em]">Hasil untuk "..."</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="flex gap-5 p-5 bg-white/5 border border-white/10 rounded-2xl shadow-xl backdrop-blur-md cursor-pointer hover:bg-white/10 transition group">
                        <img src="https://picsum.photos/seed/search_result1/300/400" class="w-24 h-36 object-cover rounded-xl border border-white/10 shrink-0 shadow-xl group-hover:scale-105 transition-transform duration-300">
                        <div class="flex-col flex justify-center">
                            <h3 class="font-bold text-xl mb-1 text-white line-clamp-1 group-hover:text-indigo-300 transition">A THEORY DREAMING</h3>
                            <p class="text-xs text-indigo-300 font-semibold mb-3">AYA_REID</p>
                            <div class="flex gap-2 mb-3">
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">ROMANTIS</span>
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">FANTASI</span>
                            </div>
                            <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">Freya menyimpan rahasia kutukan dunia masa lampau yang terlarang...</p>
                        </div>
                    </div>

                    <div class="flex gap-5 p-5 bg-white/5 border border-white/10 rounded-2xl shadow-xl backdrop-blur-md cursor-pointer hover:bg-white/10 transition group">
                        <img src="https://picsum.photos/seed/search_result2/300/400" class="w-24 h-36 object-cover rounded-xl border border-white/10 shrink-0 shadow-xl group-hover:scale-105 transition-transform duration-300">
                        <div class="flex-col flex justify-center">
                            <h3 class="font-bold text-xl mb-1 text-white line-clamp-1 group-hover:text-indigo-300 transition">WHAT SHOULD BE WILD</h3>
                            <p class="text-xs text-indigo-300 font-semibold mb-3">JULIA_FINE</p>
                            <div class="flex gap-2 mb-3">
                                <span class="text-[10px] bg-white text-black px-3 py-1 rounded-full font-extrabold uppercase tracking-wider shadow-inner">MISTERI</span>
                            </div>
                            <p class="text-xs text-gray-300 line-clamp-2 leading-relaxed">Kekuatan aneh di dalam hutan yang memanggil nama-nama mereka yang hilang.</p>
                        </div>
                    </div>

                    <div class="flex gap-5 p-5 bg-white/5 border border-white/10 rounded-2xl shadow-xl backdrop-blur-md cursor-pointer hover:bg-white/10 transition group">
                        <img src="https://picsum.photos/seed/search_result3/300/400" class="w-24 h-36 object-cover rounded-xl border border-white/10 shrink-0 shadow-xl group-hover:scale-105 transition-transform duration-300">
                        <div class="flex-col flex justify-center">
                            <h3 class="font-bold text-xl mb-1 text-white line-clamp-1 group-hover:text-indigo-300 transition">REWRITING MEMORIES</h3>
                            <p class="text-xs text-indigo-300 font-semibold mb-3">RINDI ANTIKA Q.</p>
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

    <!-- INI YANG ERROR TADI (Udah dihapus ikon buku dobelnya) -->
    <nav class="fixed bottom-0 w-full px-6 pb-8 pt-4 z-20">
        <div class="bg-indigo-600/40 backdrop-blur-xl h-16 rounded-2xl flex justify-around items-center shadow-[0_10px_40px_rgba(79,70,229,0.4)] border border-white/20">
            <a href="{{ route('dashboard') }}" class="p-3 {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png" class="w-6 h-6"/>
            </a>
            
            <a href="/library" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/book.png" class="w-6 h-6"/>
            </a>
            
            <a href="{{ route('search') }}" class="p-3 {{ request()->routeIs('search') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/search.png" class="w-6 h-6"/>
            </a>
            
            <a href="{{ route('write.index') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/edit.png" class="w-6 h-6"/>
            </a>
            
            <a href="{{ route('profil') }}" class="p-3 {{ request()->routeIs('profil') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
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
            
            const genreCards = document.querySelectorAll('.genre-card');
            const historyItems = document.querySelectorAll('.history-item');

            searchInput.addEventListener('focus', function() {
                if (this.value.trim() === '') {
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.remove('hidden');
                    stateResults.classList.add('hidden');
                }
            });

            searchInput.addEventListener('blur', function() {
                setTimeout(() => {
                    if (this.value.trim() === '') {
                        stateGrid.classList.remove('hidden');
                        stateHistory.classList.add('hidden');
                        stateResults.classList.add('hidden');
                    }
                }, 200);
            });

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault(); 
                const keyword = searchInput.value.trim();
                
                if (keyword !== '') {
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.add('hidden');
                    stateResults.classList.remove('hidden');
                    resultTitle.innerText = 'Hasil untuk "' + keyword + '"';
                }
            });

            genreCards.forEach(card => {
                card.addEventListener('click', function() {
                    const genreName = this.getAttribute('data-genre');
                    searchInput.value = genreName; 
                    
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.add('hidden');
                    stateResults.classList.remove('hidden');
                    resultTitle.innerText = 'Buku Kategori: ' + genreName;
                });
            });

            historyItems.forEach(item => {
                item.addEventListener('click', function() {
                    const historyText = this.querySelector('span').innerText;
                    searchInput.value = historyText;
                    
                    stateGrid.classList.add('hidden');
                    stateHistory.classList.add('hidden');
                    stateResults.classList.remove('hidden');
                    resultTitle.innerText = 'Hasil untuk "' + historyText + '"';
                });
            });
        });
    </script>

</body>
</html>