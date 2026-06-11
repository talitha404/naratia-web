<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Cerita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Style tambahan agar textarea auto-resize dan bersih tanpa border */
        textarea:focus {
            outline: none;
        }
    </style>
</head>
<body class="bg-[#121212] text-white font-sans min-h-screen flex flex-col">

    <header class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-slate-950/40 backdrop-blur-md border-b border-slate-800">
        <div class="flex items-center">
            <a href="{{ route('write.index') }}" class="text-gray-400 hover:text-white transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        </div>

        <div class="flex items-center gap-3">
            <button type="button" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-1.5 rounded-full text-sm transition duration-200">
                Publikasikan
            </button>

            <button type="button" class="border border-purple-500 hover:bg-purple-500/10 text-purple-400 font-semibold px-5 py-1.5 rounded-full text-sm transition duration-200">
                Simpan
            </button>

            <button type="button" class="border border-purple-500 hover:bg-purple-500/10 text-purple-400 font-semibold px-5 py-1.5 rounded-full text-sm transition duration-200">
                Pratinjau
            </button>

            <button type="button" class="border border-red-500 hover:bg-red-500/10 text-red-500 font-semibold px-4 py-1.5 rounded-full text-sm transition duration-200 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                Hapus
            </button>
        </div>
    </header>

    <main class="flex-1 max-w-3xl w-full mx-auto px-6 pt-16 pb-24">
        <form action="#" method="POST" class="space-y-6">
            @csrf
            <div class="w-full">
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Bab 1 tanpa judul" 
                    class="w-full bg-transparent text-white text-4xl font-bold border-none outline-none placeholder-gray-600 focus:ring-0 p-0"
                    value="{{ old('title', $story['title'] ?? '') }}"
                >
            </div>

            <div class="w-full pt-4">
                <textarea 
                    name="content" 
                    placeholder="Ketik ceritamu di sini... Gunakan format 'yn' untuk karakter utama sehingga pemabacamu bisa merasakan pengalaman yang lebih personal." 
                    rows="15" 
                    class="w-full bg-transparent text-gray-300 text-lg leading-relaxed border-none outline-none placeholder-gray-600 focus:ring-0 p-0 resize-none"
                >{{ old('content', $story['description'] ?? '') }}</textarea>
            </div>
        </form>
    </main>

</body>
</html>