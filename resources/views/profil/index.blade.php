<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Naratia</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>

<body class="bg-[#02040f] text-white min-h-screen pb-28">

@php
    $user = session('user');
    $isWriter = $user['is_writer'] ?? false;
    $works = $user['works'] ?? [];
@endphp

@if(!$user)
<script>window.location="/";</script>
@endif

<!-- TOP BAR -->
<header class="flex justify-between items-center px-6 py-5 sticky top-0 bg-black/20 backdrop-blur-xl z-20 border-b border-white/10 shadow-sm">

    <!-- LOGO -->
    <a href="/dashboard" class="text-2xl font-black tracking-tighter text-white hover:opacity-80 transition">
        NARATIA
    </a>

    <!-- DROPDOWN -->
    <div class="relative group">

        <button class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 transition">
            <span class="text-xs text-white leading-none translate-y-[1px]">▼</span>
        </button>

        <div class="absolute right-0 mt-2 w-40 bg-[#0b0f1a] border border-white/10 rounded-xl overflow-hidden opacity-0 group-hover:opacity-100 transition">

            <a href="{{ route('profil.edit') }}" class="block px-4 py-2 text-sm hover:bg-white/5">
                Edit Profil
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left px-4 py-2 text-sm text-red-300 hover:bg-white/5">
                    Logout
                </button>
            </form>

        </div>

    </div>

</header>

<!-- PROFILE CENTER -->
<div class="flex flex-col items-center text-center px-6 mt-2">

    <!-- AVATAR -->
    <div class="w-24 h-24 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 flex items-center justify-center text-xl font-bold">
        {{ strtoupper(substr($user['username'] ?? 'U', 0, 1)) }}
    </div>

    <!-- USERNAME -->
    <h1 class="mt-4 text-lg font-semibold">
        {{ $user['username'] ?? 'user' }}
    </h1>

    <!-- BIO -->
    <p class="mt-2 text-sm text-gray-400">
        {{ $user['bio'] ?? 'Belum ada bio...' }}
    </p>

    <!-- CHARACTER -->
    <div class="mt-4">
        <p class="text-[10px] text-gray-500 uppercase tracking-widest">
            Nama Character
        </p>
        <p class="text-sm mt-1">
            {{ $user['character'] ?? 'Belum diisi' }}
        </p>
    </div>

</div>

<!-- KARYA -->
<div class="px-6 mt-8 mb-10 border-t border-white/10 pt-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">
            Daftar Karya
        </h2>
    </div>

    @if($isWriter && count($works) > 0)

        <div class="flex gap-4 overflow-x-auto no-scrollbar py-2">

            @foreach($works as $work)
                <div class="min-w-[120px] group cursor-pointer">

                    <img 
                        src="{{ $work['cover'] ?? 'https://picsum.photos/seed/novel1/200/300' }}" 
                        class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300"
                    >

                    <h3 class="text-sm font-bold text-white truncate px-1">
                        {{ $work['title'] ?? 'Untitled Novel' }}
                    </h3>

                    <p class="text-[10px] text-gray-400 px-1">
                        Novel
                    </p>

                </div>
            @endforeach

        </div>

    @else

        <!-- DUMMY NOVEL -->
        <div class="flex gap-4 overflow-x-auto no-scrollbar py-2">

            <div class="min-w-[120px] group cursor-pointer">
                <img src="https://picsum.photos/seed/senja/200/300"
                     class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1">Senja di Ujung Aksara</h3>
                <p class="text-[10px] text-gray-400 px-1">Novel</p>
            </div>

            <div class="min-w-[120px] group cursor-pointer">
                <img src="https://picsum.photos/seed/bayang/200/300"
                     class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1">Bayang di Kota Hujan</h3>
                <p class="text-[10px] text-gray-400 px-1">Novel</p>
            </div>

            <div class="min-w-[120px] group cursor-pointer">
                <img src="https://picsum.photos/seed/jejak/200/300"
                     class="w-32 h-44 object-cover rounded-2xl mb-3 shadow-lg border border-white/10 group-hover:scale-105 transition duration-300">
                <h3 class="text-sm font-bold text-white truncate px-1">Jejak yang Tak Pulang</h3>
                <p class="text-[10px] text-gray-400 px-1">Novel</p>
            </div>

        </div>

    @endif

</div>

<!-- BOTTOM NAV -->
<nav class="fixed bottom-0 w-full px-6 pb-8 pt-4 z-20">

    <div class="bg-indigo-600/40 backdrop-blur-xl h-16 rounded-2xl flex justify-around items-center shadow-[0_10px_40px_rgba(79,70,229,0.4)] border border-white/20">

        <a href="{{ route('dashboard') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
            <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png" class="w-6 h-6"/>
        </a>

        <a href="/library" class="p-3 hover:bg-white/10 rounded-xl transition">
            <img src="https://img.icons8.com/material-outlined/24/ffffff/book.png" class="w-6 h-6"/>
        </a>

        <a href="{{ route('search') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
            <img src="https://img.icons8.com/material-outlined/24/ffffff/search.png" class="w-6 h-6"/>
        </a>

        <a href="{{ route('write.index') }}" class="p-3 hover:bg-white/10 rounded-xl transition">
            <img src="https://img.icons8.com/material-outlined/24/ffffff/edit.png" class="w-6 h-6"/>
        </a>

        <a href="{{ route('profil') }}" class="p-3 bg-white/20 shadow-inner rounded-xl transition">
            <img src="https://img.icons8.com/material-outlined/24/ffffff/user.png" class="w-6 h-6"/>
        </a>

    </div>
</nav>

</body>
</html>