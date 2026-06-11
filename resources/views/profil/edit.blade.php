<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Naratia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#02040f] text-white min-h-screen py-10">

@php
    $user = session('user');
@endphp

<main class="max-w-md mx-auto px-6">
    <div class="bg-white/5 border border-white/10 backdrop-blur-xl rounded-[2rem] p-8 shadow-2xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Profil</h2>

        <form action="{{ route('profil.update') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Username</label>
                <input type="text" name="username" 
                       value="{{ $user->username ?? '' }}" 
                       class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm focus:outline-none focus:border-indigo-500 transition">
            </div>

            <div>
                <label class="block text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Bio</label>
                <textarea name="bio" rows="3" 
                          class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm focus:outline-none focus:border-indigo-500 transition resize-none">{{ $user->bio ?? '' }}</textarea>
            </div>

            <div>
                <label class="block text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Nama Character</label>
                <input type="text" name="character_name" 
                       value="{{ $user->character_name ?? '' }}" 
                       class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm focus:outline-none focus:border-indigo-500 transition">
            </div>

            <div class="mt-8 space-y-3">
                <button type="submit" class="w-full py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold hover:scale-[1.02] transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('profil') }}" class="w-full py-4 rounded-2xl bg-white/5 border border-white/10 text-white font-semibold text-center block hover:bg-white/10 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</main>

</body>
</html>