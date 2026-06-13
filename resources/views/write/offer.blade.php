<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penulis - Naratia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#02040f] text-white min-h-screen flex items-center justify-center p-6 relative">

    <!-- Efek Cahaya Blur di background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-indigo-600/20 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-purple-600/20 rounded-full blur-[100px]"></div>
    </div>

    <!-- Kotak Popup Modal -->
    <div class="bg-[#0a0f1d]/90 backdrop-blur-xl border border-white/10 rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl relative z-10 animate-fade-in-up">
        
        <div class="w-16 h-16 bg-indigo-500/20 rounded-full flex items-center justify-center mx-auto mb-5 border border-indigo-500/30">
            <img src="https://img.icons8.com/ios-filled/30/818cf8/quill-with-ink.png"/>
        </div>
        
        <h2 class="text-2xl font-bold text-white mb-2">Ingin Jadi Penulis?</h2>
        <p class="text-sm text-gray-400 mb-8 leading-relaxed">
            Kamu saat ini berada di mode Pembaca. Beralihlah ke mode Penulis untuk mulai menciptakan dan membagikan ceritamu ke dunia Naratia!
        </p>
        
        <div class="flex flex-col gap-3">
            <form action="{{ route('user.switch-role') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 rounded-xl shadow-[0_0_15px_rgba(79,70,229,0.3)] transition">
                    Ya, Switch Mode Penulis
                </button>
            </form>
            <a href="{{ route('dashboard') }}" class="w-full block bg-transparent hover:bg-white/5 text-gray-300 font-bold py-3.5 rounded-xl border border-white/10 transition">
                Tidak, Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>