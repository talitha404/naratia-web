<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naratia - Tempat Cerita Menjadi Nyata</title>
    
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
    </style>
</head>
<body class="space-bg text-white min-h-screen">

    <header class="flex justify-between items-center p-6 sticky top-0 bg-black/20 backdrop-blur-xl z-20 border-b border-white/10 shadow-sm">
        <h1 class="text-2xl font-black tracking-tighter text-white">NARATIA</h1>
        <div class="flex gap-5">
            <a href="{{ route('search') }}"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/search--v1.png" class="w-6 h-6 hover:opacity-80 transition"/></a>
            <button class="hover:opacity-80 transition"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/appointment-reminders--v1.png" class="w-6 h-6"/></button>
        </div>
    </header>

    <section class="px-6 mb-10 pt-5">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mb-4">Cerita unggulan</h2>
        
        <div class="flex gap-5 overflow-x-auto no-scrollbar pb-4">
            <a href="/stories/read/1" class="block bg-white/5 hover:bg-white/10 transition duration-300 p-4 rounded-3xl border border-white/10 shadow-lg backdrop-blur-md w-[360px] shrink-0 group">
                <div class="flex gap-5 items-center">
                    <img src="https://picsum.photos/seed/naratia1/300/400" class="w-24 h-36 object-cover rounded-xl shadow-md shrink-0 group-hover:scale-105 transition">
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-bold leading-tight mb-2 text-white line-clamp-2 group-hover:text-indigo-400 transition">Dunia di Balik Layar</h3>
                        <p class="text-xs text-indigo-300 font-semibold mb-3">Emi Thasorn</p>
                        <div class="flex gap-2">
                            <span class="bg-indigo-500/30 text-indigo-100 text-[10px] px-3 py-1 rounded-full border border-indigo-400/30">Fiksi</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/stories/read/2" class="block bg-white/5 hover:bg-white/10 transition duration-300 p-4 rounded-3xl border border-white/10 shadow-lg backdrop-blur-md w-[360px] shrink-0 group">
                <div class="flex gap-5 items-center">
                    <img src="https://picsum.photos/seed/naratiaA/300/400" class="w-24 h-36 object-cover rounded-xl shadow-md shrink-0 group-hover:scale-105 transition">
                    <div class="flex flex-col justify-center">
                        <h3 class="text-lg font-bold leading-tight mb-2 text-white line-clamp-2 group-hover:text-indigo-400 transition">Jejak Waktu</h3>
                        <p class="text-xs text-indigo-300 font-semibold mb-3">Tipnaree Racha</p>
                        <div class="flex gap-2">
                            <span class="bg-indigo-500/30 text-indigo-100 text-[10px] px-3 py-1 rounded-full border border-indigo-400/30">Misteri</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="px-6 mb-10">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Lanjut baca</h2>
            <a href="/library" class="text-indigo-400 text-xs font-bold cursor-pointer hover:text-indigo-300 transition">Lihat Semua</a>
        </div>
        <div class="flex gap-4 overflow-x-auto no-scrollbar py-2">
            <a href="/stories/read/3" class="min-w-[120px] group cursor-pointer block">
                <img src="https://picsum.photos/seed/naratia2/200/300" class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1 group-hover:text-indigo-400 transition">Rahasia Langit</h3>
                <p class="text-[10px] text-gray-400 px-1">Bab 12 dari 20</p>
            </a>
            <a href="/stories/read/4" class="min-w-[120px] group cursor-pointer block">
                <img src="https://picsum.photos/seed/naratia3/200/300" class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1 group-hover:text-indigo-400 transition">Hujan Sore</h3>
                <p class="text-[10px] text-gray-400 px-1">Bab 5 dari 15</p>
            </a>
            <a href="/stories/read/5" class="min-w-[120px] group cursor-pointer block">
                <img src="https://picsum.photos/seed/naratia4/200/300" class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1 group-hover:text-indigo-400 transition">Misteri Kelas</h3>
                <p class="text-[10px] text-gray-400 px-1">Bab 8 dari 10</p>
            </a>
        </div>
    </section>

    <section class="px-6 mb-10">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mb-4">Eksplor Kategori</h2>
        <div class="flex gap-3 overflow-x-auto no-scrollbar py-1">
            <button class="bg-indigo-600 border border-indigo-400/50 px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap shadow-lg hover:bg-indigo-500 transition">Semua</button>
            <button class="bg-white/5 border border-white/10 px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap backdrop-blur-sm hover:bg-white/10 transition">Romansa</button>
            <button class="bg-white/5 border border-white/10 px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap backdrop-blur-sm hover:bg-white/10 transition">Misteri</button>
            <button class="bg-white/5 border border-white/10 px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap backdrop-blur-sm hover:bg-white/10 transition">Fantasi</button>
            <button class="bg-white/5 border border-white/10 px-5 py-2 rounded-full text-xs font-semibold whitespace-nowrap backdrop-blur-sm hover:bg-white/10 transition">Sci-Fi</button>
        </div>
    </section>

    <section class="px-6 mb-10">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mb-4">Bacaan trending</h2>
        <div class="flex gap-4 overflow-x-auto no-scrollbar py-2">
            <a href="/stories/read/6" class="min-w-[120px] group cursor-pointer block">
                <img src="https://picsum.photos/seed/trending1/200/300" class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1 group-hover:text-indigo-400 transition">Kisah Kita</h3>
            </a>
            <a href="/stories/read/7" class="min-w-[120px] group cursor-pointer block">
                <img src="https://picsum.photos/seed/trending2/200/300" class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1 group-hover:text-indigo-400 transition">Horor Desa</h3>
            </a>
            <a href="/stories/read/8" class="min-w-[120px] group cursor-pointer block">
                <img src="https://picsum.photos/seed/trending3/200/300" class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1 group-hover:text-indigo-400 transition">Sang Juara</h3>
            </a>
        </div>
    </section>

    <section class="px-6 mb-10">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Rekomendasi Untukmu</h2>
            <span class="text-indigo-400 text-xs font-bold cursor-pointer hover:text-indigo-300">Lihat Semua</span>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <a href="/stories/read/9" class="block bg-white/5 hover:bg-white/10 transition duration-300 p-4 rounded-2xl border border-white/10 shadow-lg backdrop-blur-md group">
                <div class="flex gap-4 items-center">
                    <img src="https://picsum.photos/seed/rekom1/100/150" class="w-16 h-24 object-cover rounded-xl border border-white/10 shrink-0 shadow-md group-hover:scale-105 transition">
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-white mb-1 line-clamp-1 group-hover:text-indigo-400 transition">Misteri Bug Pemrograman</h3>
                        <p class="text-[10px] text-indigo-300 mb-1">Mim Benyapa</p>
                        <p class="text-[10px] text-gray-400 line-clamp-2">Kisah sekumpulan anak Fasilkom yang terjebak di lab komputer.</p>
                    </div>
                </div>
            </a>
            <a href="/stories/read/10" class="block bg-white/5 hover:bg-white/10 transition duration-300 p-4 rounded-2xl border border-white/10 shadow-lg backdrop-blur-md group">
                <div class="flex gap-4 items-center">
                    <img src="https://picsum.photos/seed/rekom2/100/150" class="w-16 h-24 object-cover rounded-xl border border-white/10 shrink-0 shadow-md group-hover:scale-105 transition">
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-white mb-1 line-clamp-1 group-hover:text-indigo-400 transition">Jejak Bintang</h3>
                        <p class="text-[10px] text-indigo-300 mb-1">Tere Liye</p>
                        <p class="text-[10px] text-gray-400 line-clamp-2">Perjalanan melintasi galaksi untuk menemukan planet yang hilang.</p>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section class="px-6">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mb-4">Penulis Terpopuler</h2>
        <div class="flex gap-6 overflow-x-auto no-scrollbar py-2">
            <div class="flex flex-col items-center gap-2 min-w-[70px] cursor-pointer group">
                <div class="w-16 h-16 rounded-full border-[3px] border-indigo-500 p-[2px] group-hover:scale-110 transition duration-300 shadow-[0_0_15px_rgba(79,70,229,0.5)]">
                    <img src="https://picsum.photos/seed/author1/100/100" class="w-full h-full rounded-full object-cover">
                </div>
                <p class="text-[10px] font-bold text-center text-white mt-1">Dee Lestari</p>
            </div>
            <div class="flex flex-col items-center gap-2 min-w-[70px] cursor-pointer group">
                <div class="w-16 h-16 rounded-full border-[3px] border-white/20 p-[2px] group-hover:border-indigo-400 transition duration-300">
                    <img src="https://picsum.photos/seed/author2/100/100" class="w-full h-full rounded-full object-cover">
                </div>
                <p class="text-[10px] font-bold text-center text-gray-300 mt-1">Tere Liye</p>
            </div>
            <div class="flex flex-col items-center gap-2 min-w-[70px] cursor-pointer group">
                <div class="w-16 h-16 rounded-full border-[3px] border-white/20 p-[2px] group-hover:border-indigo-400 transition duration-300">
                    <img src="https://picsum.photos/seed/author3/100/100" class="w-full h-full rounded-full object-cover">
                </div>
                <p class="text-[10px] font-bold text-center text-gray-300 mt-1">Fiersa B.</p>
            </div>
        </div>
    </section>

    <div style="height: 150px; width: 100%; display: block;"></div>

    <nav class="fixed bottom-0 w-full px-6 pb-8 pt-4 z-20">
        <div class="bg-indigo-600/40 backdrop-blur-xl h-16 rounded-2xl flex justify-around items-center shadow-[0_10px_40px_rgba(79,70,229,0.4)] border border-white/20">
            <a href="{{ route('dashboard') }}" class="p-3 {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png" class="w-6 h-6"/>
            </a>
            <a href="/library" class="p-3 {{ request()->is('library') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
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

</body>
</html>