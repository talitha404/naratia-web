<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor Cerita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        textarea:focus { outline: none; }
    </style>
</head>
<body class="bg-[#121212] text-white font-sans min-h-screen flex flex-col">

    <header class="sticky top-0 z-50 flex items-center justify-between px-6 py-4 bg-slate-950/40 backdrop-blur-md border-b border-slate-800">
        <div class="flex items-center">
            <a href="{{ route('write.edit', $chapter->story_id ?? request('story_id')) }}" class="text-gray-400 hover:text-white transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        </div>
        
        <div class="flex items-center gap-3">
            <button type="button" onclick="submitChapterForm('published')" class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-1.5 rounded-full text-sm transition duration-200">
                Publikasikan
            </button>
           
            <button type="button" onclick="submitChapterForm('draft')" class="border border-purple-500 hover:bg-purple-500/10 text-purple-400 font-semibold px-5 py-1.5 rounded-full text-sm transition duration-200">
                Simpan
            </button>

            
            
            <button type="button" onclick="deleteChapter()" class="border border-red-500 hover:bg-red-500/10 text-red-500 font-semibold px-4 py-1.5 rounded-full text-sm transition duration-200 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                Hapus
            </button>
        </div>

        <form id="deleteForm" action="{{ route('chapters.destroy', $chapter->id ?? 0) }}" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
    </header>

    <main class="flex-1 max-w-3xl w-full mx-auto px-6 pt-16 pb-24">
        <form id="chapterForm" action="{{ isset($chapter) ? route('chapters.update', $chapter->id) : route('chapters.store') }}" method="POST" class="space-y-6">
            @csrf
            @if(isset($chapter))
                @method('PUT')
            @endif
            
            @php
                $currentStoryId = $chapter->story_id ?? request('story_id');
                $jumlahBab = \App\Models\Chapter::where('story_id', $currentStoryId)->count();
                $nomorBab = isset($chapter) ? $chapter->chapter_number : ($jumlahBab + 1);
            @endphp

            <input type="hidden" name="story_id" value="{{ $currentStoryId }}">
            <input type="hidden" name="status" id="statusInput" value="draft">

            @if(isset($chapter))
                <input type="hidden" name="chapter_number" value="{{ $chapter->chapter_number }}">
            @endif
            
            <div class="w-full">
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Bab {{ $nomorBab }} tanpa judul" 
                    class="w-full bg-transparent text-white text-4xl font-bold border-none outline-none placeholder-gray-600 focus:ring-0 p-0"
                    value="{{ old('title', $chapter->title ?? '') }}" 
                    required
                >
            </div>

            <div class="w-full pt-4">
                <textarea 
                    name="content" 
                    placeholder="Ketik ceritamu di sini... Gunakan format [yn] untuk karakter utama sehingga pembacamu bisa merasakan pengalaman yang lebih personal." 
                    rows="15" 
                    class="w-full bg-transparent text-gray-300 text-lg leading-relaxed border-none outline-none placeholder-gray-600 focus:ring-0 p-0 resize-none"
                    required>{{ old('content', $chapter->content ?? '') }}</textarea>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function submitChapterForm(statusValue) {
            document.getElementById('statusInput').value = statusValue;
            
            let judul = statusValue === 'published' ? 'Dipublikasikan!' : 'Disimpan!';
            let pesan = statusValue === 'published' ? 'Karyamu sudah bisa dibaca oleh semua orang. 🚀' : 'Draf ceritamu berhasil disimpan dengan aman. 💾';

            Swal.fire({
                title: judul,
                text: pesan,
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
                background: '#1a1c29',
                color: '#fff'
            }).then(() => {
                let form = document.getElementById('chapterForm');
                let token = document.querySelector('input[name="_token"]').value;

                // Trik JS: Kirim data lewat jalan belakang, lalu paksa pindah halaman!
                fetch(form.action, {
                    method: form.method,
                    body: new FormData(form),
                    headers: { 'X-CSRF-TOKEN': token }
                }).then(() => {
                    window.location.href = "{{ route('write.index') }}";
                }).catch(() => {
                    window.location.href = "{{ route('write.index') }}";
                });
            });
        }

        function deleteChapter() {
            Swal.fire({
                title: 'Hapus Bab ini?',
                text: "Kamu tidak akan bisa mengembalikannya lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#1a1c29',
                color: '#fff'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            })
        }
    </script>
</body>
</html>