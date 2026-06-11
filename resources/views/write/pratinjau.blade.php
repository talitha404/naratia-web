<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratinjau Cerita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#121212] text-white font-sans min-h-screen flex flex-col">

    <header class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-slate-950/40 backdrop-blur-md border-b border-slate-800">
        <div>
            <a href="{{ route('write.editor', ['id' => $id ?? '']) }}" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-2 rounded-full text-sm transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                Edit bab
            </a>
        </div>
    </header>

    <main class="flex-1 max-w-2xl w-full mx-auto px-6 pt-16 pb-24">
        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold mb-4 tracking-tight">
                {{ $title ?? 'Melodi yang Hilang di ujung Senja (Draf)' }}
            </h1>
            
            <div class="flex items-center justify-center gap-4 text-sm text-gray-400">
                <span class="flex items-center gap-1">👁️ 1</span>
                <span class="flex items-center gap-1">⭐ 0</span>
                <span class="flex items-center gap-1">💬 0</span>
            </div>
        </div>

        <article class="prose prose-invert max-w-none text-gray-300 text-lg leading-relaxed space-y-6 text-justify">
            {!! nl2br(e($content ?? 'contoh isi cerita')) !!}
        </article>

        <hr class="border-[#222222] my-10">

        <div class="w-full">
            <form action="#" method="POST" class="flex gap-4 items-start">
                @csrf
                <div class="w-10 h-10 rounded-full bg-purple-600 flex items-center justify-center font-bold text-white shrink-0">
                    U
                </div>
                <div class="flex-1">
                    <textarea 
                        name="comment" 
                        placeholder="Tulis komentar..." 
                        rows="2" 
                        class="w-full bg-[#1a1a1a] text-white border border-[#333333] rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-purple-500 placeholder-gray-500 resize-none transition duration-200"
                    ></textarea>
                    <div class="flex justify-end mt-2">
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white text-xs font-semibold px-4 py-2 rounded-md transition duration-200">
                            Kirim
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </main>
</body>
</html>