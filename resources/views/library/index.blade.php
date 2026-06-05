<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Naratia</title>
    
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

    <div class="px-6 flex space-x-6 mt-4 border-b border-white/10">
        <button id="btn-lanjut" class="pb-3 border-b-2 border-indigo-500 text-indigo-400 font-bold text-xs uppercase tracking-wider transition">Lanjut Baca</button>
        <button id="btn-disimpan" class="pb-3 text-gray-500 hover:text-gray-300 font-bold text-xs uppercase tracking-wider transition border-b-2 border-transparent">Disimpan</button>
    </div>

    <main id="konten-lanjut" class="px-6 mt-8 flex flex-wrap gap-5">
        
        <div class="w-[110px] md:w-[120px] group cursor-pointer">
            <img src="https://picsum.photos/seed/naratia2/200/300" class="w-full h-40 md:h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
            <h3 class="text-sm font-bold text-white truncate px-1">Rahasia Langit</h3>
            <p class="text-[10px] text-gray-400 px-1 mb-2">Bab 12 dari 20</p>
            <div class="w-full bg-white/10 rounded-full h-1 mx-1">
                <div class="bg-indigo-500 h-1 rounded-full shadow-[0_0_10px_rgba(99,102,241,0.8)]" style="width: 60%"></div>
            </div>
        </div>

        <div class="w-[110px] md:w-[120px] group cursor-pointer">
            <img src="https://picsum.photos/seed/naratia3/200/300" class="w-full h-40 md:h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
            <h3 class="text-sm font-bold text-white truncate px-1">Hujan Sore</h3>
            <p class="text-[10px] text-gray-400 px-1 mb-2">Bab 5 dari 15</p>
            <div class="w-full bg-white/10 rounded-full h-1 mx-1">
                <div class="bg-indigo-500 h-1 rounded-full shadow-[0_0_10px_rgba(99,102,241,0.8)]" style="width: 30%"></div>
            </div>
        </div>

        <div class="w-[110px] md:w-[120px] group cursor-pointer">
            <img src="https://picsum.photos/seed/naratia4/200/300" class="w-full h-40 md:h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
            <h3 class="text-sm font-bold text-white truncate px-1">Misteri Kelas</h3>
            <p class="text-[10px] text-gray-400 px-1 mb-2">Bab 8 dari 10</p>
            <div class="w-full bg-white/10 rounded-full h-1 mx-1">
                <div class="bg-indigo-500 h-1 rounded-full shadow-[0_0_10px_rgba(99,102,241,0.8)]" style="width: 80%"></div>
            </div>
        </div>

    </main>

    <main id="konten-disimpan" class="px-6 mt-16 hidden flex-col items-center justify-center text-center">
        <img src="https://img.icons8.com/ios/100/6b7280/bookmark-ribbon--v1.png" class="w-16 h-16 mb-3 opacity-40"/>
        <p class="text-sm font-semibold text-gray-400">Belum ada cerita tersimpan.</p>
        <p class="text-[10px] text-gray-500 mt-1">Cari cerita menarik dan tambahkan ke koleksimu.</p>
        <a href="{{ route('search') }}" class="mt-5 bg-indigo-600/50 hover:bg-indigo-500 border border-indigo-400/30 px-5 py-2 rounded-full text-xs font-bold transition shadow-lg">Cari Cerita</a>
    </main>

    <div style="height: 150px; width: 100%; display: block;"></div>

    <nav class="fixed bottom-0 w-full px-6 pb-8 pt-4 z-20">
        <div class="bg-indigo-600/40 backdrop-blur-xl h-16 rounded-2xl flex justify-around items-center shadow-[0_10px_40px_rgba(79,70,229,0.4)] border border-white/20">
            <a href="{{ route('dashboard') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png" class="w-6 h-6"/>
            </a>
            <a href="/library" class="p-3 bg-white/20 shadow-inner rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/book.png" class="w-6 h-6"/>
            </a>
            <a href="{{ route('search') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/search.png" class="w-6 h-6"/>
            </a>
            <a href="{{ route('write.index') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/edit.png" class="w-6 h-6"/>
            </a>
            <a href="{{ route('profil') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/user.png" class="w-6 h-6"/>
            </a>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnLanjut = document.getElementById('btn-lanjut');
            const btnDisimpan = document.getElementById('btn-disimpan');
            const kontenLanjut = document.getElementById('konten-lanjut');
            const kontenDisimpan = document.getElementById('konten-disimpan');

            btnLanjut.addEventListener('click', () => {
                btnLanjut.classList.add('border-indigo-500', 'text-indigo-400');
                btnLanjut.classList.remove('border-transparent', 'text-gray-500');
                btnDisimpan.classList.remove('border-indigo-500', 'text-indigo-400');
                btnDisimpan.classList.add('border-transparent', 'text-gray-500');
                
                kontenLanjut.classList.remove('hidden');
                kontenLanjut.classList.add('flex');
                kontenDisimpan.classList.add('hidden');
                kontenDisimpan.classList.remove('flex');
            });

            btnDisimpan.addEventListener('click', () => {
                btnDisimpan.classList.add('border-indigo-500', 'text-indigo-400');
                btnDisimpan.classList.remove('border-transparent', 'text-gray-500');
                btnLanjut.classList.remove('border-indigo-500', 'text-indigo-400');
                btnLanjut.classList.add('border-transparent', 'text-gray-500');
                
                kontenDisimpan.classList.remove('hidden');
                kontenDisimpan.classList.add('flex');
                kontenLanjut.classList.add('hidden');
                kontenLanjut.classList.remove('flex');
            });
        });
    </script>
</body>
</html>