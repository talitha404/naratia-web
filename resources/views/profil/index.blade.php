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

<!-- LOGOUT MODAL -->
<div id="logoutModal"
     class="fixed inset-0 hidden items-center justify-center bg-black/60 backdrop-blur-sm z-50">

    <div class="bg-[#0a0f1d] border border-white/10 rounded-3xl p-6 w-80 shadow-2xl">

        <h3 class="text-lg font-bold text-white mb-2">
            Konfirmasi Logout
        </h3>

        <p class="text-sm text-gray-400 mb-6">
            Apakah kamu yakin ingin keluar dari Naratia?
        </p>

        <div class="flex justify-end gap-3">
            <button onclick="closeLogoutModal()"
                    class="px-4 py-2 rounded-xl bg-white/10 text-gray-300 hover:bg-white/20 transition">
                Batal
            </button>

            <button onclick="submitLogout()"
                    class="px-4 py-2 rounded-xl bg-red-500 hover:bg-red-600 text-white transition">
                Keluar
            </button>
        </div>

    </div>
</div>

@php
    $user = session('user');
    $isWriter = $user['is_writer'] ?? false;
    $works = $user['works'] ?? [];
@endphp

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
    <button class="w-12 h-12 rounded-full bg-white/5 border-2 border-white/20 flex items-center justify-center hover:bg-white/10 hover:border-indigo-400 transition-all duration-300">
    <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2 2L10 10L18 2" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</button>

    <div class="absolute right-0 mt-3 w-48 bg-[#0a0f1d] border border-white/10 rounded-3xl p-2 shadow-2xl invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-300 z-50">
        
        <a href="{{ route('profil.edit') }}" class="flex items-center px-4 py-3 text-sm text-gray-300 hover:text-white hover:bg-white/5 rounded-2xl transition">
            <span class="mr-3">✏️</span> Edit Profil
        </a>

        <div class="my-1 border-t border-white/5"></div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="button" 
                    onclick="confirmLogout()" 
                    class="w-full flex items-center px-4 py-3 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-2xl transition">
                <span class="mr-3">🚪</span> Keluar
            </button>
        </form>
    </div>
</div>

<script>
function confirmLogout() {
    document.getElementById('logoutModal').classList.remove('hidden');
    document.getElementById('logoutModal').classList.add('flex');
}

function closeLogoutModal() {
    document.getElementById('logoutModal').classList.add('hidden');
    document.getElementById('logoutModal').classList.remove('flex');
}

function submitLogout() {
    document.getElementById('logout-form').submit();
}
</script>

</header>

<!-- PROFILE CENTER -->
<section class="flex flex-col items-center text-center px-6 mt-4">

    <!-- Avatar -->
    <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-indigo-500 shadow-lg bg-gray-800">
        @if(!empty($user->avatar))
            <img src="{{ asset('storage/' . $user->avatar) }}"
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-500 to-purple-500 text-xl font-bold">
                {{ strtoupper(substr($user->username ?? 'U', 0, 1)) }}
            </div>
        @endif
    </div>

    <!-- Username -->
    <h1 class="mt-5 text-4xl font-bold text-white tracking-tight">
        {{ $user->username ?? 'User' }}
    </h1>

    <!-- Nama Karakter -->
    <div class="mt-8">

        <p class="text-xs uppercase tracking-[0.35em] text-gray-500">
            Nama Karakter
        </p>

        <p class="mt-2 text-xl font-semibold text-indigo-300">
            {{ $user->character_name ?? 'Belum diisi' }}
        </p>

    </div>

    <!-- Tentang Saya -->
    <div class="mt-8 max-w-md">

        <p class="text-xs uppercase tracking-[0.35em] text-gray-500">
            Tentang Saya
        </p>

        <p class="mt-3 text-gray-300 italic leading-relaxed">
            {{ $user->bio ?? 'Belum ada bio...' }}
        </p>

    </div>

</section>

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