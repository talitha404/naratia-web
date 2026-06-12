<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Cerita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-200 font-sans antialiased min-h-screen">

    <header class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-slate-950/40 backdrop-blur-md border-b border-slate-800">
        <div class="flex items-center gap-4">
            <div>
                <p class="text-xs text-slate-400 font-medium tracking-wide">Tambahkan Informasi Cerita</p>
                <h1 class="text-lg font-bold text-white tracking-tight">Cerita Tak Berjudul</h1>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button 
                type="button" 
                onclick="window.history.back()" 
                class="px-5 py-2 text-sm font-semibold text-slate-300 hover:text-white 
                    rounded-full bg-transparent hover:bg-slate-800/50 transition-all">
                Batalkan
            </button>

            <button form="create-story-form" type="submit" class="px-5 py-2 text-sm font-semibold text-slate-950 bg-white hover:bg-slate-200 rounded-full transition-all shadow-md shadow-white/5">
                Simpan & Lanjutkan
            </button>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-4 gap-10">
        
        <div class="md:col-span-1 flex flex-col items-center">
            <div class="w-full max-w-[180px] aspect-[2/3] bg-slate-900/60 border-2 border-dashed border-slate-700 hover:border-slate-500 rounded-xl flex flex-col items-center justify-center p-4 cursor-pointer group transition-all backdrop-blur-sm relative">
                <div class="p-3 bg-slate-800/50 rounded-full text-slate-400 group-hover:text-slate-200 transition-colors mb-3">
                    <i data-lucide="image" class="w-6 h-6"></i>
                </div>
                <span class="text-xs text-center font-medium text-slate-400 group-hover:text-slate-200 transition-colors">
                    Tambahkan sampul
                </span>
                <div class="absolute bottom-3 right-3 text-slate-500">
                    <i data-lucide="info" class="w-4 h-4"></i>
                </div>
            </div>
        </div>

        <div class="md:col-span-3 space-y-8 bg-slate-900/20 p-6 md:p-8 rounded-2xl backdrop-blur-sm border border-slate-800/50">
            
            <div class="border-b border-slate-800 pb-2">
                <span class="text-sm font-bold text-purple-500 border-b-2 border-purple-500 pb-[10px] tracking-wide">
                    Detail Cerita
                </span>
            </div>

            <form id="create-story-form" action="{{ route('write.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="block text-sm font-bold tracking-wide">
                        Judul<span class="text-red-500 ml-0.5">*</span>
                    </label>
                    <input name="title" type="text" placeholder="Cerita Tak Berjudul" 
                        class="w-full px-4 py-3 bg-slate-950/50 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-white placeholder-slate-600 transition-all">
                </div>

                <div class="space-y-2">
                    <div class="flex items-center gap-1.5">
                        <label class="block text-sm font-bold tracking-wide">
                            Deskripsi<span class="text-red-500 ml-0.5">*</span>
                        </label>
                        <i data-lucide="info" class="w-4 h-4 text-slate-400 cursor-help"></i>
                    </div>
                    <textarea name="description" rows="6" 
                        class="w-full px-4 py-3 bg-slate-950/50 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-white placeholder-slate-600 transition-all resize-y"></textarea>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center gap-1.5">
                        <label class="block text-sm font-bold tracking-wide">
                            Chapter<span class="text-red-500 ml-0.5">*</span>
                        </label>
                        <i data-lucide="info" class="w-4 h-4 text-slate-400 cursor-help"></i>
                        <button type="button" class="ml-auto px-3 py-1 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Tambah chapter
                        </button>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-2xl">
                        Untuk edit chapter, pilih chapter yang akan di edit lalu klik tombol simpan dan lanjutkan.
                    </p>
                    <select name="chapter" 
                        class="w-full px-4 py-3 bg-slate-950/50 border border-slate-800 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 text-white placeholder-slate-600 transition-all">
                        <option>Chapter 1</option>
                        <option>Chapter 2</option>
                    </select>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <label class="text-sm font-bold tracking-wide">Jenis cerita</label>
                        <span class="text-xs text-red-400 font-medium">*</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-2xl">
                        Menentukan jenis cerita akan membantu kami menghubungkan pembaca yang tepat dengan ceritamu secara lebih baik.
                    </p>
                    <div class="flex flex-wrap gap-2.5 pt-1">
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Fantasi
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Fiksi Penggemar
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Romantis
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Misteri
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Thrilller
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Horor
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Sejarah
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Komedi
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Drama
                        </button>
                        <button type="button" class="px-4 py-2 text-xs font-bold rounded-full bg-slate-800 text-slate-200 border border-slate-700 hover:bg-slate-700 hover:text-white transition-all shadow-sm">
                            Aksi
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>