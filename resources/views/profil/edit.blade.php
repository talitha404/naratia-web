<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Naratia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#02040f] text-white min-h-screen py-10">
    <main class="max-w-md mx-auto px-6">
        <div class="bg-white/5 border border-white/10 backdrop-blur-xl rounded-[2rem] p-8 shadow-2xl">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Profil</h2>
            
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                
                <div class="flex flex-col items-center mb-8">
                    <label class="relative cursor-pointer group">
                        <div class="w-28 h-28 rounded-full overflow-hidden border-2 border-indigo-500 shadow-lg">
                            <img src="{{ session('user.avatar') ? asset('storage/'.session('user.avatar')) : 'https://ui-avatars.com/api/?name='.urlencode(session('user.name', 'User')).'&background=4f46e5&color=fff' }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/50 rounded-full opacity-0 group-hover:opacity-100 transition">
                            <span class="text-[10px] font-bold uppercase">Ganti</span>
                        </div>
                        <input type="file" name="avatar" class="hidden" accept="image/*">
                    </label>
                    <p class="text-[10px] text-gray-500 mt-3 uppercase tracking-widest">Klik foto untuk ganti</p>
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Email</label>
                    <input type="email" name="email" value="{{ session('user.email', '') }}" readonly
                           class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm text-gray-400 cursor-not-allowed focus:outline-none">
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Username</label>
                    <input type="text" name="username" value="{{ session('user.username', '') }}" 
                           class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm focus:outline-none focus:border-indigo-500 transition">
                </div>

                <div>
                    <label class="block text-[11px] uppercase tracking-[0.2em] text-gray-500 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ session('user.name', '') }}" 
                           class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 text-sm focus:outline-none focus:border-indigo-500 transition">
                </div>

                <div class="mt-8 space-y-3">
                    <button type="submit" class="w-full py-4 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold hover:scale-[1.02] transition">Simpan Perubahan</button>
                    <a href="{{ route('profil') }}" class="w-full py-4 rounded-2xl bg-white/5 border border-white/10 text-white font-semibold text-center block hover:bg-white/10 transition">Batal</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>