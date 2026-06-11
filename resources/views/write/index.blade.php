<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cerita</title>
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
    </header>

    <main class="px-6 py-10 max-w-5xl mx-auto pb-32">
        <section class="mb-10">
            <h2 class="text-xs font-bold text-indigo-400 uppercase tracking-[0.2em] mb-6">Halaman Cerita</h2>
            
            <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
                <div class="flex items-center gap-6 text-sm font-semibold text-gray-400">
                    <button class="text-white border-b-2 border-indigo-500 pb-[18px] -mb-[18px] transition">
                        Semua (3)
                    </button>
                    <button class="hover:text-white pb-[18px] -mb-[18px] transition">
                        Statistik
                    </button>
                </div>

                <a href="{{ route('write.buatcerita') }}" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-lg shadow-indigo-600/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Buat cerita
                </a>
            </div>

            <div class="space-y-4">
                
                <div class="flex items-center justify-between p-5 bg-white/[0.03] hover:bg-white/[0.06] backdrop-blur-md rounded-2xl border border-white/5 transition group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center font-black text-xl text-gray-300 border border-white/10 shadow-inner">
                            T
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-200 group-hover:text-white transition line-clamp-1">(Tanpa judul)</h3>
                            <div class="flex items-center gap-2 mt-1 text-xs text-gray-400">
                                <span class="px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-bold text-[10px] uppercase border border-amber-500/20">Draf</span>
                                <span>•</span>
                                <span>5 Jun</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-gray-400 font-medium">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/visible.png"/> 0</span>
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/star.png"/> 0</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-5 bg-white/3 hover:bg-white/6 backdrop-blur-md rounded-2xl border border-white/5 transition group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-linear-to-br from-indigo-950 to-slate-900 flex items-center justify-center font-black text-xl text-indigo-400 border border-indigo-500/20 shadow-inner">
                            T
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-200 group-hover:text-white transition line-clamp-1">Terima Kasih</h3>
                            <div class="flex items-center gap-2 mt-1 text-xs text-gray-400">
                                <span class="px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 font-bold text-[10px] uppercase border border-emerald-500/20">Dipublikasikan</span>
                                <span>•</span>
                                <span>11 Des 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-gray-400 font-medium">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/visible.png"/> 124</span>
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/star.png"/> 12</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-5 bg-white/[0.03] hover:bg-white/[0.06] backdrop-blur-md rounded-2xl border border-white/5 transition group">
                    <div class="flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-950 to-slate-900 flex items-center justify-center font-black text-xl text-purple-400 border border-purple-500/20 shadow-inner">
                            H
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-200 group-hover:text-white transition line-clamp-1">Halo Cinta!</h3>
                            <div class="flex items-center gap-2 mt-1 text-xs text-gray-400">
                                <span class="px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 font-bold text-[10px] uppercase border border-emerald-500/20">Dipublikasikan</span>
                                <span>•</span>
                                <span>22 Mar 2025</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-gray-400 font-medium">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/visible.png"/> 89</span>
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/star.png"/> 7</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

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

            <a href="{{ route('write.index') }}" class="p-3 {{ request()->routeIs('write.index') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/edit.png" class="w-6 h-6"/>
            </a>

            <a href="{{ route('profil') }}" class="p-3 {{ request()->routeIs('profil') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/user.png" class="w-6 h-6"/>
            </a>
        </div>
    </nav>

</body>
</html>