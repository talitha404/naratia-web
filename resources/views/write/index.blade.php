<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cerita</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .space-bg {
            background-color: #02040f;
            background-image:
                radial-gradient(white, rgba(255,255,255,.3) 1px, transparent 2px),
                radial-gradient(white, rgba(255,255,255,.2) 0.5px, transparent 1.5px),
                radial-gradient(white, rgba(255,255,255,.1) 1px, transparent 2px);
            background-size: 250px 250px, 150px 150px, 100px 100px;
            background-position: 0 0, 40px 60px, 130px 270px;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="space-bg text-white min-h-screen">
    <header class="flex justify-between items-center p-6 sticky top-0 bg-black/20 backdrop-blur-xl z-20 border-b border-white/10 shadow-sm">
        <h1 class="text-2xl font-black tracking-tighter text-white">NARATIA</h1>
    </header>

    <main class="px-6 py-10 max-w-5xl mx-auto pb-32">
        <section class="mb-10">
            <h2 class="text-xs font-bold text-indigo-400 uppercase tracking-[0.2em] mb-6">Halaman Cerita</h2>
            
            <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
                <div class="flex items-center gap-6 text-sm font-semibold text-gray-400">
                    <button id="btnCerita" class="nav-btn text-white border-b-2 border-indigo-500 pb-[18px] -mb-[18px] transition duration-300 hover:font-bold">
                        Semua ({{ $stories->count() }})
                    </button>
                    
                    <button id="btnStatistik" class="nav-btn text-gray-400 border-b-2 border-transparent pb-[18px] -mb-[18px] transition duration-300 hover:text-white hover:font-bold">
                        Statistik 
                    </button>
                </div>

                <a href="{{ route('write.buatcerita') }}" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition shadow-lg shadow-indigo-600/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Buat cerita
                </a>
            </div>

            <div id="bodyCerita" class="space-y-4">
                @forelse($stories as $story)
                <div class="flex items-center justify-between p-5 bg-white/[0.03] hover:bg-white/[0.06] backdrop-blur-md rounded-2xl border border-white/5 transition group">
                
                    <a href="{{ route('write.edit', $story->id) }}" class="flex items-center gap-5 flex-1 cursor-pointer">
                        @if($story->cover_image)
                            <img src="{{ asset('storage/' . $story->cover_image) }}" alt="Cover" class="w-12 h-12 rounded-xl object-cover border border-white/10 shadow-sm">
                        @else
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center font-black text-xl text-gray-300 border border-white/10 shadow-inner uppercase shrink-0">
                                {{ substr($story->title, 0, 1) }}
                            </div>
                        @endif
                        
                        <div>
                            <h3 class="font-bold text-gray-200 group-hover:text-indigo-400 transition line-clamp-1">{{ $story->title ? $story->title : '(Tanpa judul)' }}</h3>
                            <div class="flex items-center gap-2 mt-1 text-xs text-gray-400">
                                @php
                                    $isPublished = false;
                                    if($story->chapters) {
                                        foreach($story->chapters as $ch) {
                                            if($ch->status === 'published') {
                                                $isPublished = true;
                                                break;
                                            }
                                        }
                                    }
                                @endphp

                                @if($isPublished)
                                    <span class="px-2 py-0.5 rounded bg-green-500/10 text-green-400 font-bold text-[10px] uppercase border border-green-500/20">DIPUBLIKASI</span>
                                @else
                                    <span class="px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-bold text-[10px] uppercase border border-amber-500/20">DRAF</span>
                                @endif

                                <span>•</span>
                                <span>{{ $story->created_at->format('d M') }}</span>
                            </div>
                        </div>
                    </a>

                    <div class="flex flex-col items-end gap-2 shrink-0 ml-4">
                        <div class="flex items-center gap-3 text-xs text-gray-400 font-medium mb-1">
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/material-rounded/16/888888/visible.png"/> 0</span>
                            <span class="flex items-center gap-1"><img src="https://img.icons8.com/small/16/737373/filled-like.png"/> 0</span>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <a href="/stories/read/{{ $story->id }}?chapter=1" class="text-[10px] font-bold text-indigo-400 hover:text-white border border-indigo-500/30 hover:bg-indigo-500/30 px-3 py-1.5 rounded-full transition shadow-sm">
                                Pratinjau
                            </a>
                            
                            <form action="{{ route('write.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus cerita ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-full bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white border border-red-500/20 hover:border-transparent transition shadow-sm" title="Hapus Cerita">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-10 bg-white/[0.03] border border-white/5 rounded-2xl">
                    <p class="text-gray-400 text-sm">Belum ada cerita. Yuk, mulai nulis karya pertamamu!</p>
                </div>
                @endforelse
            </div>
            <div id="bodyStatistik" class="hidden">
                <div class="container mx-auto p-6 text-white">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Manajemen Cerita & Analitik</h1>
                        
                        <a href="{{ route('write.export.excel') }}" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg inline-flex items-center gap-2 text-sm font-medium transition">
                            📊 Ekspor Data ke Excel
                        </a>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                        
                        <div class="lg:col-span-1 bg-gray-900 p-6 rounded-xl border border-gray-800 shadow-lg">
                            <h2 class="text-lg font-semibold mb-4 text-gray-300">Statistik Cerita Per Genre</h2>
                            
                            <div class="relative w-full" style="height: 250px;">
                                <canvas id="genreChart"></canvas>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </section>
    </main>

    <nav class="fixed bottom-0 w-full px-6 pb-8 pt-4 z-20">
        <div class="bg-indigo-600/40 backdrop-blur-xl h-16 rounded-2xl flex justify-around items-center shadow-[0_10px_40px_rgba(79,70,229,0.4)] border border-white/20">
            <a href="{{ route('dashboard') }}" class="p-3 {{ request()->routeIs('dashboard') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-rounded/24/ffffff/home.png" class="w-6 h-6"/>
            </a>
            <a href="/library" class="p-3 {{ request()->is('library') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/book.png" class="w-6 h-6"/>
            </a>
            <a href="{{ route('search') }}" class="p-3 {{ request()->routeIs('search') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/search.png" class="w-6 h-6"/>
            </a>
            <a href="{{ route('write.index') }}" class="p-3 {{ request()->routeIs('write.index') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/edit.png" class="w-6 h-6"/>
            </a>
            <a href="{{ route('profil') }}" class="p-3 {{ request()->routeIs('profil') ? 'bg-white/20 shadow-inner' : 'hover:bg-white/10' }} rounded-xl transition">
                <img src="https://img.icons8.com/material-outlined/24/ffffff/user.png" class="w-6 h-6"/>
            </a>
        </div>
    </nav>
    <script>
    const btnCerita = document.getElementById('btnCerita');
    const btnStatistik = document.getElementById('btnStatistik');
    const bodyCerita = document.getElementById('bodyCerita');
    const bodyStatistik = document.getElementById('bodyStatistik');
    const buttons = document.querySelectorAll('.nav-btn');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            buttons.forEach(btn => {
                btn.classList.remove('text-white', 'border-indigo-500');
                btn.classList.add('text-gray-400', 'border-transparent');
            });
            button.classList.remove('text-gray-400', 'border-transparent');
            button.classList.add('text-white', 'border-indigo-500');
        });
    });

    btnCerita.addEventListener('click', () => {
        bodyCerita.classList.remove('hidden');
        bodyStatistik.classList.add('hidden');
    });

    btnStatistik.addEventListener('click', () => {
        bodyCerita.classList.add('hidden');
        bodyStatistik.classList.remove('hidden');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const labelsData = @json($chartLabels);
        const valuesData = @json($chartData);

        // Jika penulis belum memiliki cerita sama sekali, tampilkan teks alternatif atau data kosong
        if(labelsData.length === 0) {
            const ctx = document.getElementById('genreChart').getContext('2d');
            ctx.font = "14px sans-serif";
            ctx.fillStyle = "#9CA3AF";
            ctx.textAlign = "center";
            ctx.fillText("Belum ada data cerita.", 120, 120);
            return;
        }

        // Inisialisasi Chart.js (Menggunakan tipe 'doughnut' atau 'pie' agar pas untuk porsi genre)
        const ctx = document.getElementById('genreChart').getContext('2d');
        const genreChart = new Chart(ctx, {
            type: 'doughnut', // Anda bisa ganti jadi 'bar' atau 'pie' jika mau
            data: {
                labels: labelsData,
                datasets: [{
                    label: 'Jumlah Cerita',
                    data: valuesData,
                    backgroundColor: [
                        '#8B5CF6', // Purple
                        '#EC4899', // Pink
                        '#3B82F6', // Blue
                        '#10B981', // Green
                        '#F59E0B', // Yellow
                        '#EF4444'  // Red
                    ],
                    borderWidth: 1,
                    borderColor: '#111827' // Menyesuaikan dark background web Naratia
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#9CA3AF', // Warna teks label abu-abu terang sesuai dark mode
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ` ${context.label}: ${context.raw} Cerita`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>

</body>
</html>