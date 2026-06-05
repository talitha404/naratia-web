<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Naratia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black min-h-screen flex items-center justify-center font-sans">

    <div class="bg-[#18181b] p-10 rounded-2xl w-full max-w-sm">
        <h2 class="text-white text-center text-xl mb-8 font-semibold tracking-wide">Daftar</h2>
        
        <form method="POST" action="{{ route('register.submit') }}" class="space-y-5">
            @csrf
            
            <div>
                <label class="text-gray-400 text-sm block mb-1">Email</label>
                <input type="email" name="email" required class="w-full bg-[#27272a] border-none rounded-lg p-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div>
                <label class="text-gray-400 text-sm block mb-1">Sandi</label>
                <input type="password" name="password" required class="w-full bg-[#27272a] border-none rounded-lg p-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div>
                <label class="text-gray-400 text-sm block mb-1">Username</label>
                <input type="text" name="username" required class="w-full bg-[#27272a] border-none rounded-lg p-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <div>
                <label class="text-gray-400 text-sm block mb-1">Nama</label>
                <input type="text" name="name" required class="w-full bg-[#27272a] border-none rounded-lg p-3 text-white focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <button type="submit" class="w-full bg-[#3f3f46] text-white py-3 rounded-lg font-bold hover:bg-indigo-600 transition">
                Daftar
            </button>
        </form>

        <p class="text-gray-500 text-sm text-center mt-6">
            Sudah punya akun? <a href="{{ url('/masuk') }}" class="text-white hover:underline font-bold">Masuk</a>
        </p>
    </div>

</body>
</html>