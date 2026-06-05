<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naratia - Tempat Cerita Menjadi Nyata</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans scroll-smooth">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-extrabold text-indigo-600 tracking-tighter">NARATIA</h1>
            <ul class="hidden md:flex space-x-8 font-bold text-gray-700">
                <li><a href="javascript:void(0)" data-scroll="jelajahi" class="hover:text-indigo-600 transition">Jelajahi</a></li>
                <li><a href="javascript:void(0)" data-scroll="tulis" class="hover:text-indigo-600 transition">Tulis</a></li>
            </ul>
            <div class="flex items-center space-x-4">
                <input type="text" id="searchInput" placeholder="Cari cerita..." class="hidden lg:block border border-gray-300 rounded-full px-4 py-1 focus:ring-2 focus:ring-indigo-400 outline-none text-sm w-64">
                <a href="{{ url('/masuk') }}" class="text-indigo-600 font-bold text-sm">Masuk</a>
                <a href="{{ url('/daftar') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-full text-sm font-bold shadow-md hover:bg-indigo-700 transition">Daftar</a>
            </div>
        </nav>
    </header>

    <main>
        <section id="beranda" class="container mx-auto px-6 py-20 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 text-white text-center md:text-left">
                <h2 class="text-5xl font-extrabold leading-tight mb-6">Jadilah Karakter Utama di Setiap Cerita.</h2>
                <p class="text-lg mb-8 opacity-90">Bukan sekadar membaca, tapi jalani kisahnya. Temukan semestamu di sini.</p>
                <div class="flex space-x-4 justify-center md:justify-start">
                    <a href="{{ url('/masuk') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition">Mulai Menulis</a>
                    <a href="{{ url('/daftar') }}" class="border-2 border-indigo-600 text-indigo-400 px-8 py-3 rounded-lg font-bold hover:bg-white/10 transition">Jadi Penulis</a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://images.unsplash.com/photo-1516414447565-b14be0adf13e?w=800" class="w-80 h-80 object-cover rounded-3xl shadow-2xl border-4 border-white rotate-3">
            </div>
        </section>

        <section id="jelajahi" class="section-bright">
            <h2 class="text-3xl font-bold mb-10">Paling Banyak Dibaca</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <article class="group cursor-pointer"><div class="overflow-hidden rounded-2xl mb-4 shadow-md aspect-video"><img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=500" class="group-hover:scale-110 transition duration-500 w-full h-full object-cover"></div><h3 class="text-xl font-bold">Sang Pemilik Sayap Perak</h3></article>
                <article class="group cursor-pointer"><div class="overflow-hidden rounded-2xl mb-4 shadow-md aspect-video"><img src="https://images.unsplash.com/photo-1522069169874-c58ec4b76be5?w=500" class="group-hover:scale-110 transition duration-500 w-full h-full object-cover"></div><h3 class="text-xl font-bold">Tentang Kita</h3></article>
                <article class="group cursor-pointer"><div class="overflow-hidden rounded-2xl mb-4 shadow-md aspect-video"><img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?w=500" class="group-hover:scale-110 transition duration-500 w-full h-full object-cover"></div><h3 class="text-xl font-bold">Misteri Pustaka Lama</h3></article>
            </div>
        </section>

        <section id="tulis" class="section-soft">
            <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                <div class="md:w-1/2">
                    <h2 class="text-4xl font-bold mb-6">Ubah Imajinasi Jadi Karya Nyata.</h2>
                    <a href="{{ url('/masuk') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold">Mulai Sekarang</a>
                </div>
                <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?w=800" class="w-full md:w-1/2 h-80 object-cover rounded-3xl shadow-xl">
            </div>
        </section>

        <section id="genre" class="py-20 text-center text-white">
            <h2 class="text-3xl font-bold mb-10">Eksplorasi Berbagai Rasa</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="genre-btn">Romansa</button><button class="genre-btn">Misteri</button><button class="genre-btn">Fantasi</button>
            </div>
        </section>

    <div id="searchModal" style="display: none;">
        <div class="bg-white rounded-[2.5rem] p-10 w-80 text-center relative">
            <button onclick="closeModal()" class="absolute top-4 right-6 text-2xl text-gray-400">&times;</button>
            <h3 class="text-xl font-bold mb-2">Mau cari apa nih?</h3>
            <p class="text-gray-500 text-sm mb-6">Daftar atau masuk dulu yuk!</p>
            <a href="{{ url('/daftar') }}" class="block bg-indigo-600 text-white py-3 rounded-xl font-bold mb-2">Daftar</a>
        </div>
    </div>

    <script>
        // Logika Smooth Scroll Bersih
        document.querySelectorAll('a[data-scroll]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-scroll');
                document.getElementById(targetId).scrollIntoView({ behavior: 'smooth' });
            });
        });

        // Logika Genre Button
        const genreBtns = document.querySelectorAll('.genre-btn');
        genreBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                genreBtns.forEach(b => b.classList.remove('genre-active'));
                btn.classList.add('genre-active');
            });
        });

        // Logika Modal Search
        const searchInput = document.getElementById('searchInput');
        const modal = document.getElementById('searchModal');
        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') { e.preventDefault(); modal.style.display = 'flex'; }
        });
        function closeModal() { modal.style.display = 'none'; }
    </script>
</body>
</html>