<<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Naratia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#02040f] text-white min-h-screen pb-24">

    <header class="px-6 pt-6">
        <a href="{{ url('/dashboard') }}" class="w-11 h-11 rounded-full bg-white/5 border border-white/10 backdrop-blur-xl flex items-center justify-center hover:bg-white/10 transition">
            <img src="https://img.icons8.com/ios-glyphs/30/ffffff/left.png" class="w-4 h-4" alt="Back">
        </a>
    </header>

    <main class="max-w-md mx-auto px-6 pt-4">
        <div class="bg-white/5 border border-white/10 backdrop-blur-xl rounded-[2rem] p-8 shadow-2xl mb-8">
            
            <div class="flex justify-center">
                <div class="w-28 h-28 rounded-full p-1 bg-gradient-to-br from-indigo-500 to-purple-500 shadow-[0_0_35px_rgba(99,102,241,0.6)]">
                    <img src="{{ session('user.avatar') ? asset('storage/'.session('user.avatar')) : 'https://ui-avatars.com/api/?name='.urlencode(session('user.name', 'User')).'&background=4f46e5&color=fff' }}"
                         class="w-full h-full rounded-full object-cover" alt="Avatar">
                </div>
            </div>

            <div class="text-center mt-6">
                <h1 class="text-3xl font-extrabold tracking-tight">
                    {{ session('user.name', 'User') }}
                </h1>
                <p class="text-gray-400 text-sm mt-2">
                    {{ '@' . (session('user.username', 'user')) }}
                </p>
            </div>

            <div class="mt-10 space-y-5">
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Email</p>
                    <p class="text-sm text-white">{{ session('user.email', 'user@email.com') }}</p>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Username</p>
                    <p class="text-sm text-white">{{ session('user.username', 'user') }}</p>
                </div>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-5">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Nama Lengkap</p>
                    <p class="text-sm text-white">{{ session('user.name', 'Nama User') }}</p>
                </div>
            </div>

            <div class="mt-8 space-y-4">
                <a href="{{ route('profil.edit') }}" class="w-full py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold shadow-xl hover:scale-[1.02] transition flex justify-center">
                    Edit Profil
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-4 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-300 font-semibold hover:bg-red-500/20 transition">
                        Keluar / Logout
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>